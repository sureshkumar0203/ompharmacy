@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')

@endsection
@section('content')
<div class="inner-banner about-us-banner">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="content">
          <h1>SERVICES</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="mtb100">
  <div class="container">
    <div class="row">
    @foreach($servicesCategory as $key=>$val)
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="service-block">   
      <a href="{{ url('our-services') }}/{{ $val->id }}-{{ $val->slug }}"><span><i class="fa fa-link" aria-hidden="true"></i></span></a>     
        <img src="@if($val->image !='' || null){{ asset('public/images/services') }}/{{ $val->image }}@else{{ asset('public/images/services/no-image.jpg') }}@endif" />
        <h5>{{ $val->title }}</h5>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</section>
@endsection 
@push('script') 

@endpush