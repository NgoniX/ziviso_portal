<?php

namespace App\Mail;

use App\Models\GroupRequest;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GroupJoinUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $joinRequest;
    public $actionTaken;


    /**
     * GroupJoinUpdate constructor.
     * @param GroupRequest $joinRequest
     * @param $actionTaken
     */
    public function __construct(GroupRequest $joinRequest, $actionTaken)
    {
        $this->joinRequest = $joinRequest;
        $this->actionTaken = $actionTaken;
    }


    /**
     * @return $this
     */
    public function build()
    {
        return $this->subject('Request to Join Group '.ucfirst($this->actionTaken))
            ->markdown('emails.group_join_update');
    }
}
