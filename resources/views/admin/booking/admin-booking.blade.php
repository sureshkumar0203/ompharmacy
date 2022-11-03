@extends('admin.layouts.master')
@section('title', 'Admin Booking Details Management')
@section('css')
<style>
table td{
  vertical-align: middle !important;
}
span.booking-price {
    font-weight: bold;
    background: #f3c005;
    color: #000;
    padding: 0px 5px;
    display: block;
    line-height: 24px;
}
span.book-datetime {
	color: #ffffff;
	background: #1abb9c;
	padding: 0px 7px;
	display: block;
	line-height: 24px;
  font-size: 12px;
}
span.service-id {
	background: #e66d34;
    color: #fff;
    padding: 0px 5px;
    display: block;
    line-height: 24px;
}
.find-error {
    background: #f7000038 !important;
    border: 1px solid #de0b0bc9 !important;
    border-radius: 2px !important;
}
.error-msg {
    color: #c30d0d;
    position: relative;
    top: 4px;
    font-weight: 400;
}
</style>
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Admin Booking Details Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          @include('admin.includes.msg')
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="7%" style="text-align:center">#</th>
                  <th width="13%">Booking Name</th>
                  <th width="13%">Service Name</th>
                  <th width="10%">Price</th>
                  <th width="10%">Booking ID</th>
                  <th width="12%">Booking Date Time</th>
                  <th width="12%">Service Date Time</th>
                  <th width="20%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($booking_details as $key=>$book_det)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $book_det->user_det->first_name }} {{ $book_det->user_det->last_name }}</td>
                  <td>{{ $book_det->service_det->name }}</td>
                  <td><span class="booking-price">@if($book_det->price) &#8377; {{ $book_det->price }} @endif</span></td>
                  <td><span class="service-id">#{{ $book_det->id }}</span></td>
                  <td><span class="book-datetime"><i class="fa fa-calendar-check-o"></i> {{ date('l, d M Y' ,strtotime($book_det->created_at)) }} {{ date('g:i A' ,strtotime($book_det->created_at)) }}</span></td>
                  <td><span class="book-datetime"><i class="fa fa-calendar-check-o"></i> {{ date('l, d M Y' ,strtotime($book_det->booking_date)) }} {{ date("g:i A", strtotime($book_det->booking_time)) }}</span></td>
                  <td style="vertical-align: middle; text-align: center;">
                  @if($book_det->acpt_status == 1)
                    <a href="javascript:void(0);" class="btn btn-xs btn-success defult-access">Approve</a>
                    <button class="btn btn-xs btn-success feedback__" data-id="{{ $book_det->id }}" data-toggle="modal" data-target="#feedbackForm">Complate</button>
                  @elseif($book_det->acpt_status == 2)
                    <a href="javascript:void(0);" class="btn btn-xs btn-danger defult-access">Cancel</a>
                  @elseif($book_det->acpt_status == 3)
                    <a href="javascript:void(0);" class="btn btn-xs btn-success defult-access">Complated</a>
                  @else
                    <a href="javascript:void(0);" data-id="{{ $book_det->id }}" class="btn btn-xs btn-warning approveUser">Pending</a>
                  @endif
                    <a href="{{ url('administrator/booking-details') }}/{{ $book_det->id }}" class="btn btn-xs btn-info">Details</a> 
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!------------------ Modal box------------------>
<div class="modal fade" id="feedbackForm" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="float: left;">Rating & Feecdback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ Form::open(['url' => 'administrator/submit-feedback', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'feedback-form', 'id' => 'feedback-form', 'autocomplete' => 'off', 'novalidate']) }}
        {{ Form::hidden('booking_id', '', ['id'=>'booking_id']) }}
          <div class="form-group" style="width:30%">
            <label for="rating" class="col-form-label">Rating</label>
            {{ Form::select('rating', [''=>'Select Rating...', '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5], null, ['id' => 'rating', 'class'=>'form-control']) }}
          </div>
          <div class="form-group">
            <label for="feedback" class="col-form-label">Feedback</label>
            {{ Form::textarea('feedback','', ['id' => 'feedback', 'rows' => '3', 'maxlength' => '255', 'class'=>'form-control']) }}
          </div>
        {{ Form::submit('Submit', array('class' => 'btn btn-success', 'style'=>'float:right')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

@endsection
@push('script')
<script src="{{ asset('public/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/js/dataTables.bootstrap.min.js') }}"></script>
<script>
$('.feedback__').click(function(){
  var id = $(this).attr("data-id");
  $('#booking_id').val(id);
})

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

$('.approveUser').click(function(){
  if (confirm('Are you sure you want to Approve this user ?')) {
    var id = $(this).attr("data-id");
    $.ajax({
        url: "{{ url('administrator/approve-admin') }}",
        type: "POST",
        data:  {id:id,},
        dataType: 'json',
      success: function(data) {
        if (data.response == "success") {
           location.reload();
        }
      }
    });
  }
})
</script>
@endpush