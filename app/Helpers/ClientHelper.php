<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 13/9/2017
 * Time: 1:43 PM
 */

namespace App\Helpers;


use App\Models\GroupRequest;
use App\Models\Subscriber;

class ClientHelper
{
    private static $instance;

    public static function getInstance(){
        return self::$instance==null?new static():self::$instance;
    }

    public function joinRequests()
    {
        return GroupRequest::whereIn('group_id', $this->client()->groupz)->get();
    }

    public function joinRequestsArray()
    {
        return $this->joinRequests()->pluck('group_id', 'id')->toArray();
    }

    public function hasJoinRequest($request_id)
    {
        return array_key_exists($request_id, $this->joinRequestsArray());
    }

    public function clientEvents()
    {
        return $this->client()->events()->orderBy('start_time', 'DESC')->get();
    }

    public function clientEventsArray()
    {
        return $this->clientEvents()->pluck('title', 'id')->toArray();
    }

    public function hasEvent($event_id)
    {
        return array_key_exists($event_id, $this->clientEventsArray());
    }

    public function clientMessages()
    {
        return $this->client()->messages()->latest('created_at')->get();
    }

    public function clientMessagesArray()
    {
        return $this->clientMessages()->pluck('title', 'id')->toArray();
    }

    public function hasMessage($message_id)
    {
        return array_key_exists($message_id, $this->clientMessagesArray());
    }

    public function clientGroupsArray(){
        return $this->clientGroups()->pluck('name', 'id')->toArray();
    }

    public function clientGroups(){
        return $groups = auth()->user()->client->groups;
    }

    public function groupSubscribers()//all subscribers who are on client comm links
    {
        $groups_ids = $this->client()->groupz;
        $client_subscribers_ids = $this->clientSubscribers()->pluck('id')->toArray();
        $subscribers = Subscriber::whereNotIn('id', $client_subscribers_ids)
            ->whereHas('groups', function ($query) use ($groups_ids) {
            $query->whereIn('groups.id', $groups_ids);
        })

            ->get();

        return $subscribers;
    }

    public function groupSubscribersArray()
    {
        return $this->groupSubscribers()->pluck('id')->toArray();
    }

    public function combinedSubscribers()
    {
        return $this->groupSubscribers()->merge($this->clientSubscribers())->sort();
    }

    public function clientSubscribers(){
        return $subscribers = auth()->user()->client->subscribers;
    }
    public function clientSubscribersArray(){
        return $this->clientSubscribers()->pluck('profile', 'id')->toArray();
    }

    public function subscriberBelongsToClient($subscriber_id){
        return array_key_exists($subscriber_id, $this->clientSubscribersArray());
    }

    public function clientOwnsGroup($group_id){
        return array_key_exists($group_id, $this->clientGroupsArray());
    }

    public function client(){
        return auth()->user()->client;
    }

    public function clientUsersArray()
    {
        return $this->client()->users()->pluck('id')->toArray();
    }

    public function clientUsers()
    {
        return $this->client()->users();
    }

    public function clientHasUser($user_id)
    {
        return in_array($user_id, $this->clientUsersArray());
    }

    public function messageTypes()
    {
        return [
            'notification'=>'Notification',
            'email'=>'Email',
            'txt'=>'TXT Message',
        ];
    }

    public function checkMessageSettings()
    {
        $message_setting = $this->client()->messageSetting;
        if(empty($message_setting)){
            $message_setting = $this->client()->messageSetting()->create([
                'name'=>'express-sending', 'description'=>'Send messages without authorization',
                'status'=>'1'
            ]);
        }
        return $message_setting;
    }

}