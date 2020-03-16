<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusMail extends Mailable
{
    use Queueable, SerializesModels;

       public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
            $this->data = $data;
    }

    public function build()
    {
        $subject = 'Завершение заказа';
        return $this->view('emails.status')->subject($subject);
    }
}
