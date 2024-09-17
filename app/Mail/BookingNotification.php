<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $userEmail;

    public function __construct($booking, $userEmail)
    {
        $this->booking = $booking;
        $this->userEmail = $userEmail;
    }

    public function build()
    {
        return $this->view('emails.bookingNotification')
                    ->with([
                        'booking' => $this->booking,
                        'userEmail' => $this->userEmail,
                    ]);
    }
}
