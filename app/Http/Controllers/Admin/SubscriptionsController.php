<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 24/9/2017
 * Time: 8:43 AM
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class SubscriptionsController extends Controller
{
    public function index()
    {
        return view('admin.subscriptions.index');
    }

    public function update($id, Request $request)
    {
        return 'update';
    }

    public function show($id)
    {
        return 'show';
    }
}