@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')
<style>
#accordian p {
    color: #000;
    font-weight: normal;
    font-size: 14px!important;
    line-height: 27px !important;
    text-align: justify;
   margin:10px!important;
}
ul.myul li {
    display: list-item;
}
ul.myul {
    padding: 0;
}
#accordian {
  color: white;
  width:100%;
}
#accordian h3 {
  background: #003040;
  background: linear-gradient(#003040, #002535);
  color:#fff;
  font-size: 13px;
  text-decoration: none;
}
#accordian h3 a {
  padding: 0 10px;
  font-size: 12px;
  line-height: 34px;
  display: block;
  color: white;
  text-decoration: none;
}
#accordian h3:hover {
  text-shadow: 0 0 1px rgba(255, 255, 255, 0.7);
}

#accordian a h3 {
  padding: 0 10px;
  font-size: 12px;
  line-height: 34px;
  display: block;
  color: white;
  text-decoration: none;
}
#accordian h3:hover {
  text-shadow: 0 0 1px rgba(255, 255, 255, 0.7);
}

#accordian li {
    list-style-type: none;
    position: relative;
    border: 1px solid #efefef;
    padding:13px;
    width:auto!important;
    margin-bottom: 10px;
    border-radius: 2px;
    background: #efefef70;
-webkit-box-shadow: 0px -4px 5px -5px rgba(0,0,0,0.19);
-moz-box-shadow: 0px -4px 5px -5px rgba(0,0,0,0.19);
box-shadow: 0px -4px 5px -5px rgba(0,0,0,0.19);

}
dt a {
    font-weight: normal;
    color: #000 !important;
	text-transform:capitalize!important;
}

#accordian ul ul {
  display: none;
  float: none;
}
#accordian li.active>ul {
  display: block;
  padding-bottom: 1px;
}
#accordian ul ul ul {
  margin-left: 15px;
/*  border-left: 1px dotted rgba(0, 0, 0, 0.5);
*/}
#accordian dt:not(:only-child):after {
    content: "\f0fe";
    font-family: fontawesome;
    position: absolute;
    right: 22px;
    /* top: 24px; */
    font-size: 19px;
    top: 19px;
    color: #007aa5;
	cursor:pointer;
}
#accordian .active>dt:not(:only-child):after {
  content: "\f146";
}


.acc-head {
    width: 100%;
    background: #ccc;
    border-left: groove 5px #bbbbbb;
    padding: 5px 10px;
	text-transform:capitalize;
}
.ser-p
{
   margin-bottom:0!important;
}

</style>
@endsection
@section('content') 
<!-- Start Banner Carousel --> 
<!-- Start Banner -->
<div class="inner-banner about-us-banner" @if($cmspage->banner_img !='') style="background-image:url('{{ url('public/images/services/banner') }}/{{ $cmspage->banner_img }}')" @endif>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="content">
          <h1>{{ $cmspage->title }}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Banner --> 
<!-- Start About Section -->
<section class="your-teeth padding-lg">
  <div class="container">
    <div class="row product-listing">
    <div class="col-lg-12 mb5">

      @if($cmspage->slug == 'patholab')
        <a href="@if(Session::get('userId') == "") javascript:void(0); @else {{ url('/prescription-upload') }} @endif" class="btn btn-primary btn-sm pull-right @if(Session::get('userId') == "") loginform @endif" style="margin-left: 10px;">BOOK WITH PRESCRIPTION</a>
      @endif

      <a href="@if($cmspage->slug == 'pharmacy') @if(Session::get('userId') == "") javascript:void(0); @else {{ url('/prescription-upload') }} @endif @else {{ url('our-services/category') }}/{{ $cmspage->id }}-{{ $cmspage->slug }} @endif" class="btn btn-primary btn-sm pull-right @if($cmspage->slug == 'pharmacy') @if(Session::get('userId') == "") loginform @endif @endif">{{ $cmspage->btn_name }}</a>

    </div>
    <div id="accordian">
      @php
        foreach ($data as $r) {
          echo  $r;
        }
      @endphp
      {!! $content !!}
    </div>
  </div>
  </div>
</section>
<!-- End About Section --> 
@endsection
@push('script')
<script>
 $(document).ready(function() {
    $("#accordian dt").click(function() {
        event.preventDefault();
        var link = $(this);
        var closest_ul = link.closest("ul");
        var parallel_active_links = closest_ul.find(".active")
        var closest_li = link.closest("li");
        var link_status = closest_li.hasClass("active");
        var count = 0;         
        closest_ul.find("ul").slideUp(function() {
            if (++count == closest_ul.find("ul").length)
                parallel_active_links.removeClass("active");
        });         
        if (!link_status) {
            closest_li.children("ul").slideDown();
            closest_li.addClass("active");

        }
    })
 }) 
</script> 
@endpush