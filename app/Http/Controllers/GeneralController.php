<?php

namespace App\Http\Controllers;

use App\Mail\AccountCreated;
use App\Mail\EmailConfirmation;
use App\User;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function confirmEmail($token)
    {
        $user = User::where('email_verification_token', $token)->first();
        if(empty($user)){
            flash()->error('Invalid token');
            return redirect('/');
        }
        else{
            $user->confirmEmail();
            flash()->success('Email verification successful. Please login');
            return redirect('/login');
        }
    }

    public function mailable()
    {
        $user = User::find(1);
        $password = 'test123';
        //return new AccountCreated($user, $password);
        return new EmailConfirmation($user);
    }
}
