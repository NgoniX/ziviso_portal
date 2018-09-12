<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 14/9/2017
 * Time: 10:35 AM
 */

namespace App\Http\Controllers\Client;


use App\Helpers\ClientHelper;
use App\Http\Controllers\Controller;
use App\Models\ClientUser;
use App\Models\Module;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index()
    {
        $users = $this->clientHelper()->clientUsers();
        return view('client.users.index', compact('users'));
    }

    public function create()
    {
        return view('client.users.create');
    }

    public function edit($id)
    {
        $user = User::with('modules')->findOrFail($id);

        if(!$this->clientHelper()->clientHasUser($id)){
            flash()->error('Sorry, looks like this user is not under your jurisdiction');
            return back();
        }

        return view('client.users.edit', ['user'=>$user]);
    }

    public function show()
    {
        flash()->error('Sorry, you should be lost!');
        return back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'phone' => 'digits_between:7,15',
            'username'=>'required|min:5|unique:users,username',
            'password'=>'required|min:5|confirmed',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'username'=>$request->username,
            'phone'=>$request->phone,
            'type'=>'client-assistant',
            'status'=>'active'
        ]);

        //save user as client-user
        $client_user = $this->clientHelper()->client()->client_users()->save(new ClientUser( ['user_id'=>$user->id] ));

        //assign privileges to user
        //message
        $authorise_send_message = empty($request->message_authorize_send)?'0':'1';
        $create_message = empty($request->message_create)?'0':'1';
        $edit_message = empty($request->message_edit)?'0':'1';
        $del_message = empty($request->message_del)?'0':'1';

        $module = Module::where('name', 'messages')->first();
        $module->users()->attach($user->id, ['view'=>'1','compose'=>$create_message, 'edit'=>$edit_message,
            'del'=>$del_message, 'authorize_send'=>$authorise_send_message]);

        //Subscribers
        $create_subscriber = empty($request->subscriber_create)?'0':'1';
        $edit_subscriber = empty($request->subscriber_edit)?'0':'1';
        $del_subscriber = empty($request->subscriber_del)?'0':'1';

        $module = Module::where('name', 'subscribers')->first();
        $module->users()->attach($user->id, ['view'=>'1','compose'=>$create_subscriber, 'edit'=>$edit_subscriber,
            'del'=>$del_subscriber, 'authorize_send'=>'1']);

        //Groups
        $create_group = empty($request->group_create)?'0':'1';
        $edit_group = empty($request->group_edit)?'0':'1';
        $del_group = empty($request->group_del)?'0':'1';

        $module = Module::where('name', 'groups')->first();
        $module->users()->attach($user->id, ['view'=>'1','compose'=>$create_group, 'edit'=>$edit_group,
            'del'=>$del_group, 'authorize_send'=>'1']);

        flash()->success('User added successfully!');
        return redirect('client/users');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if(!$this->clientHelper()->clientHasUser($id)){
            flash()->error('Sorry, looks like this user is not under your jurisdiction');
            return back();
        }

        if($request->deactivate){
            $user->status = $user->status=='active'?'inactive':'active';
            $user->save();
            flash()->info("User updated successfully!");
            return back();
        }

        //validate
        $this->validate($request, [
            'name'=>'required|min:3',
            'phone' => 'digits_between:7,15',
            'username'=>[
                'required',
                'min:5',
                Rule::unique('users')->ignore($user->id)],
            'email'=>[
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)],
        ]);

        if(!empty($request->password)){
            $this->validate($request, [
                'password'=>'required|min:5|confirmed',
            ]);

            $user->update(['password'=>bcrypt($request->password)]);
        }

        //update
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'username'=>$request->username,
            'phone'=>$request->phone,
        ]);

        //update privileges to user
        //message
        $authorise_send_message = empty($request->message_authorize_send)?'0':'1';
        $create_message = empty($request->message_create)?'0':'1';
        $edit_message = empty($request->message_edit)?'0':'1';
        $del_message = empty($request->message_del)?'0':'1';

        $module = Module::where('name', 'messages')->first();
        $module->users()->syncWithoutDetaching([$user->id => ['view'=>'1','compose'=>$create_message, 'edit'=>$edit_message,
            'del'=>$del_message, 'authorize_send'=>$authorise_send_message]]);

        //Groups
        $create_group = empty($request->group_create)?'0':'1';
        $edit_group = empty($request->group_edit)?'0':'1';
        $del_group = empty($request->group_del)?'0':'1';

        $module = Module::where('name', 'groups')->first();
        $module->users()->syncWithoutDetaching([$user->id =>['view'=>'1','compose'=>$create_group, 'edit'=>$edit_group,
            'del'=>$del_group, 'authorize_send'=>'1']]);

        //Subscribers
        $create_subscriber = empty($request->subscriber_create)?'0':'1';
        $edit_subscriber = empty($request->subscriber_edit)?'0':'1';
        $del_subscriber = empty($request->subscriber_del)?'0':'1';

        $module = Module::where('name', 'subscribers')->first();
        $module->users()->syncWithoutDetaching([$user->id => ['view'=>'1','compose'=>$create_subscriber, 'edit'=>$edit_subscriber,
            'del'=>$del_subscriber, 'authorize_send'=>'1']]);

        //events
        $create_event = empty($request->event_create)?'0':'1';
        $edit_event = empty($request->event_edit)?'0':'1';
        $del_event = empty($request->event_del)?'0':'1';

        $module = Module::where('name', 'events')->first();
        $module->users()->syncWithoutDetaching([$user->id => ['view'=>'1','compose'=>$create_event, 'edit'=>$edit_event,
            'del'=>$del_event, 'authorize_send'=>'1']]);

        flash()->success('User updated successfully!');
        return redirect('client/users');
    }

    public function destroy($id)
    {
        flash()->error("sorry users cant be deleted from the system");
        return back();
    }

    private function clientHelper(){
        return ClientHelper::getInstance();
    }
}