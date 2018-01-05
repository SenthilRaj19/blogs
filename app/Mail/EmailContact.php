<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailContact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $subject;
    public $message;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$subject,$message)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rramalingam@penriteoil.com.au')
        ->view('emails.contact');
    }
}
