<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 5/2/2018
 * Time: 10:22
 */

namespace App\Services;


use App\Models\Message;
use App\Models\SubscriberToken;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class FCMService
{
    public function sendFCMNotification(Message $message){


        $downstreamResponse = $this->sendMessageToTokens($message, $message->tokensArray());

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

        // $tokens_to_delete = $downstreamResponse->tokensToDelete();
        // $tkns = SubscriberToken::whereIn('token', $tokens_to_delete)->get();
        // foreach($tkns as $t){
        //     $t->delete();
        // }

        $tokens_to_update = $downstreamResponse->tokensToModify();
        foreach ($tokens_to_update as $item=>$value){
            $entry = SubscriberToken::where('token', $item)->first();
            $entry->token = $value;
            $entry->save();
        }

        // $error_tokens = $downstreamResponse->tokensWithError();
        // $tt = array_keys($error_tokens);
        // $suspects = SubscriberToken::whereIn('token', $tt)->get();
        // foreach($suspects as $entry){
        //     $entry->delete();
        // }

        $tokens_to_retry = $downstreamResponse->tokensToRetry();

        if(!empty($tokens_to_retry)){
            $downstreamResponse = $this->sendMessageToTokens($message, $tokens_to_retry);
        }

        return;
    }

    public function sendMessageToTokens(Message $message, $tokens){
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($message->title);
        $notificationBuilder->setBody($message->short_content)->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['message' => $message]);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        return $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);
    }
}
