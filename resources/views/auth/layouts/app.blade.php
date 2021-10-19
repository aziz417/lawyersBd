<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('backend') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="loginColumns animated fadeInDown">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12">

            @yield('from')

            <hr>
            <div class="row">
                <div class="col-md-6">
                    Copyright
                </div>
                <div class="col-md-6 text-right">
                    <small>© {{ date('Y') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('backend') }}/js/jquery-3.1.1.min.js"></script>
<script src="{{ asset('backend') }}/js/popper.min.js"></script>
<script src="{{ asset('backend') }}/js/bootstrap.js"></script>

</body>

</html>

