<?php

namespace App\Http\Controllers\Client;

use App\Helpers\ClientHelper;
use App\Models\MessageSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{


    /**
     * SettingsController constructor.
     */
    public function __construct()
    {

    }

    public function index()
    {
        //$this->clientHelper()->checkMessageSettings();
        if($this->check()){
            $message_setting = $this->clientHelper()->client()->messageSetting;
            return view('client.settings.messages', compact('message_setting'));
        }
        return redirect('client/settings');

    }

    public function update($id, Request $request)
    {
        $message_setting = MessageSetting::findOrFail($id);
        if(!$message_setting->client_id==$this->clientHelper()->client()->id){
            flash()->error("Sorry, but it looks like you dont own this setting.");
            return back();
        }

        $this->validate($request, ['status'=>'required']);

        $message_setting->status = $request->status;
        $message_setting->save();
        flash()->success('Settings updated successfully');
        return redirect('client/messages');
    }


    //Helpers
    private function clientHelper(){
        return ClientHelper::getInstance();
    }

    public function check()
    {
        return !empty($this->clientHelper()->checkMessageSettings());
    }
}
