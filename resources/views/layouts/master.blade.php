<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')</title>
@yield('meta')
<link rel="stylesheet" href="{{ asset('public/css/reset.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('public/css/select2.min.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('public/css/iconmoon.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('public/css/owl.carousel.min.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('public/css/jquery.fancybox.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('public/css/animate.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('public/css/custom.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('public/css/home-slider.css') }}" type="text/css"/>
<link rel="shortcut icon" type="image/png" href="{{ asset('public/images/favicon.png') }}">
<link rel="stylesheet" href="{{ asset('public/font/flaticon.css') }}" type="text/css"/>
@yield('style')
</head>
<body>
<div class="waitimg"><img src="{{ asset('public/images/dual-ring.gif') }}"></div>
@include('includes.header')
  @yield('content')
@include('includes.footer') 
<!-- Scroll to top --> 
<a href="#" class="scroll-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="{{ asset('public/js/jquery.min.js') }}"></script> 
@stack('script')
<script src="{{ asset('public/js/ompharma-validation.js') }}"></script> 
<!-- Bootsrap JS --> 
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script> 
<!-- Select2 JS --> 
<script src="{{ asset('public/js/select2.min.js') }}"></script> 
<!-- Bxslider JS --> 
<script src="{{ asset('public/js/bxslider.min.js') }}"></script> 
<!-- Waypoints JS --> 
<script src="{{ asset('public/js/waypoints.min.js') }}"></script> 
<!-- Counter Up JS --> 
<script src="{{ asset('public/js/counterup.min.js') }}"></script> 
<!-- Owl Carousal JS --> 
<script src="{{ asset('public/js/owl.carousel.min.js') }}"></script> 
<!-- fancybox --> 
<script src="{{ asset('public/js/jquery.fancybox.js') }}"></script> 
<!-- Modernizr JS --> 
<script src="{{ asset('public/js/modernizr.custom.js') }}"></script> 
<!-- Custom JS --> 
<script src="{{ asset('public/js/custom.js') }}"></script> 
<script src="{{ asset('public/js/home-slider.js') }}"></script> 
<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>



</body>
</html>