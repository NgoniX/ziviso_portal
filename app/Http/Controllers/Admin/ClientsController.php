<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Upload;
use App\Mail\AccountCreated;
use App\Models\Client;
use App\Models\Country;
use App\Models\Message;
use App\Models\MessageSetting;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ClientsController extends Controller
{
    private $countries;

    /**
     * ClientsController constructor.
     * @param $countries
     */
    public function __construct()
    {
        $this->countries = Country::get();
    }


    public function index()
    {
        $clients = User::where('type', 'client')->get();
        return view("admin.clients.index", ['clients'=>$clients]);
    }

    public function create()
    {
        return view('admin.clients.create')->with(['countries'=>$this->countries]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:3',
            'country_id'=>'required',
            'email'=>'required|email|unique:users,email',
            'phone' => 'required',
            'description'=>'required|min:5',
            'username'=>'required|min:5|unique:users,username',
            'password'=>'required|min:5|confirmed',
            'logo'=>'mimes:jpeg,jpg,bmp,png,gif',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'username'=>$request->username,
            'phone'=>$request->phone,
            'type'=>'client',
            'status'=>'active',
            'confirmed'=>'yes',
        ]);

        //create client account
        $client = $user->client()->save(new Client(['created_by'=>$request->user()->id, 'user_id'=>$user->id,
            'description'=>$request->description, 'country_id'=>$request->country_id]));

        //Create message settings
        $message_settings = MessageSetting::create(['name'=>'express-sending', 'description'=>'Send messages without authorization',
            'status'=>'1', 'client_id'=>$client->id]);

        //save logo
        Upload::getInstance()->saveClientLogo($request, $client);

        //send email to client
        Mail::to($user)->send(new AccountCreated($user, $request->password));

        flash()->success('Client added successfully!');
        return redirect('admin/clients');
    }

    public function show($id)
    {
        $user = User::with('client')->findOrFail($id);
        return view('admin.clients.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::with('client')->findOrFail($id);
        return view('admin.clients.edit', compact('user'))->with(['countries'=>$this->countries]);;
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->deactivate){
            $user->status = $user->status=='active'?'inactive':'active';
            $user->save();
            flash()->info("Client updated successfully!");
            return back();
        }

        $this->validate($request, [
            'country_id'=>'required',
            'name'=>'required|min:3',
            'email'=>['required','email',Rule::unique('users')->ignore($user->id)],
            'phone' => 'required',
            'description'=>'required|min:5',
            'username'=>[
                'required',
                'min:5',
                Rule::unique('users')->ignore($user->id)],
        ]);

        if (!empty($request->password)) {
            $this->validate($request, [
                'password' => 'required|min:5|confirmed',
            ]);
        }

        //updates here....
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'phone'=>$request->phone,
            'type'=>'client',
            'status'=>'active'
        ]);

        if(!empty($request->password)){
           $user->update(['password'=>bcrypt($request->password),]);
        }

        $client = $user->client;
        $client->country_id = $request->country_id;
        $client->save();

        //save logo
        Upload::getInstance()->saveClientLogo($request, $client);

        flash()->success("Client updated successfully!!");
        return redirect("admin/clients");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        flash("Deleted!!")->error();
        return redirect("/admin/clients");
    }

    public function showMessage($id)
    {
        $message = Message::findOrfail($id);
        return view('admin.clients.message', compact('message'));
    }
}
