<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionsController extends Controller
{
    public function index()
    {
        return view('client.subscriptions.index');
    }
}
