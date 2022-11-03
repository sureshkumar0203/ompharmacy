<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page Not Found | BleTechnolabs </title>
    <link rel=icon type=image/png sizes=32x32 href="{{asset('public/images/favicon-32x32.png')}}">
    <!-- Bootstrap -->
    <link href="{{ asset ('public/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset ('public/admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset ('public/admin/css/nprogress.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset ('public/admin/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">404</h1>
              <h2>Sorry but we couldn't find this page</h2>
              <p>This page you are looking for does not exist </a>
              </p>
              <div class="mid_center">
                <h3>Go Back</h3>
                <p>Click <a href="{{ url()->previous('admin') }}">here</a> to use a special wormhole that will take you <br>back on track.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset ('public/admin/js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset ('public/admin/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset ('public/admin/js/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset ('public/admin/js/nprogress.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset ('public/admin/js/custom.min.js') }}"></script>
  </body>
</html>