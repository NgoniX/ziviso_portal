<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'authorizations')
            ->withPivot(['compose', 'edit', 'del', 'view', 'authorize_send'])
            ->withTimestamps();
    }

    public function hasUser($user)
    {
        return $this->users()
                ->where('users.id', $user)
                ->count() > 0;
    }

    public function user($user)
    {
        return $this->users()
                ->where('users.id', $user)
                ->first();
    }
}
