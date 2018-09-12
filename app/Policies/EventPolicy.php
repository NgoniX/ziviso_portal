<?php

namespace App\Policies;

use App\Models\Event;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
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

    public function view(User $user, Event $group)
    {
        return true;
    }

    public function create(User $user)
    {
        if($user->type=='client-assistant'){
            return $user->actionModule('events', 'compose');
        }
        return true;
    }

    public function update(User $user)
    {
        if($user->type=='client-assistant'){
            return $user->actionModule('events', 'edit');
        }
        return false;
    }

    public function delete(User $user)
    {
        if($user->type=='client-assistant'){
            return $user->actionModule('events', 'del');
        }
        return false;
    }
}
