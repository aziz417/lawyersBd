
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Find Lawyer</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
        <link href="{{ asset('frontend') }}/assets/css/menu_style.css" rel="stylesheet">

        <style>
            .display_none{
                display: none;
            }
            .custom_disable
            {
                cursor: not-allowed;
                pointer-events: none;
                color: #c0c0c0;

            }

        </style>
            @yield('style')

    </head>
    <body>
        @yield('content')


        {{--    All JS     --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

        @yield('script')
    </body>
</html>
