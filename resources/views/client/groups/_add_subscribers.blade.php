
<form method="POST" action="{{action('Client\GroupsController@update', $group->id)}}">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">
    <input name="new_subscribers" type="hidden" value="new_subscribers">

    <h4 class="bold blue-hoki">Check all you want</h4>
    <hr>

    <table class="table table-condensed table-striped">

        <thead>
        <tr>
            <th>Check</th>
            <th>Subscriber Name</th>
        </tr>
        </thead>
        <tbody>

        @foreach($subscribers as $subscriber)
            @if($subscriber->user->status=='active' AND !in_array($subscriber->id, $group_subscribers))
                <tr>
                    <td>
                        <label class="mt-checkbox mt-checkbox-outline">
                            <input type="checkbox" name="subscribers[{{$subscriber->id}}]">
                            <span></span>
                        </label>
                    </td>
                    <td>
                        {{$subscriber->user->name}}
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

    <div class="margin-top-10">
        <input type="submit" class="btn btn-success" value="Save Subscribers">
    </div>
</form>