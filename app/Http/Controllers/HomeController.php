<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\HomeController;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    

   
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('register');
    }
 
    public function create(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Ensure correct table name for uniqueness check
            'password' => 'required|string|min:8', // You can change this to 'required|confirmed|min:8' if a password confirmation field is used
            'emp_id' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'phone' => 'nullable|numeric|digits:10', // Assuming phone number length
            'program_id' => 'required|string',
            'supervisorname' => 'required|string|max:255',
            'supervisor_dept' => 'required|string|max:255',
            'supervisor_email' => 'required|email|max:255',
        ]);
    
        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $validatedData['phone'] ?? '', // Provide a default empty value if phone is not provided
            'enroll_number' => $validatedData['emp_id'],
            'program' => $validatedData['program_id'],
            'supervisior_name' => $validatedData['supervisorname'],
            'supervisior_dept' => $validatedData['supervisor_dept'],
            'supervisior_email' => $validatedData['supervisor_email'],
            'department' => $validatedData['department']
        ]);
       
        $user->assignRole('user');
        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Successfully registered! Please log in.');
    }
    

    public function checkEmailAndPhone(Request $request)
    {
        $request->validate([
            'email' => 'email|nullable',
            'phone' => 'regex:/^[0-9]{10}$/|nullable',
        ]);

        $emailExists = User::where('email', $request->email)->exists();
        $phoneExists = User::where('phone', $request->phone)->exists();

        return response()->json([
            'emailExists' => $emailExists,
            'phoneExists' => $phoneExists,
        ]);
    }
    
}
