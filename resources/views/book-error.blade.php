@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('content') 

<section class="your-teeth padding-lg pad0 mb50 " style="margin-top:170px;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
    <span class="err-ico"><img src="{{ asset('public/images/err-ic.png') }}" class="img-responsive" alt=""></span><br>

<span class="err-msg"  >Booking Error</span><br>

 <p>Sorry, Currently no associate registered with us to resive your booking.</p>       
        
      </div>
    </div>
  </div>
</section>
<!-- End About Section --> 
@endsection