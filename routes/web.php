<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RechargeController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Apply auth middleware to /dashboard route

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/booking', [BookingController::class, 'booking'])->name('booking');

    Route::get('/booking_list', [BookingController::class, 'booking_list'])->name('booking_list');

    Route::post('/book-slot', [BookingController::class, 'bookSlot'])->name('book.slot');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('equipments', EquipmentController::class);


    // Route::resource('users', UserController::class);

    // Define the route for listing bookings
    // Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');    
    Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');

    // recharge route start
    Route::get('/recharge', [RechargeController::class, 'list'])->name('recharge.list');

    Route::get('/recharge/add', [RechargeController::class, 'add'])->name('recharge.add');
    Route::post('/recharge/store', [RechargeController::class, 'store'])->name('recharge.store');
    // recharge route Ends
    // Admin profile route 
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Admin Profile route end

    // User profile route start
    Route::get('/user-profile', [ProfileController::class, 'userProfile'])->name('user-profile.show');
    Route::put('/user-profile', [ProfileController::class, 'userProfileupdate'])->name('user-profile.update');

    // Route::resource('bookings', BookingController::class);
    Route::post('/booking/update-status', [BookingController::class, 'updateStatus'])->name('booking.update.status');

    Route::get('/test-email2222', [BookingController::class, 'bookSlot_mail']);


    Route::post('add/calender', [CalenderController::class, 'AddCalender'])->name('add_calender');
    Route::get('calender/delete/{id?}', [CalenderController::class, 'removeCalender'])->name('remove_calender');

});

// Auth::routes();
Route::post('equipments/update-calender', [EquipmentController::class, 'updateCalender'])->name('equipments.update_calender');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/', [DashboardController::class, 'home'])->name('home');
// Custom login routes
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login'); // Show login form

// Handle the login form submission
Route::post('/login-check', [LoginController::class, 'loginCheck'])->name('login-check');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Handle logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [DashboardController::class, 'home'])->name('home');
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/signup', [HomeController::class, 'register'])->name('register');
Route::post('/signup', [HomeController::class, 'create'])->name('register.create');

Route::post('/check-email-phone', [HomeController::class, 'checkEmailAndPhone']);


Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp'])->name('password.email');
Route::get('/reset-password/{otp}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');


Route::get('/clear-all', function() {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return 'All caches cleared!';
});



Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email.', function ($message) {
            $message->to('amitsinghkumar008.ak@gmail.com')
                    ->subject('Test Email');
        });
        return 'Email sent successfully.';
    } catch (\Exception $e) {
        return 'Failed to send email: ' . $e->getMessage();
    }
});



