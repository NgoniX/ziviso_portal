<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
    <li class="start">
        <a href="{{action('Admin\AdminController@index')}}">
            <i class="icon-home font-blue"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

    <li>
        <a href="{{url('admin/clients')}}">
            <i class="fa fa-building-o font-blue-chambray"></i>
            <span class="title">Clients</span>
        </a>
    </li>

    <li>
        <a href="{{url('admin/subscriptions')}}">
            <i class="fa fa-credit-card font-green-jungle"></i>
            <span class="title">Subscriptions</span>
        </a>
    </li>

    <li>
        <a href="{{url('admin/subscribers')}}">
            <i class="fa fa-user-md font-blue-hoki"></i>
            <span class="title">Subscribers</span>
        </a>
    </li>

    <li>
        <a href="{{url('admin/users')}}">
            <i class="fa fa-group font-blue-madison"></i>
            <span class="title">Users</span>
        </a>
    </li>

    <hr style="width: 80%; margin-left: 10%">

    <li>
        <a href="{{url('profile')}}">
            <i class="fa fa-user font-green-seagreen"></i>
            <span class="title">Profile</span>
        </a>
    </li>

    <li>
        <a href="{{url('admin/settings')}}">
            <i class="fa fa-cogs"></i>
            <span class="title">Settings</span>
        </a>
    </li>

    <li>
        <a href="{{ url('/logout') }}" onclick="
        event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa fa-lock"></i> Log Out </a>
    </li>

</ul>