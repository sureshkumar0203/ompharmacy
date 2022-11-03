@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')
<style>
.st {
	display: inline-block;
	position: relative;
	padding-left: 35px;
	margin-bottom: 12px;
	cursor: pointer;
	font-size: 14px;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	color: #11c6f1;
	margin-right: 30px;
	font-weight: bold;
}
.st input {
	position: absolute;
	opacity: 0;
	cursor: pointer;
	height: 0;
	width: 0;
}
.checkmark {
	position: absolute;
	top: 0;
	left: 0;
	height: 25px;
	width: 25px;
	background-color: #fff;
	border: 1px solid #007aa5;
}
.st:hover input ~ .checkmark {
	background-color: #fff;
}
.st input:checked ~ .checkmark {
	background-color: #007aa5;
}
.checkmark:after {
	content: "";
	position: absolute;
	display: none;
}
.st input:checked ~ .checkmark:after {
	display: block;
}
.st .checkmark:after {
    left: 9px;
    top: 4px;
    width: 8px;
    height: 13px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>
@endsection
@section('content') 
<!-- Start Banner -->
<div class="inner-banner contact">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="content">
          <h1>Contact Us</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Banner --> 
<!-- Start Contact Us -->
<section class="contact-us padding-lg">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 form-wrapper">
        {{ Form::open(['url' => '', 'role' => 'form', 'id' => 'contactform', 'autocomplete' => 'off']) }}
          <div class="row input-row" style="margin-bottom: 8px;margin-left: -10px;">
          
          @foreach($typeData as $k=>$v)
          <div class="col-sm-6">
            <label class="st">{{ $k }}
            <input type="radio" value="{{ $k }}" name="type">
            <span class="checkmark"></span>
            </label>
            </div>
          @endforeach
       
          </div>
          <div class="row input-row">
            <div class="col-sm-6">
              {!! Form::text('first_name', old('first_name'), ['required', 'placeholder'=>'First name *']) !!}
            </div>
            <div class="col-sm-6">
              {!! Form::text('last_name', old('last_name'), ['required', 'placeholder'=>'Last name *']) !!}
            </div>
          </div>
          <div class="row input-row">
            <div class="col-sm-12">
              {!! Form::text('email', old('email'), ['required', 'placeholder'=>'Email *']) !!}
            </div>
          </div>
          <div class="row input-row" id="skills" style="display:none;">
            <div class="col-sm-12">
              {!! Form::text('skills', old('skills'), ['required', 'placeholder'=>'Occupation/skills *']) !!}
            </div>
          </div>
          <div class="row input-row" id="experience" style="display:none;">
            <div class="col-sm-12">
              {!! Form::text('experience', old('experience'), ['required', 'placeholder'=>'Experience *']) !!}
            </div>
          </div>
          <div class="row input-row">
            <div class="col-sm-12">
              {!! Form::text('phone', old('phone'), ['onkeypress' => 'return numeric(event)', 'placeholder'=>'Phone *', 'maxlength' => '10']) !!}
            </div>
          </div>
          <div class="row input-row">
            <div class="col-sm-12">
              {!! Form::textarea('message', old('message'), ['placeholder'=>'Message']) !!}
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              {{ Form::submit('SUBMIT', array('type' => 'submit', 'class' => 'btn btn-success btn-send', 'id' => 'contact-submit')) }}
              <div class="msg"></div>
            </div>
          </div>
        {{ Form::close() }}
      </div>
      <div class="col-sm-6 contact-info">
        <h2>CONTACT INFO</h2>
        <p><i class="fa fa-map-marker" aria-hidden="true"></i> <span class="cont-address">{{ getAdminDetails()->address }}</span> </p>
        <p><i class="fa fa-phone" aria-hidden="true"></i> <span class="numbers"><a href="tel:+91 9777797475">{{ getAdminDetails()->phone_no }} </a></span></p>
        <p><i class="fa fa-envelope-o pull-left" aria-hidden="true"></i>
        <span style="margin-top: -11px; float: left;">
          @foreach($typeData as $key=>$val)
            <span class="cont-email" style="display:block;"><b>{{ $key }}</b> : <a href="mailto:{{ $val }}"> {{ $val }}</a></span>
          @endforeach
          </span>
        </p>
      </div>
    </div>    
    <div class="row">
    <div class="col-sm-12 map-border" >
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3741.6480907505565!2d85.8185605143957!3d20.314828317142982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1909bb1c85736d%3A0xdb16ceeaef401537!2sOm+Pharmacy!5e0!3m2!1sen!2sin!4v1543818639387" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen=""></iframe>
    </div>
    </div>
    
  </div>
</section>
<!-- end Contact Us --> 
@endsection
@push('script') 
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> 
<script>
$("input[name=type]:radio").click(function(ev) {
  if (ev.currentTarget.value == "Work with us") {
    console.log('here');
    $('#skills').css('display','block');
    $('#experience').css('display','block');
  } else{
    console.log('ggg');
    $('#skills').css('display','none');
    $('#experience').css('display','none');
  }
});
</script>
@endpush