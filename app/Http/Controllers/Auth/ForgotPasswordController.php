<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password'); // Create this view
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();

        // Generate a random OTP
        $otp = Str::random(6);

        // Store OTP in session or database for verification later
        $request->session()->put('otp', $otp);
        $request->session()->put('email', $user->email);

        // Send OTP via email
        Mail::raw("Your OTP is: $otp", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Your OTP for Password Reset');
        });

        return redirect()->route('password.reset', ['otp' => $otp]);
    }

    public function showResetPasswordForm($otp)
    {
        return view('auth.reset-password', ['otp' => $otp]); // Create this view
    }



    public function resetPassword(Request $request)
{
    $request->validate([
        'otp' => 'required',
        'password' => 'required|min:6|confirmed',
    ]);

    // Verify OTP
    if ($request->otp !== $request->session()->get('otp')) {
        return back()->withErrors(['otp' => 'Invalid OTP']);
    }

    // Update user's password
    $user = User::where('email', $request->session()->get('email'))->first();
    $user->password = bcrypt($request->password);
    $user->save();

    // Clear OTP from session
    $request->session()->forget(['otp', 'email']);

    return redirect()->route('login')->with('success', 'Password has been reset successfully!');
}

}

