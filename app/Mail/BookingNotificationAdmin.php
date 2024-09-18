<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingNotificationAdmin extends Mailable
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
        return $this->view('emails.bookingNotificationAdmin')
                    ->with([
                        'booking' => $this->booking,
                        'userEmail' => $this->userEmail,
                    ]);
    }
}
