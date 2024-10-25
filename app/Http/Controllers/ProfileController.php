<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function show()
    {
        // Fetch the authenticated user's profile
        $user = auth()->user();
        // dd($user);
        return view('admin-profile.profile', compact('user'));
    }

    
    public function update(Request $request)
    {
        $user = auth()->user();

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15', // Adjust the max length as needed
            'password' => 'nullable|string|min:6',
        ]);

        // Update the user's name and phone
        $user->name = $request->name;
        $user->phone = $request->phone;

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }

    
    public function userProfile()
    {
        // Fetch the authenticated user's profile
        $user = auth()->user();
        return view('user.user-profile.profile', compact('user'));
    }

    public function userProfileupdate(Request $request)
    {
        $user = auth()->user();

        // Validate the request
        $request->validate([
            'name' => 'nullable|string|max:255',
            // 'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'emp_id' => 'nullable|string|max:50', // Adjust validation as needed
            'department' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15', // Adjust max length as needed
            'program_id' => 'nullable|string|max:50', // Adjust as needed
            'supervisior_name' => 'nullable|string|max:255',
            'supervisior_dept' => 'nullable|string|max:255',
            'supervisior_email' => 'nullable|email|max:255',
            'password' => 'nullable|string|min:6',
        ]);
        // dd($request->name);
        // Update user details
        $user->name = $request->name;
        $user->enroll_number = $request->emp_id;
        $user->department = $request->department;
        $user->phone = $request->phone;
        $user->program = $request->program_id;
        $user->supervisior_name = $request->supervisior_name;
        $user->supervisior_dept = $request->supervisior_dept;
        $user->supervisior_email = $request->supervisior_email;

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user-profile.show')->with('success', 'Profile updated successfully.');
    }
}

