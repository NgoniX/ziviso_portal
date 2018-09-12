<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Message;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {

        $subscribers = User::active()->type('subscriber')->get();
        $clients = User::active()->type('client')->get();
        $messages = Message::get();
        $events = Event::where('end_time', '>=', Carbon::now())->get();
        return view("admin.index")
            ->with(['subscribers'=>$subscribers, 'clients'=>$clients, 'messages'=>$messages, 'events'=>$events]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
