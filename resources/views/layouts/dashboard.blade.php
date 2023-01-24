<!doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>Admin Dashboard</title>
    <meta name="description" content=""/>
    <meta name="Author" content="nikolina"/>
    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0"/>
    <!-- WEB FONTS -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext"
        rel="stylesheet" type="text/css"/>
    <!-- CORE CSS -->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <!-- THEME CSS -->
    <link href="/assets/css/essentials.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme"/>


</head>
<body>
<div id="wrapper">

    <aside id="aside">
        <nav id="sideNav">
            <ul class="nav nav-list">
                <li>
                    <a class="dashboard" href="{{route('dashboard')}}">
                        <i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('categories/')}}">
                        <i class="main-icon fa fa-university"></i> <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('projects/')}}">
                        <i class="main-icon fa fa-folder-open-o"></i> <span>Projects</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('tasks/')}}">
                        <i class="main-icon fa fa-tasks"></i> <span>Tasks</span>
                    </a>
                </li>
                <li><!-- dashboard -->
                    <a href="{{url('users/')}}">
                        <i class="main-icon fa fa-user"></i> <span>Users</span>
                    </a>
                </li>
            </ul>
        </nav>
        <span id="asidebg"><!-- aside fixed background --></span>
    </aside>
    <header id="header">
        <!-- Mobile Button -->
        <button id="mobileMenuBtn"></button>
        <!-- Logo -->

        <span class="logo pull-left">
					<img src="/assets/images/logo_light.png" alt="admin panel" height="35"/>
				</span>
        <nav>
            <!-- OPTIONS LIST -->
            <ul class="nav pull-right">
                <!-- USER OPTIONS -->
                <li class="dropdown pull-left">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <span class="user-name">
									<span class="hidden-xs">
										{{Auth::user()->name}} <i class="fa fa-angle-down"></i>
									</span>
								</span>
                    </a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf</form>
                    <ul class="dropdown-menu hold-on-click">
                        <li><!-- settings -->
                            <a href="{{route('profile.edit')}}"><i class="fa fa-cogs"></i>Profile</a>
                        </li>

                        <li><!-- logout -->
                            <a class="dropdown-item" href="{{route('logout')}}"
                               onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /USER OPTIONS -->
            </ul>
            <!-- /OPTIONS LIST -->
        </nav>
    </header>

    <section id="middle">
        <div id="content" class="padding-20">

            @yield('content')

        </div>
    </section>
    <!-- /MIDDLE -->
</div>
<!-- JAVASCRIPT FILES -->

<script type="text/javascript">var plugin_path = '/assets/plugins/';</script>
<script type="text/javascript" src="/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/assets/js/app.js"></script>

</body>
</html>
