<?php

namespace App\Http\Controllers;

use App\Models\Recharge;
use App\Models\User;
use Illuminate\Http\Request;

class RechargeController extends Controller
{
    public function list(){
         // Fetch all users from the User model
         $recharges = Recharge::with('user')->get();

         // Pass the users data to the view
         return view('recharge.index', compact('recharges'));
    }

    public function add(){
        // Fetch all users from the User model
        $users = User::all();

        // Pass the users data to the view
        return view('recharge.add', compact('users'));
   }

   public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'remark' => 'nullable|string|max:255',
        ]);

        // Create a new recharge record
        Recharge::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'remark' => $request->remark,
            'created_at' => now(), // Automatically set the current time
        ]);
        // Update the user's amount
          $user = User::find($request->user_id);
          $user->amount += $request->amount; // Increment the user's amount
          $user->save(); // Save the changes

        // Redirect or return response
        return redirect()->route('recharge.list')->with('success', 'Recharge added successfully!');
    }
}
