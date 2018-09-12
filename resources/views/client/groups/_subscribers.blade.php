@can('edit', $group_class)
    <form method="POST" action="{{action('Client\GroupsController@update', $group->id)}}">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <input name="subscribers_update" type="hidden" value="subscribers_update">

        <h4 class="bold blue-hoki">Uncheck any to remove</h4>
        <hr>

        <div class="form-group">
            <div class="mt-checkbox-list">

                @foreach($group->subscribers as $subscriber)

                    <label class="mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" checked name="subscribers[{{$subscriber->id}}]">
                        {{$subscriber->user->name}}
                        <span></span>
                    </label>
                    <br>

                @endforeach

            </div>
        </div>
        <div class="margin-top-10">
            <input type="submit" class="btn btn-success" value="Save Subscribers">
        </div>
    </form>
@endcan

@cannot('edit', $group_class)
    @php $count=0 @endphp
    <table class="table table-bordered table-striped">
    @foreach($group->subscribers as $subscriber)
        <tr>
            <td>{{++$count}}</td>
            <td>{{$subscriber->user->name}}</td>
        </tr>
    @endforeach
    </table>
@endcannot