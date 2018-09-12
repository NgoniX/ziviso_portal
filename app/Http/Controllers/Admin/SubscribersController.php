<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 24/9/2017
 * Time: 8:43 AM
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class SubscribersController extends Controller
{
    public function index()
    {
        $users = User::with('subscriber.groups.client.user')->type('subscriber')->active()->get();
        return view('admin.subscribers.index', ['users'=>$users]);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        if($request->deactivate){
            $user->status = $user->status=='active'?'inactive':'active';
            $user->save();
            flash()->info("Subscriber updated successfully!");
            return back();
        }
    }

    public function show($id)
    {
        //
    }
}