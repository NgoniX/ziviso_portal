<p class="col-md-offset-3 bold">User privileges</p>

<div class="form-group">
    <h4 class="control-label col-md-3" style="padding-top: 0px;">Messages</h4>
    <div class="col-md-7">

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="message_create"
                   @if(isset($user) and $user->actionModule('messages', 'compose'))
                   checked
                    @endif
            >
            <span>Create</span>
        </label>

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="message_edit"
            @if(isset($user) and $user->actionModule('messages', 'edit'))
                 checked
            @endif
            >
            <span>Edit</span>
        </label>

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="message_del"
                   @if(isset($user) and $user->actionModule('messages', 'del'))
                   checked
                    @endif
            >
            <span>Delete</span>
        </label>

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="message_authorize_send"
                   @if(isset($user) and $user->actionModule('messages', 'authorize_send'))
                   checked
                    @endif
            >
            <span>Authorize</span>
        </label>

    </div>
</div>

<div class="form-group">
    <h4 class="control-label col-md-3" style="padding-top: 0px;">Groups</h4>
    <div class="col-md-7">

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="group_create"
                   @if(isset($user) and $user->actionModule('groups', 'compose'))
                   checked
                    @endif
            >
            <span>Create</span>
        </label>

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="group_edit"
                   @if(isset($user) and $user->actionModule('groups', 'edit'))
                   checked
                    @endif
            >
            <span>Edit</span>
        </label>

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="group_del"
                   @if(isset($user) and $user->actionModule('groups', 'del'))
                   checked
                    @endif
            >
            <span>Delete</span>
        </label>

    </div>
</div>

<div class="form-group">
    <h4 class="control-label col-md-3" style="padding-top: 0px;">Subscribers</h4>
    <div class="col-md-7">

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="subscriber_create"
                   @if(isset($user) and $user->actionModule('subscribers', 'compose'))
                   checked
                    @endif
            >
            <span>Create</span>
        </label>

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="subscriber_edit"
                   @if(isset($user) and $user->actionModule('subscribers', 'edit'))
                   checked
                    @endif
            >
            <span>Edit</span>
        </label>

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="subscriber_del"
                   @if(isset($user) and $user->actionModule('subscribers', 'del'))
                   checked
                    @endif
            >
            <span>Delete</span>
        </label>

    </div>
</div>

<div class="form-group">
    <h4 class="control-label col-md-3" style="padding-top: 0px;">Events</h4>
    <div class="col-md-7">

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="event_create"
                   @if(isset($user) and $user->actionModule('events', 'compose'))
                   checked
                    @endif
            >
            <span>Create</span>
        </label>

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="event_edit"
                   @if(isset($user) and $user->actionModule('events', 'edit'))
                   checked
                    @endif
            >
            <span>Edit</span>
        </label>

        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="event_del"
                   @if(isset($user) and $user->actionModule('events', 'del'))
                   checked
                    @endif
            >
            <span>Delete</span>
        </label>

    </div>
</div>