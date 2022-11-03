<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ENV('APP_ENV') }} | @yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/images/favicon.ico') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('public/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/admin/css/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('public/admin/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    
    
    <link href="{{ asset('public/admin/css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet" />
    
    <!-- Custom Theme Style -->
    <link href="{{ asset('public/admin/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/font/flaticon.css') }}" rel="stylesheet">
    @yield('css')
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;"> <a href="{{ url('/administrator') }}" class="site_title"><img src="{{ asset('public/admin/images/logo.png') }}" alt="..." /></a> </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic"> <img src="@if(Auth::user()->image != '' | null){{ asset('public/admin/images/') }}/{{ Auth::user()->image }}@else{{ asset('public/admin/images/') }}/avtar.png @endif" alt="..." class="img-circle profile_img"> </div>
              <div class="profile_info"> <span>Welcome,</span>
              <h2><?php echo  Auth::user()->name; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->
          @include('admin.includes.sidebar')
        </div>
      </div>
      <!-- top navigation -->
      @include('admin.includes.top_nav')
      <!-- /top navigation -->
      <!-- page content -->
      @yield('content')
      <!-- /page content -->
      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Design & Development By <a href="https://bletindia.com" target="_blank">BLE Technologies-E</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>
  <!-- jQuery -->
  <script src="{{ asset('public/admin/js/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('public/admin/js/bootstrap.min.js') }}"></script>
  <!-- NProgress -->
  <script src="{{ asset('public/admin/js/nprogress.js') }}"></script>
  <!-- bootstrap-progressbar -->
  <script src="{{ asset('public/admin/js/bootstrap-progressbar.min.js') }}"></script>
  <!-- Custom Theme Scripts -->
  <script src="{{ asset('public/admin/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
  
  <script src="{{ asset('public/admin/js/custom.min.js') }}"></script>
  @stack('script')
  <script>
    var url = window.location.href;
      $('ul.nav.side-menu li a').filter(function(){
        return url.indexOf(this.href) !== 1
      }).parent().removeClass('active');
      $('ul.child_menu li a').filter(function() {
          return url.includes(this.href);
      }).parentsUntil(".side-menu > .child_menu").addClass('active').css('display','block');

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  </script>
</body>
</html>