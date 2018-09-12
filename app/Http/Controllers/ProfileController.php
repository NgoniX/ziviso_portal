<?php

namespace App\Http\Controllers;

use App\Helpers\ClientHelper;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        $user = \Auth::user();
        $logo = null;
        if($user->type=='client' OR $user->type=='client-assistant'){
            $logo = ClientHelper::getInstance()->client()->logo;
        }
        return view('profile.index', compact('user', 'logo'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = $request->user();
        if(!Hash::check($request->old_password, $user->password)){
            flash()->error('This is not your current password. Try again!');
            return redirect()->back();
        }

        $this->validate($request, [
            'password'=>'required|confirmed|min:8',
        ]);
        $user->password = bcrypt($request->input('password'));
        $user->save();


        flash()->success('Password Changed successfully!!');
        return back();
    }

}
