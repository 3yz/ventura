<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('blog.title') }} Admin</title>

    <link href="{!! asset('manager/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('manager/fonts/css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('manager/css/animate.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('manager/css/custom.css') !!}" rel="stylesheet">
    <link href="{!! asset('manager/css/icheck/flat/green.css') !!}" rel="stylesheet">

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
<body style="background-image: url('{!! asset('manager/images/bg-login-3yz.jpg') !!}');">

    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    @yield('content')
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>