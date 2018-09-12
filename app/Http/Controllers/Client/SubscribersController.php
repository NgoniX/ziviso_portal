<?php

namespace App\Http\Controllers\Client;

use App\Helpers\ClientHelper;
use App\Models\Country;
use App\Models\Subscriber;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;

class SubscribersController extends Controller
{
    private $subscriber_class;
    private $countries;

    /**
     * SubscribersController constructor.
     */
    public function __construct()
    {
        $this->subscriber_class=Subscriber::class;
        $this->countries = Country::get();
    }


    public function index()
    {
        $subscribers = $this->clientHelper()->combinedSubscribers();
        return view('client.subscribers.index', compact('subscribers'))
            ->with(['subscriber_class'=>$this->subscriber_class]);
    }

    public function create()
    {
        if (auth()->user()->can('create', $this->subscriber_class)) {
            $groups = $this->clientHelper()->clientGroups();
        }
        return view('client.subscribers.create', compact('groups'))->with(['countries'=>$this->countries]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:3',
            'country_id'=>'required',
            'email'=>'required|email|unique:users,email',
            'phone' => 'digits_between:7,15',
            //'profile'=>'required|min:5',
            'groupz'=>'required',
            //'username'=>'required|min:5|unique:users,username',
            //'password'=>'required|min:5|confirmed',
        ]);

        $pieces = explode(' ', $request->name);
        $name = $pieces[0];
        $surname = end($pieces);

        $username = $name.'.'.$surname;
        $username = User::getUserName($username);
        $password = bcrypt($surname);

        //create user of type subscriber
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password,
            'username'=>$username,
            'phone'=>$request->phone,
            'type'=>'subscriber',
            'status'=>'active',
            'confirmed'=>'yes',
        ]);

        //save user as subscriber
        $subscriber = $user->subscriber()->save(new Subscriber(['client_id'=>$this->clientHelper()->client()->id,
            'created_by'=>$request->user()->id, 'user_id'=>$user->id, 'profile'=>null,
            'country_id'=>$request->country_id]));

        //attach subscriber to client
        //$this->clientHelper()->client()->subscribers()->attach($subscriber->id);

        //sync subscriber groups
        $subscriber->groups()->sync($request->groupz);

        flash()->success('Subscriber added successfully!');
        return redirect('client/subscribers');
    }

    public function show($id)
    {
        $subscriber = Subscriber::with('groups')->with('creator')->with('messageReads')->findOrFail($id);
        if(!$this->clientHelper()->subscriberBelongsToClient($subscriber->id) AND
            !in_array($subscriber->id, $this->clientHelper()->groupSubscribersArray())){
            flash()->error("Sorry, you don't have rights to view this subscriber!");
            return back();
        }

        return view('client.subscribers.show', compact('subscriber'));
    }

    public function edit($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        if(!$this->clientHelper()->subscriberBelongsToClient($subscriber->id) or
            !auth()->user()->can('update', $this->subscriber_class)){
            flash()->error("Sorry, you can't edit a subscriber you didn't create!");
            return back();
        }
        $groups = $this->clientHelper()->clientGroups();
        $user = $subscriber->user;

        return view('client.subscribers.edit', compact('subscriber', 'user', 'groups'))->with(['countries'=>$this->countries]);

    }

    public function update($id, Request $request)
    {
        $user = User::findOrfail($id);
        $subscriber = $user->subscriber;

        if(auth()->user()->cannot('update', $this->subscriber_class)){
            flash()->error("Not authorized!!");
            return back();
        }

        if($request->remove){
            $subscriber->groups()->detach($this->clientHelper()->client()->groupz);
            if($this->clientHelper()->subscriberBelongsToClient($subscriber->id)){
                $subscriber->update(['client_id'=> null]);
            }
            flash()->info('Subscriber removed removed successfully');
            return back();

        }


        if(!$this->clientHelper()->subscriberBelongsToClient($subscriber->id)){
            flash()->error("Sorry, you don't have rights to do that on this subscriber!");
            return back();
        }


        $this->validate($request, [
            'name'=>'required|min:3',
            'country_id'=>'required',
            'email'=>['required','email',Rule::unique('users')->ignore($subscriber->user->id)],
            'phone' => 'digits_between:7,15',
            //'profile'=>'required|min:5',
            'groupz'=>'required',
            'username'=>[
                'required',
                'min:5',
                Rule::unique('users')->ignore($subscriber->user->id)],
        ]);

        if(!empty($request->password)){
            $this->validate($request, [
                'password'=>'required|min:5|confirmed',
            ]);

            $user->update(['password'=>bcrypt($request->password)]);
        }
        //update user credentials
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'username'=>$request->username,
            'phone'=>$request->phone,
        ]);

        //update groups
        $subscriber->groups()->sync($request->groupz);

        //update subscriber
        //$subscriber->profile = $request->profile;
        $subscriber->country_id = $request->country_id;
        $subscriber->save();

        flash()->success('Subscriber updated successfully!');
        return redirect('client/subscribers');

    }

    public function destroy($id)
    {
        flash()->warning('Sorry, this feature is not enabled yet!');
        return back();
    }

    private function clientHelper(){
        return ClientHelper::getInstance();
    }
}
