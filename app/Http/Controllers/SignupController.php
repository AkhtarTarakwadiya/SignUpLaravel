<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;

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

        return redirect()->back()->with('success', 'Signup Successful!');
    }

    public function adminUsers()
    {
        $users = UserDetail::all();
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

    public function delete($id)
    {
        UserDetail::findOrFail($id)->delete();
        return redirect()->route('admin.users')->with('success', 'User Deleted Successfully');
    }
}
