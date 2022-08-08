<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyApplicants extends Mailable
{
    use Queueable, SerializesModels;

    private $content;
    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $message)
    {
        $this->content = $content;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verification')->with($this->content, $this->message);
    }
}
