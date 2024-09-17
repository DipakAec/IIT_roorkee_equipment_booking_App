<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function  dashboard()
    {
        if(auth()->user()->hasRole('user')){
            return view('user.dashboard');

        }
        else{
            return view('Dashboard.index');
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
