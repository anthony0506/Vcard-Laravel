<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $input;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input, $email)
    {
        $this->input = $input;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Enquiry';

        return $this->subject($subject)
            ->markdown('emails.contactUs')
            ->with($this->input);
    }
}
