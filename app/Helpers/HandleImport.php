<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 26/9/2017
 * Time: 9:31 PM
 */

namespace App\Helpers;


use App\User;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HandleImport
{
    private static $instance;

    public static function getInstance(){
        return self::$instance==null?new static():self::$instance;
    }

    public function importSubscribers(Request $request){

        $success = [];
        $errors = [];

        //save users to db
        if($request->hasFile('file')){

            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function ($reader){})->get();

            if(!empty($data) && $data->count()){
                $arr = $data->toArray();
                foreach ($arr as $key=>$value){
                    if(!empty($value[0])){
                        foreach($value as $key=>$value){
                            list($success, $errors) = $this->saveUser($request, $value, $success, $errors);
                        }
                    }
                    else{
                        list($success, $errors) = $this->saveUser($request, $value, $success, $errors);
                    }

                }
            }

        }

        return ['success'=>$success, 'errors'=>$errors];
    }

    private function importErrors()
    {
        return [
            'username'=>'Attempted Username already taken by another person.',
            'email'=>'Email already taken by another person.',
        ];
    }

    private function usernameExists($username){
        return !empty(User::where('username', $username)->first())?true:false;
    }

    private function emailExists($email){
        if(!is_null($email)){
            return !empty(User::where('email', $email)->first())?true:false;
        }
        return false;
    }
    private function clientHelper(){
        return ClientHelper::getInstance();
    }

    public function saveUser(Request $request, $value, $success, $errors)
    {
        if (!empty($value) && (!empty($value['name']) && !empty($value['surname']))) {
            $user = new User();
            $user->name = $value['name'] . ' ' . $value['surname'];
            $user->email = !empty($value['email']) ? $value['email'] : null;
            $user->password = !empty($value['password']) ? bcrypt($value['password']) : bcrypt($value['surname']);
            $user->username = !empty($value['username']) ? $value['username'] : $value['surname'] . substr($value['name'], 0, 1);
            $user->phone = !empty($value['phone']) ? $value['phone'] : null;
            $user->type = 'subscriber';
            $user->status = 'active';
            $user->confirmed = 'yes';
            $user->email_verification_token = null;
            $profile = empty($value['profile']) ? 'Subscrider' : $value['profile'];
            if (!$this->usernameExists($user->username)) {
                if (!$this->emailExists($user->email)) {
                    $user->save();

                    //save subscriber
                    $subscriber = $user->subscriber()->save(new Subscriber(['client_id' => $this->clientHelper()->client()->id,
                        'created_by' => $request->user()->id, 'user_id' => $user->id, 'profile' => $profile,
                        'country_id' => $request->country_id]));

                    //update groups
                    $subscriber->groups()->sync($request->groupz);

                    //push to success
                    array_push($success, $user->name);
                } else {
                    array_push($errors, [$user->name => $value['email'] . ': ' . $this->importErrors()['email']]);
                }
            } else {
                array_push($errors, [$user->name => $user->username . ': ' . $this->importErrors()['username']]);
            }
        }

        return array($success, $errors);
    }
}