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
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
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

    // Method to create default admin (run once)
    public function createDefaultAdmin()
    {
        $admin = Admin::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
            ]
        );

        return 'Default admin created!';
    }
}