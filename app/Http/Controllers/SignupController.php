<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function showForm()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email'      => 'required|email|unique:users_details,email',
        ]);

        UserDetail::create($request->all());

        return redirect()->back()->with('success', 'Signup Successful! Your account is pending approval.');
    }

    public function adminUsers()
    {
        $users = UserDetail::latest()->get();
        return view('admin.users', compact('users'));
    }

    public function show($id)
    {
        $user = UserDetail::findOrFail($id);
        return view('admin.show', compact('user'));
    }

    public function edit($id)
    {
        $user = UserDetail::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = UserDetail::findOrFail($id);

        $request->validate([
            'first_name' => 'required',
            'email'      => 'required|email|unique:users_details,email,'.$id,
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users')->with('success', 'User Updated Successfully');
    }

    public function approve($id)
    {
        $user = UserDetail::findOrFail($id);
        $user->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => Auth::guard('admin')->id(),
            'rejected_at' => null,
            'rejection_reason' => null,
        ]);

        return redirect()->back()->with('success', 'User approved successfully!');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|min:5|max:500',
        ]);

        $user = UserDetail::findOrFail($id);
        $user->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
            'rejected_at' => now(),
            'approved_at' => null,
            'approved_by' => null,
        ]);

        return redirect()->back()->with('success', 'User rejected successfully!');
    }

    public function delete($id)
    {
        UserDetail::findOrFail($id)->delete();
        return redirect()->route('admin.users')->with('success', 'User Deleted Successfully');
    }
}