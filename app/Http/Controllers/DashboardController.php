<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Check if the user has the 'user' role
        if(auth()->user()->hasRole('user')){
            $userId = auth()->id(); // Get the authenticated user's ID
    
            // Calculate total bookings
            $totalBookings = \App\Models\UserBooking::where('user_id_fk', $userId)->count();
            // Calculate approved bookings
            $approvedBookings = \App\Models\UserBooking::where('user_id_fk', $userId)
                ->where('active_status', 'approved')
                ->count();
            
            // Get the amount from the User model
            $userAmount = \App\Models\User::find($userId)->amount;
            // dd($approvedBookings);
            
            // Pass the data to the view
            return view('user.dashboard', [
                'totalBookings' => $totalBookings,
                'approvedBookings' => $approvedBookings,
                'userAmount' => $userAmount,
            ]);
        } 
        else {
            // Calculate for admin or other roles
            $totalUsers = \App\Models\User::count(); // Total number of users
            $totalRechargeAmount = \App\Models\Recharge::sum('amount'); // Total recharge amount
            $totalBookings = \App\Models\UserBooking::count(); // Total bookings
            $approvedBookings = \App\Models\UserBooking::where('active_status', 'approved')->count(); // Total approved bookings
    
            // Pass the data to the admin view
            return view('Dashboard.index', [
                'totalUsers' => $totalUsers,
                'totalRechargeAmount' => $totalRechargeAmount,
                'totalBookings' => $totalBookings,
                'approvedBookings' => $approvedBookings, // New variable for approved bookings
            ]);
        }
    }
    
    public function home()
    {
        if (auth()->check()) {
            // User is authenticated, redirect to the dashboard
            return redirect()->route('dashboard');
        } else {
            // User is not authenticated, redirect to the registration page
            return redirect()->route('register');
        }
    }
}
