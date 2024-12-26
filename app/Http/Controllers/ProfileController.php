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
        // dd($user);
        return view('user.user-profile.profile', compact('user'));
    }

    public function userProfileupdate(Request $request)
    {
        $user = auth()->user();
    
        // Validate the request
        $request->validate([
            'name' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8', // You can change this to 'required|confirmed|min:8' if password confirmation is used
            'enroll_number' => 'nullable|string|max:255',
            'institute_type' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'phone' => 'nullable|numeric|digits:10', // Assuming phone number length
            'program_id' => 'nullable|string',
            'supervisior_name' => 'nullable|string|max:255',
            'supervisior_dept' => 'nullable|string|max:255',
            'supervisior_email' => 'nullable|email|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image files
        ]);
    
        // Update user details
        $user->name = $request->name;
        $user->enroll_number = $request->enroll_number;
        $user->institute_type = $request->institute_type;
        $user->program = $request->program_id;
        $user->supervisior_name = $request->supervisior_name;
        $user->supervisior_dept = $request->supervisior_dept;
        $user->supervisior_email = $request->supervisior_email;
        $user->department = $request->department;
        $user->phone = $request->phone;
    
        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        if ($request->hasFile('profile_picture')) {
            // Get the uploaded image file
            $image = $request->file('profile_picture');
            
            // Generate a unique name for the uploaded image
            $imageName = time() . '_' . $image->getClientOriginalName();
            
            // Define the upload location (use storage_path and symlink if required)
            $location = public_path('/uploads/profile_pictures/');
            
            // Ensure the directory exists
            if (!file_exists($location)) {
                mkdir($location, 0777, true); // Create the directory if it doesn't exist
            }
    
            // Move the image to the uploads directory
            $image->move($location, $imageName);
    
            // Save the profile picture filename in the user model
            $user->profile_picture = $imageName;
        }
    
        // Save the updated user model
        $user->save();
    
        // Redirect back with a success message
        return redirect()->route('user-profile.show')->with('success', 'Profile updated successfully.');
    }
}

