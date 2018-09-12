<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 27/9/2017
 * Time: 12:22 PM
 */

namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use App\Mail\EmailConfirmation;
use App\Models\Client;
use App\Models\Country;
use App\Models\Event;
use App\Models\Group;
use App\Models\GroupRequest;
use App\Models\Message;
use App\Models\Subscriber;
use App\Models\SubscriberToken;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{

    public function register(Request $request)
    {
        $country = Country::where('name', 'Zimbabwe')->first();
        $this->validate($request, [
            'name'=>'required|min:2',
            'email'=>'required|email',
            'phone' => 'required|digits_between:7,15',
            'profile'=>'nullable|sometimes|min:5',
            'country'=>'nullable|sometimes',
            'username'=>'required|min:4|unique:users,username',
            'password'=>'required|min:5|confirmed',
        ]);

        if(!empty($request->country)){
            $c = Country::where('name', $request->country)->first();
            if(!empty($c)){
                $country = $c;
            }
        }

        $user = new User();
        $user->name = $request->name;
        $user->email=$request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->type = 'subscriber';
        $user->status = 'active'; //'inactive';
        $user->confirmed =  'yes'; //'no';
        $user->email_verification_token = null; //str_random(60);
        $user->save();

        $profile = empty($request->profile)?null:$request->profile;

        $subscriber = Subscriber::create(['user_id'=>$user->id, 'created_by'=>$user->id,
            'profile'=>$profile, 'country_id'=>$country->id]);

        return response()->json($user, 201);
    }

    public function user()
    {
        $user_temp = auth()->user();
        $user = User::with('subscriber.country')->find($user_temp->id);
        return response()->json($user, 200);
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'current_password'=>'required|min:5',
            'password'=>'required|min:5|confirmed',
        ]);

        if(!Hash::check($request->input('current_password'), $user->password)){
            return response()->json('invalid_current_password',400);
        }

        $user->password = bcrypt($request->input('password'));
        $user->save();
        return response()->json(['success' => 'password_changed'],202);

    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'name'=>'required|min:2',
            'email'=>'required|email',
            'phone' => 'digits_between:7,15',
            //'profile'=>'required|min:5',
        ]);

        $user->name = $request->name;
        $user->email=$request->email;
        $user->phone = $request->phone;
        $user->save();
        response()->json('user_updated',202);
    }

    public function events()
    {
        $groups_array = $this->groups()->pluck('id')->toArray();

        $events = Event::with(['groups'])->whereHas('groups', function ($query) use ($groups_array){
            $query->whereIn('groups.id', $this->groups()->pluck('id')->toArray());
        })
            ->with("eventGroups")
            ->with('client')
            ->get();

        return $events;
    }

    public function groups()
    {
        return auth()->user()->subscriber->groups()->get();
    }

    public function joinGroup($group_id){

        $group = Group::find($group_id);
        if(empty($group)){
            return response()->json('group_not_found', 404);
        }

        $user = auth()->user();
        if($user->subscriber->hasGroup($group->id)){
            return response()->json('already_a_member_of_group', 409);
        }
        elseif ($user->subscriber->hasGroupRequest($group_id)){
            return response()->json('request_already_logged', 409);
        }

        if($group->join_criteria=='open'){
            $user->subscriber->groups()->syncWithoutDetaching([$group->id]);
            return response()->json('successfully_joined_group', 201);
        }
        else{
            $join_request = new GroupRequest();
            $join_request->group_id = $group->id;
            $join_request->subscriber_id = $user->subscriber->id;
            $join_request->save();

            return response()->json('request_logged_waiting_for_approval', 201);
        }
    }

    public function exitGroup($group_id){

        $group = Group::find($group_id);

        if(empty($group)){
            return response()->json('group_not_found', 404);
        }

        $user = auth()->user();
        if($user->subscriber->hasGroup($group->id)){
            $user->subscriber->groups()->detach([$group->id]);
            return response()->json('group_exited_successfully', 202);//accepted
        }

        return response()->json('group_membership_not_found', 404);
    }

    public function messages()
    {
        return $subscriber = auth()->user()->subscriber->messages();
    }

    public function readMessages()
    {
        return $subscriber = auth()->user()->subscriber->readMessages();
    }

    public function unreadMessages()
    {
        return $subscriber = auth()->user()->subscriber->unreadMessages();
    }

    public function readMessage($message_id){

        $subscriber = auth()->user()->subscriber;

        $message = Message::find($message_id);

        if(empty($message) || !$subscriber->hasMessage($message->id)){
            return response()->json('message_not_found', 404);
        }
        elseif ($subscriber->hasReadMessage($message_id)){
            return response()->json('message_already_read', 409);
        }

        $messageRead = $subscriber->messageReadInfo($message_id);
        $messageRead->status='1';
        $messageRead->save();

        return response()->json('message_successfully_read', 202);
    }

    public function deleteMessage($message_id){

        $subscriber = auth()->user()->subscriber;

        $message = Message::find($message_id);

        if(empty($message) || !$subscriber->hasMessage($message->id)){
            return response()->json('message_not_found', 404);
        }

        $messageRead = $subscriber->messageReadInfo($message_id);
        $messageRead->delete();

        return response()->json('message_deleted', 202);
    }

    public function clients()
    {
        return $clients =  Client::with('user')->with('country')->with(['groups'])->get();
    }

    public function myClients()
    {
        $subscriber = auth()->user()->subscriber;
        return $clients =  Client::whereHas('groups', function ($query) use ($subscriber){
            $query->whereIn('groups.id', $subscriber->groupz);
        })->with('user')->with('country')->with(['groups'])->get();
    }

    public function countries(){
        $countries = Country::get();
        return response()->json($countries, 201);
    }

    public function joinRequests(){
        $subscriber = auth()->user()->subscriber;
        return $subscriber->join_requests()->with('group.client.user')->get();
    }

    public function fcmToken(Request $request)
    {
        $user = auth()->user();

        $token = new SubscriberToken();
        $token->token = $request->token;
        $token->user_id=$user->id;
        $token->save();
    }
}
