<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if($user->type=='admin' or $user->type=='admin-assistant'){
            return redirect('/admin');
        }
        elseif ($user->type=='client' or $user->type=='client-assistant'){
            if(!$user->client->user->isActive()){
                auth()->logout();
                flash()->error("Sorry, your client account is not active!");
                return redirect()->route('login');
            }
            return redirect('/client');
        }
        elseif ($user->type=='subscriber'){
            auth()->logout();
            flash()->error("Sorry, subscribers are not allowed to login from here!");
            return redirect()->route('login');
        }
        else{
            auth()->logout();
            flash()->error("These login details have not been recognised, please try again");
            return redirect()->route('login');
        }
        //return view('home');
    }
}
