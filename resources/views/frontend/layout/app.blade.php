<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Texas Lawers</title>

    @include('frontend.layout.includes.all-css')
    @yield('style')

</head>
<body data-spy="scroll" data-target="#main-navbar">
@include('frontend.layout.includes.header')
@include('frontend.layout.includes.slider')

@include('frontend.layout.includes.all-css')

@yield('content')


 @include('frontend.layout.includes.footer')

 @include('frontend.layout.includes.all-js')
@yield('script')
</body>
</html>
