<header> 
  <!-- Start Header Middle -->
  <div class="header-middle">
    <div class="container">
      <div class="logo"> <a href="{{ url('/') }}"><img src="{{ asset('public/images/logo.jpg') }}" class="img-responsive" alt=""></a> </div>
      <div class="right">
        <div class="poppup-forms clearfix">
          <ul class="hidden-xs">
            @if(Session::get('userId') != "")
            <li class="dropdown"> <a class="head-user" href="javascript:void(0)">
              @if(userName()->profile_img)
                <img src="{{ asset('public/profiles/') }}/{{ userName()->profile_img }}" class="img-responsive" alt="">
              @else
                <i class="flaticon-round-account-button-with-user-inside my-icon"></i>
              @endif
              
              {{ userName()->first_name }} {{ userName()->last_name }} <i class="fa fa-angle-down" style="font-size:21px;"></i></a>
              <div class="dropdown-content myac-top head-dropdown-content"> <a href="{{ url('/health-records') }}"><i class="flaticon-user"></i> My Account</a> <a href="{{ url('/change-password') }}"><i class="flaticon-key"></i> Change Password</a> <a href="{{ url('/user-logout') }}"><i class="flaticon-logout"></i> Logout</a> </div>
            </li>
            @else
            <li><a href="javascript:void(0);" class="loginform">Login</a></li>
            <li><a href="javascript:void(0);" class="sign-upform">Signup</a></li>
            @endif
          </ul>
        </div>
        <div class="book-appointment"> <a href="tel:{{ getAdminDetails()->phone_no }}" class="button"><i class="fa fa-phone"></i> {{ getAdminDetails()->phone_no }}</a> </div>
      </div>
    </div>
  </div>
  <!-- End Header Middle --> 
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-lg navbar-inverse">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto nav">
          <li><a href="{{ url('/') }}" {{ Request::is('/*') ? ' class=active' : null }}>Home</a> </li>
          <li><a href="{{ url('/about') }}" {{ Request::is('about*') ? ' class=active' : null }}>About Us</a></li>
          <li class="dropdown"> <a href="javascript:void(0)" {{ Request::is('cms-page*') ? ' class=active' : null }}>Our Services <i class="fa fa-angle-down" style="font-size:21px;"></i></a>
            <div class="dropdown-content"> 
              @foreach(getServicesMenu() as $key=>$smenu) 
                <a href="{{ url('our-services') }}/{{ $smenu->id }}-{{ $smenu->slug }}">{{ $smenu->title }}</a> 
              @endforeach 
                @if(count(getServicesMenu()) > 4)
                  <a href="{{ url('services') }}/">More...</a>
                @endif 
            </div>
          </li>
          <li><a href="{{ url('/blog') }}" {{ Request::is('blog*') ? ' class=active' : null }}>Blog</a></li>
          <li><a href="{{ url('/contact') }}" {{ Request::is('contact*') ? ' class=active' : null }}>Contact Us</a></li>
        </ul>
        <div class="navbar-form navbar-right">
          <ul class="follow-us clearfix">
            <li><a href="{{ getAdminDetails()->facebook_url }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="{{ getAdminDetails()->twitter_url }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="{{ getAdminDetails()->linkedin_url }}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <li><a href="{{ getAdminDetails()->googleplus_url }}" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Navigation --> 
</header>
<!-- End Header -->