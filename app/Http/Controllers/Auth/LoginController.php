<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return view('index'); // Return the login view
    }

    public function loginCheck(Request $request){
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required', // Minimum password length
        ]);

        // Check if the user exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Email does not exist
            return response()->json(['message' => 'Email does not exist.'], 404);
        }

        // Check if the password is correct
        if (!Hash::check($request->password, $user->password)) {
            // Password is incorrect
            return response()->json(['message' => 'Incorrect password.'], 401);
        }

        // If both checks are passed
        return response()->json(['messageSuccess' => 'Email and password are Correct.'], 200);

    }
}
