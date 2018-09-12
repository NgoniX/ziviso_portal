<?php

namespace App\Mail;

use App\Models\Message;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $message;

    /**
     * Create a new message instance.
     *
     * @param User $users
     */
    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->message->title)->markdown('emails.email_message');
    }
}
