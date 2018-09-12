<a href="{{url('client/messages')}}">
    <div class="tile bg-green-haze">
        <div class="tile-body">
            <i class="fa fa-envelope"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Messaging
            </div>
        </div>
    </div>
</a>

<a href="{{url('/client/groups')}}">
    <div class="tile bg-blue-hoki">
        <div class="tile-body">
            <i class="fa fa-group"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Groups
            </div>
        </div>
    </div>
</a>

<a href="{{url('client/subscribers')}}">
    <div class="tile bg-blue-madison">
        <div class="tile-body">
            <i class="fa fa-building"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Subscribers
            </div>
        </div>
    </div>
</a>

<a href="{{url('/profile')}}">
    <div class="tile bg-blue-chambray">
        <div class="tile-body">
            <i class="fa fa-user"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Profile
            </div>
        </div>
    </div>
</a>

@if(auth()->user()->type=='client')
<a href="{{url('client/users')}}">
    <div class="tile bg-grey-gallery">
        <div class="tile-body">
            <i class="fa fa-user-secret"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                My Users
            </div>
        </div>
    </div>
</a>

<a href="{{url('client/settings')}}">
    <div class="tile bg-blue-madison">
        <div class="tile-body">
            <i class="fa fa-cogs"></i>
        </div>
        <div class="tile-object">
            <div class="name">
                Settings
            </div>
        </div>
    </div>
</a>
@endif
