<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ManualPaymentGuideMail extends Mailable
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
        $subject = 'ManualPaymentGuide';

        return $this->subject($subject)
            ->markdown('emails.manual_payment_guide')
            ->with($this->input);
    }
}
