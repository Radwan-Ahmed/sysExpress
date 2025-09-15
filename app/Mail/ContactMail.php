<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name')) // Gmail SMTP sender
            ->replyTo($this->details['email'], $this->details['name'])     // User's email
            ->subject('New Message has Arrived')
            ->markdown('emails.contact.replyToAdmin')
            ->view('contact')
            ->with('details', $this->details);

    }

}

