<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;




class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($date, $slot)
    {
        $this->date = $date;
        $this->slot = $slot;
    }

    public function build()
    {
        return $this->view('emails.booking_confirmation')
                    ->subject('Booking Confirmation')
                    ->with([
                        'date' => $this->date,
                        'slot' => $this->slot,
                    ]);
    }
}
