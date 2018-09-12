<?php

namespace App\Http\Controllers\Client;

use App\Helpers\ClientHelper;
use App\Helpers\HandleImport;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function import()
    {
        $countries = Country::get();
        $groups = $this->clientHelper()->clientGroups();
        return view('client.subscribers.import.index', compact('countries', 'groups'));
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'country_id'=>'required',
            //'file'=>'required|mimes:csv,xlsx,xls,txt',
            'groupz'=>'required',
        ]);

        $arr = HandleImport::getInstance()->importSubscribers($request);

        $data = $arr;
        $success = $data['success'];
        $errors = $data['errors'];

        return view('client.subscribers.import.outcome', compact('data', 'success', 'errors'));

        return redirect()->action('Client\ImportController@outcome', ['arr'=>urlencode(serialize($arr))]);

    }

    public function outcome($arr)
    {
        $data = unserialize(urldecode($arr));
        $success = $data['success'];
        $errors = $data['errors'];
        //dd($errors);


        return view('client.subscribers.import.outcome', compact('data', 'success', 'errors'));
    }

    public function downloadSample(){
        $sample_file = storage_path('app/public/sample_subscribers.xlsx');
        return response()->download($sample_file);
    }

    private function clientHelper(){
        return ClientHelper::getInstance();
    }
}
