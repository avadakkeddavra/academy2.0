<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/slick-1.6.0/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('js/slick-1.6.0/slick/slick.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Roboto:300,400,500,700&amp;subset=cyrillic" rel="stylesheet">
    @if(Route::currentRouteName() != 'home')
        <link rel="stylesheet" href="{{ asset('css/entry-pages.css') }}">

        @elseif(Route::currentRouteName() == 'departement')
        <link rel="stylesheet" href="{{ asset('css/departement.css') }}">
    @endif
</head>
	<body>

        @if(Route::currentRouteName() == 'home')

             @include('layouts.partials.mainheader')

        @else

            @include('layouts.partials.header')

        @endif
   

	   @yield('content')


        <div class="copyright">
                <div class="container">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-4">&copy; Copyright 2017</div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('js/slick-1.6.0/slick/slick.js') }}"></script>
        <script src="{{ asset('js/js.js') }}"></script>
	</body>
</html>