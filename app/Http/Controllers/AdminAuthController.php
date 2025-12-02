<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        // If no admin exists, redirect to setup
        if (Admin::count() === 0) {
            return redirect('/setup-admin');
        }
        
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Manual authentication to debug
        $admin = Admin::where('email', $request->email)->first();
        
        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin, $request->remember);
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }

    public function dashboard()
    {
        $totalUsers = \App\Models\UserDetail::count();
        $pendingUsers = \App\Models\UserDetail::where('status', 'pending')->count();
        $approvedUsers = \App\Models\UserDetail::where('status', 'approved')->count();
        $rejectedUsers = \App\Models\UserDetail::where('status', 'rejected')->count();

        return view('admin.dashboard', compact('totalUsers', 'pendingUsers', 'approvedUsers', 'rejectedUsers'));
    }

    public function createDefaultAdmin()
    {
        if (Admin::count() === 0) {
            Admin::create([
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123')
            ]);
            return redirect()->route('admin.login')->with('success', 'Default admin created! You can now login.');
        }
        
        return redirect()->route('admin.login')->with('info', 'Admin already exists.');
    }
}