<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['created_by', 'user_id', 'description', 'logo', 'country_id', 'external_lock'];//other details in users table

    public function getGroupzAttribute()
    {
        return $this->groups()->pluck('id')->toArray();
    }

    public function subscribers()
    {
        /*return $this->belongsToMany('App\Models\Subscriber', 'client_subscribers')
            ->withTimestamps()->withPivot('id');*/
        return $this->hasMany('App\Models\Subscriber');
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function groups()
    {
        return $this->hasMany('App\Models\Group');
    }

    public function client_users()
    {
        return $this->hasMany('App\Models\ClientUser');
    }

    public function users()
    {
        $arr = $this->client_users()->pluck('user_id')->toArray();
        return User::whereIn('id', $arr)->get();
    }

    public function messageSetting()
    {
        return $this->hasOne('App\Models\MessageSetting');
    }

    public function anyOneCanSendMessages()
    {
        if(!empty($this->messageSetting)){
            return $this->messageSetting->status=='1';
        }
        return false;
    }

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
}
