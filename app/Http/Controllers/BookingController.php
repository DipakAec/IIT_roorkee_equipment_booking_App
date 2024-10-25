<?php

namespace App\Http\Controllers;

use App\Mail\BookingApprovedMail;
use App\Mail\BookingCanceledMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Models\UserBooking;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use App\Mail\BookingNotification;
use App\Mail\BookingNotificationAdmin;
use App\Models\User;


use Illuminate\Support\Str;
class BookingController extends Controller
{   

 
    public function index()
    {   
        // Retrieve all bookings with pagination and left join with users table to get user names
        $bookings = UserBooking::select('user_booking_table.*', 'users.name as user_name')
                ->leftJoin('users', 'user_booking_table.user_id_fk', '=', 'users.id')
                ->get(); // 10 bookings per page

        
        // Return the view with bookings data
        return view('bookings.index', ['bookings' => $bookings]);
    }


    public function updateStatus(Request $request)
    {
        
        // Validate the request data
        $request->validate([
            'id' => 'required|exists:user_booking_table,book_id_pk', // Ensure ID exists in the user_bookings table
            'status' => 'required|in:approved,canceled', // Ensure status is either approved or canceled
        ]);
        
        // Find the booking by ID
        $booking = UserBooking::find($request->id);

        // Update the status
        $booking->active_status = $request->status;
        $booking->save();
        // Get the user's email using the user_id_fk from the booking table
        $user = User::find($booking->user_id_fk); // Get user by foreign key
       
         // Get the user's email
        $userEmail = $booking->user->email;

        // Send email based on the status
        // if ($request->status === 'approved') {
        //     Mail::to($userEmail)->send(new BookingApprovedMail($booking));
        // } 
        if ($request->status === 'approved') {
            // Check if the user has enough amount before subtracting
            if ($user->amount >= 100) {
                $user->amount -= 100; // Subtract 100 from the amount
                $user->save(); // Save the updated user
            } else {
                return response()->json(['message' => 'Insufficient balance to approve the booking!']);
            }
    
            // Send email for approved booking
            Mail::to($userEmail)->send(new BookingApprovedMail($booking));
        }
        elseif ($request->status === 'canceled') {
            Mail::to($userEmail)->send(new BookingCanceledMail($booking));
        }
    
        // Return a response
        return response()->json(['message' => 'Booking status updated successfully!']);
      
        
    }

 
 
//  Booking slot with mail by dipak start
public function bookSlot(Request $request)
{
    try {
        if (Auth::check()) {
            $userId = Auth::id(); // Get the authenticated user's ID
        } else {
            return response()->json(['error' => 'User is not authenticated.'], 401);
        }

        if (auth()->user()->hasRole('user')) {
            // Validate the incoming request data
            $request->validate([
                'date' => 'required|date',
                'slot' => 'required|string',
            ]);

            $date = $request->input('date');
            $slot = $request->input('slot');
            $goldSelect = $request->input('goldSelect');
            
            // Check for existing booking to prevent duplicates
            $existingBooking = UserBooking::where('user_id_fk', $userId)
            ->where('booking_date', $date)
            ->where('booking_timings', $slot)
            ->first();

            if ($existingBooking) {
                return response()->json(['error' => 'Duplicate booking found for the selected date and slot.'], 409);
            }

            // Create a new booking record
            $booking = UserBooking::create([
                'user_id_fk' => $userId,
                'booking_date' => $date,
                'booking_timings' => $slot,
                'status' => 'Booked',
                'gold_status' => $goldSelect,
                'ref_no' => Str::random(8) // Generate random 8-character alphanumeric string

            ]);

            // Send email to user
            $userEmail = auth()->user()->email;
            Mail::to($userEmail)->send(new BookingNotification($booking, $userEmail));

            // Send email to admin
            $adminEmail = 'pauldipakkr@gmail.com'; // Replace with actual admin email
            Mail::to($adminEmail)->send(new BookingNotificationAdmin($booking, $userEmail));

            // Return a JSON response
            return response()->json(['success' => true, 'booking' => $booking]);
        } else {
            return response()->json(['error' => 'User does not have the required role.'], 403);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Server error: ' . $e->getMessage()], 500);
    }
}

// Booking slot with mail by dipak end

    public function booking(Request $request)
    {
        if (auth()->user()->hasRole('user')) {
            $equiptment_data = DB::table('equipments')->first();
            // $equiptment_data = DB::table('equipments')->first();
            // Set the timezone to Asia/Kolkata
            $timezone = 'Asia/Kolkata';
            
            // Get the start and end of the current week in the specified timezone
            $startOfWeek = Carbon::now($timezone)->startOfWeek()->format('Y-m-d');
            $endOfWeek = Carbon::now($timezone)->endOfWeek()->format('Y-m-d');
            
            // Define time slots
            $timeSlots = [
                '9:30 AM - 11:00 AM',
                '11:30 AM - 1:00 PM',
                '2:00 PM - 3:30 PM',
                '4:00 PM - 5:30 PM',
                '5:45 PM - 7:15 PM',
                '7:30 PM - 9:00 PM'
            ];

           

            // Fetch records for the current week from user_booking_table
            $booked_data = DB::table('user_booking_table')
                    ->whereBetween('booking_date', [$startOfWeek, $endOfWeek])
                    ->whereIn('booking_timings', $timeSlots)
                    ->get(); // Fetch all records for the current week

                   
                    $equipmentCalenders = DB::table('equipment_calenders')
                    ->whereBetween('date', [$startOfWeek, $endOfWeek])
                    ->whereIn('timings', $timeSlots)
                    ->get();    
                   
            // Pass the data to the view
            return view('user.booking', [
                'equiptment_data' => $equiptment_data,
                'equipmentCalenders' => $equipmentCalenders,
                'startOfWeek' => $startOfWeek,
                'endOfWeek' => $endOfWeek,
                'timezone' => $timezone,
                'booked_data' =>$booked_data
            ]);

        } else {
            return view('Dashboard.index');
        }
    }


    public function booking_list(Request $request){

        if (auth()->user()->hasRole('user')) {
            $userId = Auth::id(); // Get the authenticated user's ID
            // dd(auth()->user()->hasRole('user'));
             // Retrieve all bookings with pagination and left join with users table to get user names
             $bookings = UserBooking::select('user_booking_table.*', 'users.name as user_name')
             ->leftJoin('users', 'user_booking_table.user_id_fk', '=', 'users.id')
             ->where('user_booking_table.user_id_fk', $userId)
             ->get();
            //  ->paginate(10); // 10 bookings per page
         


            // Return the view with bookings data
            return view('user.booking_list', ['bookings' => $bookings]);

            //  return view('user.booking_list');
        }
    }

    
    public function booking1()
    {
        if (auth()->user()->hasRole('user')) {
            $equiptment_data = DB::table('equipments')->first();
            // Set the timezone to Asia/Kolkata
            $timezone = 'Asia/Kolkata';
            
             // Set the timezone to Asia/Kolkata
             $timezone = 'Asia/Kolkata';

        // Get the start and end of the current week in the specified timezone
        $startOfWeek = Carbon::now($timezone)->startOfWeek()->format('Y-m-d');
        $endOfWeek = Carbon::now($timezone)->endOfWeek()->format('Y-m-d');

        // Fetch records for the current week
        $equipmentCalenders = DB::table('equipment_calenders')
            ->get();

            return view('user.booking', [
                'equiptment_data' => $equiptment_data,
                'equipmentCalenders' => $equipmentCalenders,
                'startOfWeek' => $startOfWeek,
                'endOfWeek' => $endOfWeek,
                'timezone' => $timezone
            ]);
        } else {
            return view('Dashboard.index');
        }
    }

   
    public function booking_user()
    {
        if (auth()->check()) {
            // User is authenticated, redirect to the dashboard
            return redirect()->route('booking');
        } else {
            // User is not authenticated, redirect to the registration page
            return redirect()->route('register');
        }
    }



    // public function bookSlot_mail(Request $request)
    // {
    //     // $request->validate([
    //     //     'date' => 'required|date',
    //     //     'slot' => 'required|string',
    //     // ]);
        
    //     $date= date('Y-m-d');
    //     $slot = "9:00 Am - 11:00 AM";
    //     // Save booking logic here...
    
    //     // Get the authenticated user
    //     $user = auth()->user();
    //     $adminEmail = 'amitsinghkumar008.ak@gmail.com'; // Replace with actual admin email
    
    //     // Send email to the user
    //     // Mail::to($user->email)->send(new BookingConfirmation($request->date, $request->slot));
    
    //     // Send email to the admin
    //     Mail::to($adminEmail)->send(new BookingConfirmation($request->date, $request->slot));
    
    //     return response()->json(['status' => 'success']);
    // }

    public function bookSlot_mail(Request $request)
    {
        // // Static date and slot
        // $date = date('Y-m-d');
        // $slot = "9:00 AM - 11:00 AM";
    
        // // Get the authenticated user
        // // $user = auth()->user();
        // $adminEmail = 'amitsinghkumar008.ak@gmail.com';
    
        // // Send email to the user (optional, uncomment if user email is available)
        // // Mail::to($user->email)->send(new BookingConfirmation($date, $slot));
    
        // // Send email to the admin
        // Mail::to($adminEmail)->send(new BookingConfirmation($date, $slot));
    
        // return response()->json(['status' => 'success']);

        $userEmail = 'recipient@example.com'; // Replace with recipient email address
        $adminEmail = 'amitsinghkumar008.ak@gmail.com'; // Admin email address
    
        // Send email to the user
        Mail::to($userEmail)->send(new BookingConfirmation('2024-09-10', '9:00 AM - 11:00 AM'));
    
        // Send email to the admin
        Mail::to($adminEmail)->send(new BookingConfirmation('2024-09-10', '9:00 AM - 11:00 AM'));
    
        return response()->json(['status' => 'success']);
    }
    








}
