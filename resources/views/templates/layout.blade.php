<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ventura</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="env" content="{{ App::environment() }}">
        <!-- facebook meta -->
        <meta property="og:title" content="" />
        <meta property="og:site_name" content=""/>
        <meta property="og:url" content="" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="" />
        <!-- facebook meta -->

        <link rel="stylesheet" href="{{ URL::to('/') . elixir('css/app.css') }}">

        <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,700|Raleway:200" rel="stylesheet" type="text/css">
    </head>
    <?php list(, $action) = explode('@', Route::getCurrentRoute()->getActionName()); ?>

    <?php $currentAction = \Route::currentRouteAction();
    list($controller, $method) = explode('@', $currentAction);
    $controller = preg_replace('/.*\\\/', '', $controller); ?>

    <body class="page-{{$action}}" id="{{ str_slug($controller) . '-' . $action }}" data-controller="{{ str_slug($controller) }}" data-action="{{ $action }}" data-root-url="{{ URL::to('/') }}">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @yield('content')

        <script src="{{ URL::to('/') . elixir('js/all.js') }}"></script>

        <script>
            //colocar aqui o ID do analytics
            var tracking_code = 'UA-XXXXX-X';
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create',tracking_code);ga('send','pageview');
        </script>
    </body>
</html>