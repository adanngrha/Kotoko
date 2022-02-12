<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>{{ $title }}</title>

    {{-- Icon --}}
    <link rel = "icon" href ="electro/img/k-icon.png" type = "image/x-icon">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('electro/css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('electro/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('electro/css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('electro/css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('electro/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('electro/css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('electro/css/custom.css') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <!-- jQuery Plugins -->
    <script src="{{ asset('electro/js/jquery.min.js') }}"></script>
    <script src="{{ asset('electro/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('electro/js/slick.min.js') }}"></script>
    <script src="{{ asset('electro/nouislider.min.js') }}"></script>
    <script src="{{ asset('electro/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('electro/js/main.js') }}"></script>

</body>

</html>