<?php

namespace App\Policies;

use App\Models\Group;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
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

    public function view(User $user, Group $group)
    {
        return true;
    }

    public function create(User $user)
    {
        if($user->type=='client-assistant'){
            return $user->actionModule('groups', 'compose');
        }
        return true;
    }

    public function update(User $user)
    {
        if($user->type=='client-assistant'){
            return $user->actionModule('groups', 'edit');
        }
        return false;
    }

    public function delete(User $user)
    {
        if($user->type=='client-assistant'){
            return $user->actionModule('groups', 'del');
        }
        return false;
    }
}
