<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 24/9/2017
 * Time: 7:17 PM
 */

namespace App\Helpers;


use App\Mail\EmailMessage;
use App\Models\Message;
use App\Models\MessageRead;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class ProcessMessage
{

    private $message;

    /**
     * ProcessMessage constructor.
     * @param $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     *
     */
    public function send()
    {

        $message = $this->message;

        //Get message subscribers
        $subscribers = Subscriber::whereHas('groups', function ($query) use ($message) {
            $query->whereIn('groups.id', $message->groups()->get()->pluck('id')->toArray());
        })->get();

        if($this->message->type=='notification'){
            foreach ($subscribers as $subscriber) {
                if ($subscriber->user->status == 'active') {
                    $subscriber->messageReads()->save(new MessageRead(['message_id' => $message->id, 'status' => '0']));
                }
            }

            $this->updateSendMessage($this->message);

        }
        elseif ($this->message->type=='email'){
            foreach ($subscribers as $subscriber) {
                $user = $subscriber->user;
                if ($user->status == 'active' and !empty($user->email)) {
                    Mail::to($subscriber->user)->send(new EmailMessage($user, $this->message));
                    $subscriber->messageReads()->save(new MessageRead(['message_id' => $message->id, 'status' => '1']));
                }
            }

            $this->updateSendMessage($this->message);
        }
        else{
            flash("TXT Messages not yet working")->error();
            return back();
        }



        return 'Done';
    }

    private function updateSendMessage($message){
        $message->status = '1';
        $message->authorized = '1';
        $message->save();
    }



}
