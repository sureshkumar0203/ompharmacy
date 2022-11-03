@extends('admin.layouts.master')
@section('title', 'Booking Details Management')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/chosen/chosen.css') }}">
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
.modal-footer {
    padding: 15px;
    text-align: right;
    border-top: 0px;
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
.ass-det {
    text-align: center;
    font-weight: bold;
    background: #2a9208;
    color: #fff;
    display: inline-block;
    padding: 0px 8px;
    line-height: 19px;
    font-size: 11px;
}
.ass-details {
    margin: 0;
    padding: 3px 4px;
}
</style>
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Booking Details Management</h3>
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
                  <th width="12%">Booking Name</th>
                  <th width="13%">Service Name</th>
                  <th width="8%">Price</th>
                  <th width="10%">Booking ID</th>
                  <th width="12%">Booking Date Time</th>
                  <th width="12%">Service Date Time</th>
                  <th width="19%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($booking_details as $key=>$book_det)
                <tr>
                  <td style="text-align: center;">{{ $key+1 }} <a href="{{ url('administrator/booking/asso-detail') }}/{{ $book_det->id }}" data-toggle="tooltip" data-title="@if($book_det->associate_ids == '') Request not sent @else Request sent @endif"><i class="fa fa-question-circle btn btn-xs @if($book_det->associate_ids == '') btn-danger @else btn-success @endif ass-details"></i></a></td>
                  <td>{{ $book_det->user_det->first_name }} {{ $book_det->user_det->last_name }} <br> </td>
                  <td>{{ $book_det->service_det->name }} @if($book_det->req_acpt_id != null)<br><span class="ass-det" data-toggle="tooltip" data-title="Request Accepted By"> {{ associateDet($book_det->req_acpt_id)->name }} <span>@endif</td>
                  <td><span class="booking-price">@if($book_det->price) &#8377; {{ $book_det->price }} @endif</span></td>
                  <td><span class="service-id">#{{ $book_det->id }}</span></td>
                  <td><span class="book-datetime"><i class="fa fa-calendar-check-o"></i> {{ date('l, d M Y' ,strtotime($book_det->created_at)) }} {{ date('g:i A' ,strtotime($book_det->created_at)) }}</span></td>
                  <td><span class="book-datetime"><i class="fa fa-calendar-check-o"></i> {{ date('l, d M Y' ,strtotime($book_det->booking_date)) }} {{ date("g:i A", strtotime($book_det->booking_time)) }}</span></td>
                  <td style="vertical-align: middle; text-align: center;">
                  @if($book_det->acpt_status == 1)
                    <a href="javascript:void(0);" class="btn btn-xs btn-success defult-access">Approved</a>
                    <button class="btn btn-xs btn-primary associate-details" data-id="{{ $book_det->id }}" data-toggle="modal" data-target="#assign-ass">Reassign</button>
                  @elseif($book_det->acpt_status == 2)
                    <a href="javascript:void(0);" class="btn btn-xs btn-danger defult-access">Canceled</a>
                  @elseif($book_det->acpt_status == 3)
                    <a href="javascript:void(0);" class="btn btn-xs btn-success defult-access">Complated</a>
                  @else
                    <a href="javascript:void(0);" class="btn btn-xs btn-warning defult-access">Pending</a>
                    <button class="btn btn-xs btn-primary associate-details" data-id="{{ $book_det->id }}" data-toggle="modal" data-target="#assign-ass">Assign</button>
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
<div class="modal fade" id="assign-ass" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="float: left;">Assign to Associate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ Form::open(['url' => 'administrator/assign-associate', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'assign-associate', 'id' => 'assign-associate', 'autocomplete' => 'off', 'novalidate']) }}
        {{ Form::hidden('booking_id', '', ['id'=>'booking_id']) }}
          <div class="form-group">
            <label for="assciate_id" class="col-form-label">Search and select Associate</label>
            {{ Form::select('assciate_id', [''=>'Select Associate...'], null, ['id' => 'assciate_id', 'class'=>'form-control chosen']) }}
              @if ($errors->has('assciate_id'))
                <span class="help-block">
                  <strong>{{ $errors->first('assciate_id') }}</strong>
                </span>
              @endif
          </div>
        {{ Form::submit('Assign', array('class' => 'btn btn-success', 'style'=>'float:right')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

@endsection
@push('script')
<script src="{{ asset('public/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/chosen/chosen.jquery.js') }}" type="text/javascript"></script>
<script>
$('.associate-details').click(function(){
  var id = $(this).attr("data-id");
  $.ajax({
      url: "{{ url('administrator/associate_details') }}",
      type: "POST",
      data:  {id:id,},
      dataType: 'json',
    success: function(data) {
      if (data.response == "success") {
         $('#booking_id').val(id);
         $('#assciate_id').empty().append('<option value="">Select Associate...</option>');
         var assdata__ = data.data;
          $.each(assdata__, function(key, val) {
              $('#assciate_id').append($("<option/>", {
                  value: val.id,
                  text: val.name
              }));
          });
          $('#assciate_id').trigger("chosen:updated");
      }
    }
  });
})

$('form#assign-associate').submit(function(e) {
  var assciate_id = $('#assciate_id').val();
  if(assciate_id == ""){
    $('#assciate_id_chosen a').addClass('find-error');
    $('.error-msg').remove();
    $('#assciate_id_chosen').after('<span class="error-msg">Please select a associate</span>');
    $('#assciate_id_chosen a').focus();
    return false;
  }else {
    $('#assciate_id_chosen a').removeClass('find-error');
    $('.error-msg').remove();
  }
});


$(document).ready(function() {
    $("#assciate_id").chosen({no_results_text: "Oops, nothing found!"}); 
    $('#assciate_id_chosen').css('width', '100%');
});
</script>
@endpush