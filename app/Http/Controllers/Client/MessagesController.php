<?php

namespace App\Http\Controllers\Client;

use App\Helpers\ClientHelper;
use App\Helpers\ProcessMessage;
use App\Models\Message;
use App\Services\CustomPaginator;
use App\Services\FCMService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{

    private $message_class;
    public function __construct()
    {
        $this->message_class = Message::class;

    }

    public function index()
    {
        $this->clientHelper()->checkMessageSettings();
        $messages = $this->clientHelper()->clientMessages();
        $messages = CustomPaginator::getInstance()->paginateCollection($messages);
        return view('client.messages.index')->with(['messages'=>$messages, 'message_class'=>$this->message_class]);
    }

    public function create()
    {
        if (auth()->user()->can('create', $this->message_class)) {
            $groups = $this->clientHelper()->clientGroups();
            $messageTypes = $this->clientHelper()->messageTypes();
            return view('client.messages.create', compact('groups', 'messageTypes'));
        }
        flash()->error('Action not authorized!!');
        return back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type'=>'required',
            'title'=>'required|min:5',
            'groupz'=>'required',
            'details'=>'required|min:10',
        ]);

        if (!$request->type=='notification' and !$request->type=='email'){
            flash()->error('Sorry only notification and email messages allowed at the moment!');
            return back();
        }

        $groupz = $request->groupz;
        if(in_array('all', $groupz)){
            $groupz = $this->clientHelper()->client()->groupz;
        }

        //save to db
        $message  = Message::create(['user_id'=>auth()->user()->id,'client_id'=>$this->clientHelper()->client()->id,
            'title'=>$request->title, 'details'=>$request->details, 'status'=>'0', 'target'=>'groups',
            'authorized'=>'0', 'type'=>$request->type]);

        $message->groups()->sync($groupz);

        //if authorized and sent assign message to groups, then subscribers

        /*if(auth()->user()->can('authorizeSend', $this->message_class)){
            $this->sendMessage($message);
        }*/

        //flash and redirect

        flash()->success('Message processed successfully');
        return redirect('client/messages');

    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        if(!$this->clientHelper()->hasMessage($id)){
            flash()->error('You cant view that message');
            return back();
        }

        return view('client.messages.show', compact('message'));
    }

    public function edit($id)
    {
        $message = Message::findOrFail($id);
        if(!$this->clientHelper()->hasMessage($id)){
            flash()->error('You cant view that message');
            return back();
        }
        if($message->status=='1' or auth()->user()->cannot('update', $this->message_class)){
            flash()->error('Action not authorized or Message already sent!!');
            return back();
        }
        $groups = $this->clientHelper()->clientGroups();
        $messageTypes = $this->clientHelper()->messageTypes();

        return view('client.messages.edit', compact('message', 'messageTypes', 'groups'));
    }

    public function update($id, Request $request)
    {
        $message = Message::findOrFail($id);
        if(!$this->clientHelper()->hasMessage($id)){
            flash()->error('You cant view that message');
            return back();
        }
        if($message->status=='1' or $message->authorize=='1'){
            flash()->error('Action not allowed, message already sent!!');
            return back();
        }

        if($request->authorize){
            if(auth()->user()->can('authorizeSend', $this->message_class)){
                $this->sendMessage($message);
                $this->sendNotify($message);
                flash()->message("Message sent!");
                return back();
            }
        }

        $this->validate($request, [
            'type'=>'required',
            'title'=>'required|min:5',
            'groupz'=>'required',
            'details'=>'required|min:10',
        ]);

        if (!$request->type=='notification'){
            flash()->error('Sorry only app messages allowed at the moment!');
            return back();
        }

        $groupz = $request->groupz;
        if(in_array('all', $groupz)){
            $groupz = $this->clientHelper()->client()->groupz;
        }

        $message->update(['title'=>$request->title, 'details'=>$request->details, 'type'=>$request->type]);

        $message->groups()->sync($groupz);

        if(auth()->user()->can('authorizeSend', $this->message_class)){
            $this->sendMessage($message);
        }

        flash('Message updated!')->info();
        return back();


    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        if(!$this->clientHelper()->hasMessage($id)){
            flash()->error('Not authorized!');
            return back();
        }
//        if($message->status=='1' or $message->authorize=='1'){
//            flash()->error('Action not allowed, message already sent!!');
//            return back();
//        }
        if(auth()->user()->can('delete', $message)){
            $message->delete();
            flash()->info('Message deleted!!');
            return redirect('client/messages');
        }
        flash("Looks like something went wrong")->error();
        return back();
    }

    private function clientHelper(){
        return ClientHelper::getInstance();
    }

    /**
     * @param $message
     */
    public function sendMessage($message)
    {
        $messageProcessor = new ProcessMessage($message);
        $messageProcessor->send();
    }

    /**
     * @param $message
     */
    public function sendNotify($message)
    {
        $sendNotify = new FCMService();
        $sendNotify->sendFCMNotification($message);
    }

}
