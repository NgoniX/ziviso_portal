<?php

namespace App\Policies;

use App\Helpers\ClientHelper;
use App\User;
use App\Models\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    protected $message;

    /**
     * MessagePolicy constructor.
     * @param $message
     */
    public function __construct()
    {
        //$this->message = $message;
    }


    public function before($user, $ability)
    {
        if ($user->type=='client') {
            return true;
        }
        return null;
    }

    /**
     * Determine whether the user can view the message.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function view(User $user, Message $message)
    {
        return true;
    }

    /**
     * Determine whether the user can create messages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->type=='client-assistant'){
            return $user->actionModule('messages', 'compose');
        }
        return false;
    }

    /**
     * Determine whether the user can update the message.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function update(User $user, Message $message)
    {
        //check user own the message, has permission, and message not send already
        if($user->type=='client-assistant'){
            if($message->status=='0'){
                return $user->actionModule('messages', 'edit');
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the message.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function delete(User $user, Message $message)
    {
        if($user->type=='client-assistant'){
            if($message->status=='0'){
                return $user->actionModule('messages', 'del');
            }
        }
        return false;
    }

    public function authorizeSend(User $user)
    {
        $client = ClientHelper::getInstance()->client();
        if($client->anyOneCanSendMessages()){
            return true;
        }
        return $user->actionModule('messages', 'authorize_send');
    }
}
