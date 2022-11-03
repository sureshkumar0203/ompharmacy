@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('content') 
<!-- Start Banner Carousel --> 
<!-- Start Banner -->
<div class="inner-banner about-us-banner">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="content">
          <h1>ABOUT US</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Banner --> 
<!-- Start About Section -->
<section class="your-teeth padding-lg pad0">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="heading">
            <h2>About Health Care At Home</h2>
            <div class="tm-section-seperator"><span></span></div>
        </div>
        {!! $getAboutContent->description !!} </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
      <div class="heading">
            <h2>Our Vision & Mission</h2>
            <div class="tm-section-seperator"><span></span></div>
        </div>
      
      
      
        <!--<h2>Our <span>Vision & Mission</span></h2>-->
        {!! $getAboutContent->vision_mission !!} </div>
    </div>
  </div>
</section>
<section class=" padding-lg  ">
  <div class="container">
  <div class="heading">
            <h2>Our Team</h2>
            <div class="tm-section-seperator"><span></span></div>
        </div>
  
  

    
    <ul class="our-team owl-carousel">
    @foreach($team as $key=>$val)
      <li>
        <div  class="doct-li"><img src="{{ asset('public/images/our-team') }}/{{ $val->image }}" class="img-responsive" alt="{{ $val->name }}"> <span class="padt10"><a href="#">{{ $val->name }}</a></span> <span><a href="#">{{ $val->designation }}</a></span>
        @if($val->mobile !='' || null) <p><i class="fa fa-mobile"></i> <strong>+91 {{ $val->mobile }}</strong> </p>@endif
        </div>
      </li>
    @endforeach
    </ul>
  </div>
</section>

<!-- End About Section --> 
@endsection