<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingGuestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $user;
    public $password;

    /**
     * Create a new message instance.
     */
    public function __construct($booking, $user, $password = null)
    {
        $this->booking = $booking;
        $this->user = $user;
        $this->password = $password;
        // dd($this->booking);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Thanks - You've Succefully Signed Up at " . config('app.name'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // dd($this->booking);
        return new Content(
            view: 'emails.bookingcancellation',
            with: [
                'booking' => $this->booking,
                'user' => $this->user,
                'password' => $this->password
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
    /**
     * Build the message (alternative to content() if you prefer this syntax)
     */
}
