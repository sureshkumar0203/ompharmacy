@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('content') 
<section class="banner-sec">
<span class="c-prev"></span> <span class="c-next"></span>
    <div class="owl-carousel slider owl-carousel">
    @foreach($banners as $key=>$banner)
      <div class="banner-co" style="background: url({{ asset('public/images/banner') }}/{{ $banner->image }}) no-repeat center top ; background-size:cover !important; min-height:465px;"> 
        <div class="container" style="position:relative;">
        <div class="banner-caption">
          <div style="max-width:640px;">
            <h2 class="animated fadeInLeft delay-1.5s">{{ $banner->title }}</h2>
            <h4 class="animated fadeInLeft delay-1s">{{ $banner->description }}</h4>
            @if($banner->link !=NULL)<a class="animated fadeInLeft delay-2s btn" href="{{ $banner->link }}" target="_blank">Book Now</a>@endif
          </div>
        </div>
        </div>
      </div>
    @endforeach
    </div>
</section>
<!-- End Banner Carousel -->
<section class="iam-here">
  <div class="container">
    <div class="custom ">
      <h2>QUICK GUIDE</h2>
      <ul>
        <li><a href="{{ url('services') }}">Book a service</a> </li>
        <li><a href="{{ url('services') }}">Book a pathology test</a> </li>
        <li><a href="{{ url('/prescription-upload') }}">Pharmacy</a> </li>
        <li><a href="{{ url('/add-money') }}">Payment</a> </li>
        <li><a href="{{ url('/booking-history') }}">Cancellation of Service</a> </li>

        <!-- <li><a href="{{ url('/pages/payment') }}">Payment</a> </li>
        <li><a href="{{ url('/pages/cancellation-of-service') }}">Cancellation of Service</a> </li> -->


      </ul>
    </div>
  </div>
</section>
<!-- Start Our Doctors Team Section -->
<section class="doctors-team padding-lg">
  <div class="container">
    <div class="heading">
      <h2>Our Services</h2>
      <div class="tm-section-seperator"><span></span></div>
    </div>
    <ul class="owl-carousel clearfix">
      @foreach($services as $key=>$val)
      <li> 
        <a href="{{ url('our-services') }}/{{ $val->id }}-{{ $val->slug }}">
          <img src="@if($val->image !='' || null){{ asset('public/images/services') }}/{{ $val->image }}@else{{ asset('public/images/services/no-image.jpg') }}@endif" class="img-responsive" alt="" />
          <h3>{{ $val->title }}</h3>
        </a>
      </li>
      @endforeach
    </ul>
  </div>
</section>
<!-- End Our Doctors Team Section -->
<div class="tm-newsletter tm-bg">
  <div class="tm-nl-overlay"></div>
  <div class="empty-space col-md-b100 col-xs-b70"></div>
  <div class="container text-center video-sec">
    <h4 class="text-center text-white">{!! $videoContent->content !!}</h4>
    <a href="javascript:void('0');" onclick="lightbox_open();"><span><i class="fa fa-play video-player-icon"></i></span></a> </div>
  <div class="empty-space col-md-b100 col-xs-b70"></div>
</div>
<!-- Start Testimonial -->
<section class="testimonial padding-lg">
  <div class="container">
    <div class="wrapper">
      <h2>Testimonials</h2>
      <ul class="testimonial-slide owl-carousel">
        @foreach($testimonials as $key=>$testimonial)
        <li>
          <p>{{ $testimonial->description }}</p>
          <span>{{ $testimonial->name }}</span> <img src="@if($testimonial->image != null){{ asset('public/images/testimonials') }}/{{ $testimonial->image }} @else {{ asset('public/images/bl1.jpg') }} @endif" class="img-circle" alt=""/> </li>
        @endforeach
      </ul>
    </div>
  </div>
</section>
<!-- End Testimonial --> 
<!-- Start Why Choose Section -->
<div class="why-choose padding-lg">
  <div class="container">
    <div class="row">
      <ul class="our-strength">
        <li>
          <div class="icon"><img src="{{ asset('public/images/happy-patients.png') }}" alt="Happy Patients"/></div>
          <span class="counter">{{ $featured->happy_patients }}</span>
          <div class="title">Happy Patients</div>
        </li>
        <li>
          <div class="icon"><img src="{{ asset('public/images/success-mission.png') }}" alt="Success Mission"/></div>
          <span class="counter">{{ $featured->success_mission }}</span>
          <div class="title">Success Mission</div>
        </li>
        <li>
          <div class="icon"><img src="{{ asset('public/images/qualified-doctors.png') }}" alt="Qualified Doctors"/></div>
          <span class="counter">{{ $featured->qualified_doctors }}</span>
          <div class="title">Qualified Doctors</div>
        </li>
        <li>
          <div class="icon"><img src="{{ asset('public/images/globalization-work.png') }}" alt="Globalization Work"/></div>
          <span class="counter">{{ $featured->years_of_experience }}</span>
          <div class="title">Years of experience</div>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- End Why Choose Section --> 

<!-- Video popup-->
<div id="light">
  <div class="video">
    <div class="video-loader" style="display:none;"> <img src="{{ asset('public/images/dual-ring.gif') }}" alt="Happy Patients" style="border:none; top: 34%; position: relative;"/ > </div>
    <a class="boxclose" id="boxclose" onclick="lightbox_close();"></a>
    <video id="VisaChipCardVideo" width="100%" controls>
      <source src="{{ asset('public/video')}}/{{ $video[0]->video }}" id="videos" type="video/mp4">
    </video>
    <div class="row video-thumb ">
      <ul class=" video-slide owl-carousel clearfix">
        @foreach($video as $getVideo)
        <li onclick="playVideo({{ $getVideo->id }})">
          <video width="100%">
            <source src="{{ asset('public/video')}}/{{ $getVideo->video }}" type="video/mp4">
          </video>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
<div id="fade" onClick="lightbox_close();"></div>
<!-- End video popup--> 
@endsection
@push('script') 
<script>
window.document.onkeydown = function(e) {
if (!e) {
  e = event;
}
if (e.keyCode == 27) {
  lightbox_close();
}
}
function lightbox_open() {
  var lightBoxVideo = document.getElementById("VisaChipCardVideo");
  document.getElementById('light').style.display = 'block';
  document.getElementById('fade').style.display = 'block';
  lightBoxVideo.play();
}
function lightbox_close() {
  var lightBoxVideo = document.getElementById("VisaChipCardVideo");
  document.getElementById('light').style.display = 'none';
  document.getElementById('fade').style.display = 'none';
  lightBoxVideo.pause();
}
function playVideo(id){
  $.ajax({
    url: hostname + "playVideo",
      type: "POST",
      data:  {id:id},
      dataType: 'json',
      beforeSend: function () {
      $(".video-loader").css('display','block');
    },
    success: function(data) {
        if (data.response == "success") {
            var link = "{{ url('/public/video') }}/"+data.datas;
            $('#videos').attr("src", link);
            $("#VisaChipCardVideo")[0].load();
            $("#VisaChipCardVideo")[0].play();
            $(".video-loader").css('display','none');
        }
      }
  });
  var lightBoxVideo = document.getElementById("VisaChipCardVideo");
}

var owlCarousel = $('.video-slide');
  owlCarousel.mouseover(function(){
  owlCarousel.trigger('stop.owl.autoplay');
});

owlCarousel.mouseleave(function(){
  owlCarousel.trigger('play.owl.autoplay',[1000]);
});
</script> 
<script>
$(".myBox").click(function(){
    window.location=$(this).attr("http://google.com");
     return false;
});
</script> 
@endpush