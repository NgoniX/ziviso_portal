<?php

namespace App\Http\Controllers\Client;

use App\Helpers\ClientHelper;
use App\Mail\GroupJoinUpdate;
use App\Models\GroupRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class RequestsController extends Controller
{
    public function index()
    {
        $requests = $this->clientHelper()->joinRequests();
        return view('client.subscribers.requests.index', compact('requests'));
    }

    public function update($id, Request $request)
    {
        $joinRequest = GroupRequest::findOrFail($id);
        $actionTaken = 'accepted';

        if(!$this->clientHelper()->hasJoinRequest($id)){
            flash("Action not allowed!")->error();
            return back();
        }

        //on accept update group_subscribers, delete entry

        $subscriber = Subscriber::findOrFail($joinRequest->subscriber_id);
        if($request->approve){
            $subscriber->groups()->syncWithoutDetaching([$joinRequest->group_id]);
            flash('Request approved successfully')->info();
        }
        elseif ($request->reject){
            $actionTaken = 'rejected';
            flash("Request rejected successfully")->error();
        }
        else{
            flash("Can't handle this request")->error();
            return back();

        }

        //Mail::to($subscriber->user)->send(new GroupJoinUpdate($joinRequest, $actionTaken));

        $joinRequest->delete();

        return redirect('client/subscribers/requests');

    }

    private function clientHelper(){
        return ClientHelper::getInstance();
    }
}
