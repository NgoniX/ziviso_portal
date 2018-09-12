<?php

namespace App\Http\Controllers\Client;

use App\Helpers\ClientHelper;
use App\Models\Group;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupsController extends Controller
{
    private $group_class;

    /**
     * GroupsController constructor.
     */
    public function __construct()
    {
        $this->group_class = Group::class;
    }


    public function index()
    {
        $groups = $this->clientHelper()->clientGroups();
        return view('client.groups.index', ['groups'=>$groups, 'group_class'=>$this->group_class]);
    }

    public function create()
    {
        if (auth()->user()->can('create', $this->group_class)) {
            return view('client.groups.create');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:2',
            'description'=>'required|min:5',
            'join_criteria'=>'required',
        ]);

        $group = Group::where('name', $request->name)
            ->where('client_id', $this->clientHelper()->client()->id)->first();

        if(!empty($group)){
            flash()->error('You already have a group with this name!');
            return back();
        }

        $group = new Group();
        $group->name=$request->name;
        $group->description=$request->description;
        $group->client_id=$this->clientHelper()->client()->id;
        $group->created_by=auth()->user()->id;
        $group->join_criteria = $request->join_criteria;
        $group->save();

        flash()->success("Group created successfully");
        return redirect()->action('Client\GroupsController@show', ['id'=>$group->id]);

    }

    public function show($id)
    {
        $group = Group::with('subscribers')->with('messages')
            ->with('creator')->with('client')->findOrFail($id);
        $subscribers = $this->clientHelper()->clientSubscribers();
        $group_subscribers = $group->subscribers->pluck('id')->toArray();
        $group_class = $this->group_class;

        if(!$this->clientHelper()->clientOwnsGroup($group->id)){
            flash()->error("Sorry, you don't have rights to view this group!");
            return back();
        }
        return view('client.groups.show',
            compact('group', 'subscribers', 'group_subscribers', 'group_class'));
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        if(!$this->clientHelper()->clientOwnsGroup($group->id) or !auth()->user()->can('update', $this->group_class)){
            flash()->error("Sorry, you don't have rights to edit this group!");
            return back();
        }
        return view('client.groups.edit', compact('group'));
    }

    public function update($id, Request $request)
    {
        $group = Group::findOrFail($id);

        if (!$this->clientHelper()->clientOwnsGroup($group->id) or !auth()->user()->can('update', $this->group_class)) {
            flash()->error("Sorry, you don't have rights to edit this group!");
            return back();
        }

        if ($request->subscribers_update) {
            $subscribers = empty($request->subscribers)?[]:array_keys($request->subscribers);
            $group->subscribers()->sync($subscribers);
            flash()->success("Group subscribers updated successfully");
            return back();
        }

        if($request->new_subscribers){
            $subscribers = empty($request->subscribers)?[]:array_keys($request->subscribers);
            $group->subscribers()->syncWithoutDetaching($subscribers);
            flash()->success("Group subscribers updated successfully");
            return back();
        }

        //update group itself
        $this->validate($request, [
            'name'=>'required|min:2',
            'description'=>'required|min:5',
            'join_criteria'=>'required',
        ]);

        $exists = Group::where('name', $request->name)
            ->where('id', '<>', $group->id)
            ->where('client_id', $this->clientHelper()->client()->id)
            ->first();

        if(!empty($exists)){
            flash()->error('You already have a group with this name!');
            return back();
        }

        $group->name=$request->name;
        $group->description=$request->description;
        $group->join_criteria = $request->join_criteria;
        $group->save();

        flash()->success("Group created successfully");
        return redirect()->action('Client\GroupsController@show', ['id'=>$group->id]);


    }

    public function destroy($id)
    {
        $group = Group::findOrfail($id);
        if (!$this->clientHelper()->clientOwnsGroup($group->id) or !auth()->user()->can('delete', $this->group_class)) {
            flash()->error("Sorry, you don't have rights to delete this group!");
            return back();
        }
        flash()->warning("Deleting groups cant be done because it has messages already sent!!");
        return back();
    }


    //Helpers
    private function clientHelper(){
        return ClientHelper::getInstance();
    }
}
