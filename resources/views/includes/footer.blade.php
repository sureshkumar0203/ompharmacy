<!-- Start Footer -->
<footer class="footer">
  <!-- Start Footer Top -->
  <div class="container">
    <div class="row row1">
      <div class="col-sm-6 logo-section">
        <h3>Overview</h3>
        {!! str_limit(getAboutContent()->description, 400, '...') !!}
      </div>
      <div class="col-sm-3 services">
        <h3>Legal</h3>
         <ul class="hidden-xs">
          @foreach(getCmsMenu() as $key=>$cms)
            <li><a href="{{ url('/pages') }}/{{ $cms->slug }}">{{ $cms->title }}</a></li>
          @endforeach
          </ul>
      </div>
      <div class="col-sm-3 opening-hours">
        <div class="contact clearfix">
          <ul class="hidden-xs">
            <li><a href="mailto:{{ getAdminDetails()->email }}" class="mail">{{ getAdminDetails()->email }} </a></li>
            <li><a href="tel:{{ getAdminDetails()->phone_no }}" class="ph-number">+91 {{ getAdminDetails()->phone_no }}</a></li>
            <li><a href="tel:{{ getAdminDetails()->landline }}" class="land-number">{{ getAdminDetails()->landline }}</a></li>
            <li><i class="fa fa-mobile mob"></i> &nbsp;&nbsp; <span style="color:#fff;">Toll Free : {{ getAdminDetails()->tollfree_no }}</span></li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <div class="connect-with">
          <ul class="follow-us clearfix">
            <li><a href="{{ getAdminDetails()->facebook_url }}"  target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{ getAdminDetails()->twitter_url }}"  target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{ getAdminDetails()->linkedin_url }}"  target="_blank"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="{{ getAdminDetails()->googleplus_url }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Footer Top -->
  <!-- Start Footer Bottom -->
  <div class="bottom">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 left">
          <p>Copyright &copy; {{ date('Y') }} OM Healthcare Enterprises Ltd. Desgined By <a href="https://www.bletechnolabs.com/" target="_blank">BLET</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- End Footer Bottom -->
</footer>
<!-- End Footer -->
@if(Session::get('userId') == "")
<div id="confirmation" style="display:none;"></div>
@include('includes.login')
@include('includes.signup')
@include('includes.forgot')
@endif