<!DOCTYPE html>
<html lang="en" class="ie8 no-js">
<!--[if IE 9]>
<html lang="en" class="ie9 no-js">

<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="ziviso" name="description"/>
    <meta content="ziviso" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel='shortcut icon' href="{{ asset('fav.png')}}" type='image/x-icon'/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('assets/global/css/components-rounded.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/layout4/css/layout.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/layout4/css/themes/light.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{ asset('assets/admin/layout4/css/custom.css') }}" rel="stylesheet" type="text/css"/>

    @yield('page_level_plugins_css')
    @yield('page_level_css')


</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">

<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo" style="margin-top: 0px !important; padding-top: 0px !important;">
            <a href="{{url('/home')}}">
                <img src="{{ asset('the_logo.jpeg') }}" style="height: 70px !important; padding-left: 20px !important;" alt="logo"
                     class="logo-default"/>
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <div class="page-actions">
            <div class="btn-group">
                <button type="button" class="btn blue btn-sm dropdown-toggle" data-toggle="dropdown"
                        data-hover="dropdown" data-close-others="true">
                    <span class="hidden-sm hidden-xs">Menu&nbsp;</span><i class="fa fa-angle-down"></i>
                </button>
                @if(Auth::check())
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{url('/')}}">
                                <i class="icon-home"></i> Home </a>
                        </li>
                        <li class="divider"></li>
                    </ul>
                @endif
            </div>
        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide">
                    </li>
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    @if(Auth::check())
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">
						<span class="username username-hide-on-mobile">
						{{ Auth::user()->name }}
                        </span>
                                <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                <img alt="" class="img-circle"
                                     src="{{ asset('assets/placeholder_2.png')}}"/>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{url('/profile')}}">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-cogs"></i> Settings </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    {{--begin side bar--}}
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            {{--begin side menu--}}
            <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

                @yield('side_bar_menu')

            </ul>
            {{--end side menu--}}
        </div>
    </div>
    {{--begin side bar--}}
    {{-- BEGIN CONTENT --}}
    <div class="page-content-wrapper">
        <div class="page-content">

            <div class="page-head">
                <div class="page-title">
                    <h1>@yield('page_content_title')</h1>
                </div>
            </div>

            <ul class="page-breadcrumb breadcrumb">
                @yield('page_breadcrumb')
            </ul>

            {{--begin page content--}}
            @include('flash::message')
            @yield('page_content')

            {{--end page content--}}
        </div>
    </div>
    {{-- END CONTENT --}}
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
        2016 - <?php echo date('Y'); ?> &copy; <a href="#" target="_blank">Ziviso</a>. All rights reserved.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ asset('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
@yield('page_level_plugins_js')
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout4/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/pages/scripts/tasks.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/select2/select2.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"></script>


@yield('page_level_scripts_js')

<script>
    jQuery(document).ready(function () {
        Metronic.init();
        Layout.init();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $('div.alert').delay(3000).slideUp(300);
        $('.date-picker').datepicker({
            rtl: Metronic.isRTL(),
            orientation: "left",
            autoclose: true
        });
    });
</script>
@yield('page_level_inits_script')
</body>
</html>
