<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendWithdrawalRequestChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;
    public string $mailSubject;
    public string $mailView;


    /**
     * Create a new message instance.
     * @param array $data
     * @param string $subject
     * @param string $mailView
     */
    public function __construct(array $data, string $subject, string $mailView)
    {
        $this->data = $data;
        $this->mailSubject = $subject;
        $this->mailView = $mailView;
    }

    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mailSubject)
            ->from(getenv('MAIL_FROM_ADDRESS'))
            ->markdown($this->mailView)
            ->with($this->data);
    }
}
