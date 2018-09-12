<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriberPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        if ($user->type=='client') {
            return true;
        }
        return null;
    }

    public function view(User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        if($user->type=='client-assistant'){
            return $user->actionModule('subscribers', 'compose');
        }
        return false;
    }

    public function update(User $user)
    {
        //check user own the message, has permission, and message not send already
        if($user->type=='client-assistant'){
            return $user->actionModule('subscribers', 'edit');
        }
        return false;
    }

    public function delete(User $user)
    {
        if($user->type=='client-assistant'){
            return $user->actionModule('subscribers', 'del');
        }
        return false;
    }
}
