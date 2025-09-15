<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->subject('Thanks for contacting us ')
                    ->markdown('emails.contact.reply')
                    ->with([
                    'details' => $this->details,
                    'products' => \App\Models\Product::take(3)->get(), // latest 3 products
                ]);
    }
}


//real
