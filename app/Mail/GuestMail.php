<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GuestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $bodyContent;

    public function __construct($bodyContent)
    {
        $this->bodyContent = $bodyContent;
    }

    public function build()
    {
        return $this->view('emails.simple')
            ->with(['bodyContent' => $this->bodyContent])
            ->subject('Your Email Subject');
    }
}
