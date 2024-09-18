<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    

    public function __construct($booking)
    {
        $this->booking = $booking;
       
    }

    public function build()
    {
        return $this->view('emails.bookingApprovedNotification')
                    ->with([
                        'booking' => $this->booking,
                        
                    ]);
    }
}
