<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
    <li class="start">
        <a href="{{url('/client')}}">
            <i class="icon-home font-blue"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

    <li>
        <a href="{{url('/client/messages')}}">
            <i class="fa fa-envelope font-green-meadow"></i>
            <span class="title">Messaging</span>
        </a>
    </li>

    <li>
        <a href="{{url('/client/events')}}">
            <i class="fa fa-calendar font-blue-hoki"></i>
            <span class="title">Events</span>
        </a>
    </li>

    <li>
        <a href="{{url('/client/groups')}}">
            <i class="fa fa-group font-blue-madison"></i>
            <span class="title">Groups</span>
        </a>
    </li>

    <li>
        <a href="{{url('client/subscribers')}}">
            <i class="fa fa-building font-blue-chambray"></i>
            <span class="title">Subscribers</span>
        </a>
    </li>

    <li>
        <a href="{{url('client/subscribers/requests')}}">
            <i class="fa fa-user-plus font-blue-hoki"></i>
            <span class="title">Join Requests</span>
        </a>
    </li>

    <li>
        <a href="{{url('client/users')}}">
            <i class="fa fa-user-secret font-blue-madison"></i>
            <span class="title">Users</span>
        </a>
    </li>


    <hr style="width: 80%; margin-left: 10%">

    <li>
        <a href="{{url('/profile')}}">
            <i class="fa fa-user font-blue-chambray"></i>
            <span class="title">Profile</span>
        </a>
    </li>

    @if(auth()->user()->type=='client')

        <li>
            <a href="{{url('/client/subscription')}}">
                <i class="fa fa-credit-card font-green-jungle"></i>
                <span class="title">Subscription</span>
            </a>
        </li>

        <li>
            <a href="{{url('client/settings')}}">
                <i class="fa fa-cogs font-blue-ebonyclay"></i>
                <span class="title">Settings</span>
            </a>
        </li>

    @endif

    <li>
        <a href="{{ url('/logout') }}" onclick="
        event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa fa-lock"></i> Log Out </a>
    </li>

</ul>