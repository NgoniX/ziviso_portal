<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 26/9/2017
 * Time: 5:22 AM
 */

namespace App\Http\Controllers\Client;


use App\Helpers\ClientHelper;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    private $event_class;

    /**
     * EventsController constructor.
     */
    public function __construct()
    {
        $this->event_class = Event::class;
    }
    public function index()
    {
        $events = Event::orderBy('start_time', 'desc')->get();
        return view('client.events.index', compact('events'))
            ->with(['event_class'=>$this->event_class]);
    }

    public function create()
    {
        if (auth()->user()->can('create', $this->event_class)) {
            $groups = $this->clientHelper()->clientGroups();
            return view('client.events.create', compact('groups'));
        }
        flash()->error('Action not authorized!!');
        return back();
    }

    public function store(Request $request)
    {
        if (!auth()->user()->can('create', $this->event_class)) {
            flash()->error('Action not authorized!!');
            return back();
        }

        $this->validate($request,[
            'title'=>'required',
            'daterange'=>'required',
            'groupz'=>'required',
            'details'=>'required',
        ]);

        $groupz = $request->groupz;
        if(in_array('all', $groupz)){
            $groupz = $this->clientHelper()->client()->groupz;
        }

        $time = explode(" - ", $request->input('daterange'));
        $start = Carbon::createFromFormat('d/m/Y g:i A', $time[0]);
        $end = Carbon::createFromFormat('d/m/Y g:i A', $time[1]);

        $event = new Event();
        $event->title = $request->title;
        $event->details = $request->title;
        $event->client_id = $this->clientHelper()->client()->id;
        $event->user_id = $request->user()->id;
        $event->start_time = $start;
        $event->end_time = $end;
        $event->save();

        //sync groups
        $event->groups()->sync($groupz);

        flash()->success("Event created successfully.");
        return redirect('client/events');

    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        if (!$this->clientHelper()->hasEvent($id)) {
            flash()->error('Action not authorized!!');
            return back();
        }

        return view('client.events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $formatted_date = $event->start_time->format('d/m/Y g:i A').' - '.$event->end_time->format('d/m/Y g:i A');
        $groups = $this->clientHelper()->clientGroups();
        if (!auth()->user()->can('update', $this->event_class) OR !$this->clientHelper()->hasEvent($id)) {
            flash()->error('Action not authorized!!');
            return back();
        }

        return view('client.events.edit', compact('event', 'groups', 'formatted_date'));
    }

    public function update($id, Request $request)
    {
        $event = Event::findOrFail($id);
        if (!auth()->user()->can('update', $this->event_class) OR !$this->clientHelper()->hasEvent($id)) {
            flash()->error('Action not authorized!!');
            return back();
        }

        $this->validate($request,[
            'title'=>'required',
            'daterange'=>'required',
            'groupz'=>'required',
            'details'=>'required',
        ]);

        $groupz = $request->groupz;
        if(in_array('all', $groupz)){
            $groupz = $this->clientHelper()->client()->groupz;
        }

        $time = explode(" - ", $request->input('daterange'));
        $start = Carbon::createFromFormat('d/m/Y g:i A', $time[0]);
        $end = Carbon::createFromFormat('d/m/Y g:i A', $time[1]);

        $event->title = $request->title;
        $event->details = $request->title;
        $event->client_id = $this->clientHelper()->client()->id;
        $event->user_id = $request->user()->id;
        $event->start_time = $start;
        $event->end_time = $end;
        $event->save();

        $event->groups()->sync($groupz);

        flash()->success("Event updated successfully.");
        return redirect('client/events');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if (!auth()->user()->can('delete', $this->event_class) OR !$this->clientHelper()->hasEvent($id)) {
            flash()->error('Action not authorized!!');
            return back();
        }
        $event->groups()->detach();
        $event->delete();
        flash()->success("Event updated successfully.");
        return redirect('client/events');
    }

    public function api()
    {
        $events = $this->clientHelper()->client()->events()
            ->select('id', 'title', 'details', 'start_time as start', 'end_time as end')->get();
        foreach($events as $event)
        {
            $event->url = url('client/events/' . $event->id);
            $event->backgroundColor = 'blue';
        }
        return $events;
    }

    private function clientHelper(){
        return ClientHelper::getInstance();
    }
}