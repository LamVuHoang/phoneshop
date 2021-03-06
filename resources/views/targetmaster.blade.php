<!DOCTYPE html>
<!-- <html xmlns="http://www.w3.org/1999/xhtml">  -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('resources/target_assets') }}/materialize/css/materialize.min.css"
        media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="{{ URL::asset('resources/target_assets') }}/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{ URL::asset('resources/target_assets') }}/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{ URL::asset('resources/target_assets') }}/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{ URL::asset('resources/target_assets') }}/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ URL::asset('resources/target_assets') }}/js/Lightweight-Chart/cssCharts.css">

    @section('unique-css')
    @show

    {{-- ICON BROSER TAB --}}
    <link rel="SHORTCUT ICON" href="{{ URL::asset('storage') }}/thuong_hieu/phoneshop_icon.ico" type="image/x-icon" />
    <link rel="ICON" href="{{ URL::asset('storage') }}/thuong_hieu/phoneshop_icon.ico" type="image/ico" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse"
                    data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.html">
                    <i class="large material-icons">track_changes</i> <strong>phoneshop</strong></a>

                <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                {{-- <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i
                            class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a>
                </li>
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown3"><i
                            class="fa fa-tasks fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i
                            class="fa fa-bell fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li> --}}
                <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i
                            class="fa fa-user fa-fw"></i> <b>{{ Auth::user()->name }}</b> <i
                            class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
            </li>
            {{-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li> --}}
            <li><a href="{{ url('admin/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        {{-- <ul id="dropdown2" class="dropdown-content w250">
            <li>
                <div>
                    <i class="fa fa-comment fa-fw"></i> New Comment
                    <span class="pull-right text-muted small">4 min</span>
                </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <div>
                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                    <span class="pull-right text-muted small">12 min</span>
                </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <div>
                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                    <span class="pull-right text-muted small">4 min</span>
                </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <div>
                    <i class="fa fa-tasks fa-fw"></i> New Task
                    <span class="pull-right text-muted small">4 min</span>
                </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <div>
                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                    <span class="pull-right text-muted small">4 min</span>
                </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">
                    <strong>See All Alerts</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul> --}}
        {{-- <ul id="dropdown3" class="dropdown-content dropdown-tasks w250">
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 1</strong>
                            <span class="pull-right text-muted">60% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                <span class="sr-only">60% Complete (success)</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 2</strong>
                            <span class="pull-right text-muted">28% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28"
                                aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                <span class="sr-only">28% Complete</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 3</strong>
                            <span class="pull-right text-muted">60% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                <span class="sr-only">60% Complete (warning)</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <p>
                            <strong>Task 4</strong>
                            <span class="pull-right text-muted">85% Complete</span>
                        </p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85"
                                aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                <span class="sr-only">85% Complete (danger)</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
        </ul> --}}
        {{-- <ul id="dropdown4" class="dropdown-content dropdown-tasks w250 taskList">
            <li>
                <div>
                    <strong>John Doe</strong>
                    <span class="pull-right text-muted">
                        <em>Today</em>
                    </span>
                </div>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <div>
                    <strong>John Smith</strong>
                    <span class="pull-right text-muted">
                        <em>Yesterday</em>
                    </span>
                </div>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</p>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <strong>John Smith</strong>
                        <span class="pull-right text-muted">
                            <em>Yesterday</em>
                        </span>
                    </div>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the...</p>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">
                    <strong>Read All Messages</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul> --}}
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="#"
                            class="waves-effect waves-dark 
                        @if ($active_section == 'chart')
                        active-menu
                    @endif
                        ">
                            <i class="fa fa-bar-chart-o"></i>Th???ng k??
                        </a>
                        {{-- <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('quan-ly/chart/san-pham')}}">S???n ph???m</a>
                            </li>
                            <li>
                                <a href="#">Lo???i S???n ph???m</a>
                            </li>
                            <li>
                                <a href="#">Th????ng Hi???u</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul> --}}
                    </li>
                    {{-- <li>
                        <a class="@if ($active_section == 'dashboard')
                            active-menu
                        @endif
                        waves-effect waves-dark"
                            href="{{ url('quan-ly/dashboard') }}"><i class="fa fa-dashboard"></i>
                            Dashboard</a>
                    </li> --}}
                    <li>
                        <a href="{{ url('quan-ly/sp-va-dh') }}"
                            class="@if ($active_section == 'san_pham')
                        active-menu
                    @endif
                    waves-effect waves-dark">
                            <i class="fa fa-shopping-cart"></i>
                            S???n ph???m & ????n h??ng
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('quan-ly/sp-va-dh') }}">S???n ph???m</a>
                            </li>
                            {{-- <li>
                                <a href="#">Lo???i S???n ph???m</a>
                            </li>
                            <li>
                                <a href="#">Th????ng Hi???u</a>
                            </li> --}}
                            <li>
                                <a href="{{url('quan-ly/don-hang')}}">????n H??ng</a>
                            </li>
                            {{-- <li>
                                <a href="#">Chi ti???t H??a ????n</a>
                            </li> --}}
                        </ul>
                    </li>
                    <li>
                        <a href="tab-panel.html" class="waves-effect waves-dark">
                            <i class="fa fa-user"></i>Kh??ch h??ng
                        </a>
                    </li>
                    {{-- <li>
                        <a href="tab-panel.html" class="waves-effect waves-dark">
                            <i class="fa fa-bell-o"></i>B??nh lu???n
                        </a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-dark">
                            <i class="fa fa-shield"></i> Admin
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">S???n ph???m</a>
                            </li>
                            <li>
                                <a href="#">Lo???i S???n ph???m</a>
                            </li>
                            <li>
                                <a href="#">Th????ng Hi???u</a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <li>
                        <a href="tab-panel.html" class="waves-effect waves-dark">
                            <i class="fa fa-qrcode"></i>Banner
                        </a>
                    </li> --}}
                    

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

        @yield('content')
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{{ URL::asset('resources/target_assets') }}/js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Js -->
    <script src="{{ URL::asset('resources/target_assets') }}/js/bootstrap.min.js"></script>

    <script src="{{ URL::asset('resources/target_assets') }}/materialize/js/materialize.min.js"></script>

    <!-- Metis Menu Js -->
    <script src="{{ URL::asset('resources/target_assets') }}/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="{{ URL::asset('resources/target_assets') }}/js/morris/raphael-2.1.0.min.js"></script>
    <script src="{{ URL::asset('resources/target_assets') }}/js/morris/morris.js"></script>


    <script src="{{ URL::asset('resources/target_assets') }}/js/easypiechart.js"></script>
    <script src="{{ URL::asset('resources/target_assets') }}/js/easypiechart-data.js"></script>

    <script src="{{ URL::asset('resources/target_assets') }}/js/Lightweight-Chart/jquery.chart.js"></script>

    <!-- Custom Js -->
    <script src="{{ URL::asset('resources/target_assets') }}/js/custom-scripts.js"></script>

    @section('unique-js')
    @show
</body>

</html>
