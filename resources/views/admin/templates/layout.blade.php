<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('blog.title') }} Gerenciador</title>

    <link href="{!! asset('admin/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin/fonts/css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin/css/animate.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin/css/custom.css') !!}" rel="stylesheet">
    <link href="{!! asset('admin/css/icheck/flat/green.css') !!}" rel="stylesheet">

    @yield('styles')


    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('admin.dashboard.index') }}" class="site_title"><i class="logo"><img src="{!! asset('admin/images/logo.png') !!}"></i> <span>{{ config('blog.title') }}</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{!! asset('admin/images/user.png') !!}" alt="..." class="img-circle profile_img">

                        </div>
                        <div class="profile_info">
                            <span>Bem-vindo,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    @include('admin/partials/menu')
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{!! asset('admin/images/user.png') !!}" alt="...">{{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="javascript:;">  Profile</a></li>
                                    <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    @yield('content')
                </div>
            </div>
            <!-- /page content -->
        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>


    <script type="text/javascript" src="{!! asset('admin/js/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('admin/js/bootstrap.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('admin/js/chartjs/chart.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('admin/js/progressbar/bootstrap-progressbar.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('admin/js/nicescroll/jquery.nicescroll.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('admin/js/icheck/icheck.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('admin/js/custom.js') !!}"></script>
    <!--script type="text/javascript" src="{!! asset('admin/js/moris/raphael-min.js') !!}"></script-->
    <!--script type="text/javascript" src="{!! asset('admin/js/moris/morris.js') !!}"></script-->
    <!--script type="text/javascript" src="{!! asset('admin/js/moris/example.js') !!}"></script-->
    @yield('scripts')

</body>

</html>