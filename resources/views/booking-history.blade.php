@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')
<link rel="stylesheet" href="{{ asset('public/css/alert/jquery-confirm.min.css') }}">
<style>
  form#feedback-form .error-msg{
    color: #e00;
  }
</style>
@endsection
@section('content')
<div id="contentWrapper">
  <div class="container mtb200" id="myaccount">
    <div class="row"> @include('includes.usermenu')
      <div class="col-md-9" id="main">
        <div class="myaccount-box">
          <div class="container mb40 form-wrapper">
            <div class="row">
              <h5>Booking History</h5>
            </div>
            <div class="row">
              @if(count($bookings) > 0)
              @foreach($bookings as $booking)
              <div class="service-history">
                <div class="col-md-12"> 
                <span class="category-head">
                {{ $booking->service_det->cms_page->title }}</span> 
                <span class="clearfix full-block"></span>
                <h5>{{ $booking->service_det->name }} (# {{ $booking->service_det->test_id }}) </h5>
                <div class="book_id">BOOKING ID : # {{ $booking->id }}</div>
                <p class="get_content{{ $booking->id }}"> {!! readMoreHelper($booking->service_det->shot_description,150,$booking->service_det->id,$booking->id) !!}</p>
              </div>
              <div class="col-md-12">
                <ul>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i> {{ date('l, d M Y' ,strtotime($booking->booking_date)) }} &nbsp;&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> {{ date("g:i A", strtotime($booking->booking_time)) }}</li>
                  <li class="text-right">Price : &#x20B9; {{ $booking->price }}</li>
                  @if($booking->acpt_status == 0)
                  <li class="text-right pending-btn">Pending</li>
                  <li class="booking-cancel"><a href="javascript:void(0);" class="requestCancel" data-id="{{ keymarker($booking->id) }}.{{ $booking->id }}" data-toggle="modal" data-target="#req-cancel"> Cancel Booking</a></li>
                  @elseif($booking->acpt_status == 1)
                  <li class="text-right approve">Approved</li>
                  @elseif($booking->acpt_status == 3)
                  <li class="text-right approve">Completed</li>
                  @else
                  <div class="cancel-book"></div>
                  @endif
                </ul>
              </div>
              <div class="clearfix"></div>
              @if($booking->req_acpt_id != null)
              <div class="row marlr0">
                <div class="col-md-7 ass_details">
                  <h5>Service provider details</h5>
                  <div class="clearfix"></div>
                  @if($booking->ass_det->image !='' && $booking->ass_det->image !=NULL) <span class="service-prov-det"> <img src="{{ asset('public/admin/images') }}/{{ $booking->ass_det->image }}" class="ass_img" alt="{{ $booking->ass_det->name }}"> </span> @else <img src="{{ asset('public/admin/images/avtar.png') }}" class="ass_img" alt="{{ $booking->ass_det->name }}"> @endif
                  <p><strong>Name : </strong> {{ $booking->ass_det->name }}</p>
                  <p><strong>Phone : </strong> {{ $booking->ass_det->phone_no }}</p>
                  @if(!$booking->feedback->isEmpty())
                  <p><strong>Rating : </strong> @for($num = 1; $num <= $booking->feedback[0]->rating; $num ++)
                    {!! '<i class="fa fa-star yellow-st"></i>' !!}
                  @endfor </p>
                  <p><strong>Feedback : </strong> {{ $booking->feedback[0]->feedback }}</p>
                @endif </div>
                @if($booking->acpt_status == 3)
                @if(count($booking->feedback) > 1)
                <div class="col-md-5 ass_details">
                  <h5>Your feedback</h5>
                  <p><strong>Rating : </strong> @for($num = 1; $num <= $booking->feedback[1]->rating; $num ++)
                    {!! '<i class="fa fa-star yellow-st"></i>' !!}
                  @endfor </p>
                  <p><strong>Feedback : </strong> {{ $booking->feedback[1]->feedback }}</p>
                </div>
                @else
                <div class="col-md-5 ass_details"> <a href="#" class="btn btn-success btn-send feedback__" data-id="{{ $booking->id }}" data-toggle="modal" data-target="#myModal">Feedback</a> </div>
                @endif
              @endif </div>
              @endif
              @if($booking->acpt_status == 2)
              <div class="col-md-12 ass_details">
                <h5>Cancellation Reason</h5>
                <p>{{ $booking->cancel_note }}</p>
              </div>
              @endif
              <div class="cute"></div>
            </div>
            @endforeach
            @else
            <div class="record-notfound">No Bookings found!</div>
          @endif </div>
          {{ $bookings->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="req-cancel" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title pull-left">Booking Cancellation</h5>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body"> {{ Form::open(['url' => 'request-cancellation', 'method' => 'GET', 'id' => 'cancellation', 'autocomplete' => 'off']) }}
      {!! Form::hidden('id', '', ['id' => 'formId']) !!}
      <div class="form-group">
        <label for="note">Cancel Reason:</label>
      {!! Form::textarea('note', old('note'),['id' => 'note', 'class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Cancel Reason']) !!} </div>
      <div class="form-group text-right" style="margin-bottom:0px;"> {{ Form::submit('Submit', array('class' => 'btn btn-default btn-sm')) }} </div>
    {{ Form::close() }} </div>
  </div>
</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="revi-cl" data-dismiss="modal">&times;</button>
      <h5 class="modal-title">Rating &amp; Feecdback</h5>
    </div>
    <div class="modal-body"> {{ Form::open(['url' => 'user-feedback', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'feedback-form', 'id' => 'feedback-form', 'autocomplete' => 'off', 'novalidate']) }}
      {{ Form::hidden('booking_id', '', ['id'=>'booking_id']) }}
      <div class="form-group rev-fmg" style="width:40%">
        <label for="rating" class="col-form-label">Rating</label>
      {{ Form::select('rating', [''=>'Select Rating...', '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5], null, ['id' => 'rating', 'class'=>'form-control']) }}
      <div class="clearfix"></div>
    </div>
       
      <div class="form-group rev-fmg">
        <label for="feedback" class="col-form-label">Feedback</label>
      {{ Form::textarea('feedback','', ['id' => 'feedback', 'rows' => '3', 'maxlength' => '255', 'class'=>'form-control']) }} </div>
      {{ Form::submit('Submit', array('class' => 'btn btn-success rev-sbbtn', 'style'=>'float:right')) }}
      {{ Form::close() }}
      <div class="clearfix"></div>
    </div>
  </div>
</div>
</div>
@endsection
@push('script')
<script src="{{ asset('public/js/alert/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('public/js/jquery.scrollwith.js') }}"></script>
<script>
$('.feedback__').click(function(){
  var id = $(this).attr("data-id");
  $('#booking_id').val(id);
})

$('.requestCancel').click(function(){
var dataId = $(this).attr("data-id");
$('#formId').val(dataId);
})
$("#cancellation").submit(function(event) {
var note = $('#note').val();
if(note == ''){
$('#note').addClass('errorfield');
$('#note').focus();
return false;
}else{
return true;
}
});

$('form#feedback-form').submit(function(e) {
var rating = $('#rating').val();
var feedback = $('#feedback').val();
if(rating == ""){
$('#rating').addClass('find-error');
$('.error-msg').remove();
$('#rating').after('<span class="error-msg">Please select a rating</span>');
$('#rating').focus();
return false;
}else {
$('#rating').removeClass('find-error');
$('.error-msg').remove();
}
if(feedback == ""){
$('#feedback').addClass('find-error');
$('.error-msg').remove();
$('#feedback').after('<span class="error-msg">Please enter your feedback</span>');
$('#feedback').focus();
return false;
}else {
$('#feedback').removeClass('find-error');
$('.error-msg').remove();
}
});
jQuery(function($)
{
$("#aside-4").scrollWith();
});
</script>
@endpush