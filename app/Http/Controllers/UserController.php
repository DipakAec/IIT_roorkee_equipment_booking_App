<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => 'Password123',
        ]);

        return redirect()->route('users.index')->with(['type'=>'success','message' =>'User created successfully.']);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|unique:users,name,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);

        return redirect()->route('users.index')->with(['type'=>'success','message' =>'User created successfully.']);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with(['type'=>'success','message' =>'User Deleted successfully.']);
    }
}
