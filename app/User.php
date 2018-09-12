<?php

namespace App;

use Illuminate\Auth\Passwords\CanResetPassword as AuthCanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements CanResetPassword
{
    use AuthCanResetPassword, HasApiTokens, Notifiable;// NtrustUserTrait;

    /*
     * Role profile to get value from ntrust config file.
     */
    protected static $roleProfile = 'user';

    protected $fillable = ['name', 'email', 'password','username', 'phone', 'type', 'status', 'confirmed',
        'email_verification_token'];
    protected $hidden = ['password', 'remember_token'];

    //scopes
    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    //active,inactive,//admin,client,subscriber

    //For oauth
    public function findForPassport($username) {
        return self::where('username', $username)
            ->where('status', 'active')
            ->where('confirmed', 'yes')
            ->first();
    }

    /*
     * more....
     */
    public function subscribers()
    {
        return $this->hasMany('App\Models\Subscriber', 'client_id', 'id');
    }

    public function client()
    {
        if(auth()->user()->type=='client-assistant'){
           $client = static::findOrFail($this->client_user->client->user->id);
           return $client->hasOne('App\Models\Client');
        }

        return $this->hasOne('App\Models\Client', 'user_id', 'id');
    }

    public function subscriber()
    {
        return $this->hasOne('App\Models\Subscriber', 'user_id', 'id');
    }

    public function clients() //all clients created by user
    {
        return $this->hasMany('App\Models\Client', 'created_by', 'id');
    }

    public function client_user()//users created by clients to help administer client's stuff
    {
        return $this->hasOne('App\Models\ClientUser');
    }

    public function modules()
    {
        return $this->belongsToMany('App\Models\Module', 'authorizations')
            //->using('App\Models\Authorization')
            ->withPivot(['compose', 'edit', 'del', 'view', 'authorize_send'])
            ->withTimestamps();
    }

    public function hasModule($module)
    {
        return $this->modules()
                ->where('modules.name', $module)
                //->orWhere('modules.name', $module)
                ->count() > 0;
    }

    public function module($module)
    {
        return $this->modules
                ->where('name', $module)
                //->orWhere('modules.name', $module)
                ->first();
    }

    public function actionModule($module, $action)
    {
        if($this->hasModule($module)){
            return $this->module($module)->pivot->$action=='1';
        }
        return false;
    }

    public function authorizations()
    {
        return $this->hasMany('App\Models\Authorization');
    }

    /**
     * Confirm the user.
     *
     * @return void
     */
    public function confirmEmail()
    {
        $this->confirmed = 'yes';
        $this->status = 'active';
        $this->email_verification_token = null;
        $this->save();
    }

    public function isActive()
    {
        return $this->status=='active';
    }

    public static function getUserName($username): String{
        $count = 0;
        $entry = static::where('username', $username)->first();
        if(empty($entry)){
           return $username;
        }

        while($count < INF){
            $username = $username.$count;
            $entry = static::where('username', $username)->first();
            if (empty($entry)){
                break;
            }
            $count ++;
        }

        return $username;
    }
}
