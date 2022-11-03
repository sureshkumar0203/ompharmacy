@extends('admin.layouts.master')
@section('title', 'Booking Details')
@section('css')
<style>
  p{
    display: flex;
  }
span.booking-price {
    font-weight: bold;
    background: #f3c005;
    color: #000;
    font-size: 15px;
    display: table;
    padding: 3px 13px;
}
.btn-success{
  background: #5cb85c;
    border: 1px solid #5cb85c;
    padding: 4px 15px;
}
.x_title{
  background: #1abb9c !important;
  color: #fff !important;
}
.booking-id {
    background: #d4d4d4;
    padding: 2px 14px;
    font-weight: 600;
    display: block;
    min-width: 5%;
    border: 1px dashed #6b6b6b;
}
.yellow-st {
    color: #ffc107 !important;
}
.p_title {
    padding: 2px 5px;
    border-radius: 2px;
}
.fl_right {
    width: 75%;
    float: left;
}
</style>
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left" style="width: 100%;">
        <h3 style="float: left;">Booking Details</h3>
        <div class="nav navbar-right panel_toolbox"> <a href="@if($booking_details->disp_only_adm != 1) {{ url('administrator/booking') }} @else {{ url('administrator/admin-booking') }} @endif" class="btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> Back to List</a> </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12" style="color:#000;">
        <div class="x_panel">
          <div class="col-md-4">
            <div class="x_title p_title">
              <h2>User Details</h2>
              <div class="clearfix"></div>
            </div>
            <p><span class="f-500">Full Name:</span> <span class="fl_right">{{ $booking_details->user_det->first_name }} {{ $booking_details->user_det->last_name }}</span></p>
            <p><span class="f-500">Email:</span> <span class="fl_right">{{ $booking_details->user_det->email }}</span></p>
            <p><span class="f-500">Mobile:</span> <span class="fl_right">+91 {{ $booking_details->user_det->phone }}</span></p>
            <p><span class="f-500">Address:</span> <span class="fl_right">{{ $booking_details->service_address }}</span></p>
            @if(count($booking_details->feedback) > 1)
            <p><span class="f-500">Rating : </span> @for($num = 1; $num <= $booking_details->feedback[1]->rating; $num ++)
              {!! '<i class="fa fa-star yellow-st"></i> &nbsp;' !!}
              @endfor </p>
            <p><span class="f-500">Feedback : </span> <span class="fl_right">{{ $booking_details->feedback[1]->feedback }}</span></p>
            @endif </div>
          <div class="col-md-4" style="border-right: 1px solid #e4e4e4; border-left: 1px solid #e4e4e4;">
            <div class="x_title p_title">
              <h2>@if($booking_details->disp_only_adm != 1) Associate @else Admin @endif Details</h2>
              <div class="clearfix"></div>
            </div>
            @if($booking_details->ass_det != null)
            <p><span class="f-500">Full Name:</span> <span class="fl_right">{{ $booking_details->ass_det->name }}</span></p>
            <p><span class="f-500">Email:</span> <span class="fl_right">{{ $booking_details->ass_det->email }}</span></p>
            <p><span class="f-500">Mobile:</span> <span class="fl_right">+91 {{ $booking_details->ass_det->phone_no }}</span></p>
            <p><span class="f-500">Address:</span> <span class="fl_right">{{ $booking_details->ass_det->address }}</span></p>
            @if($booking_details->disp_only_adm != 1)
            <p><span class="f-500">Zone:</span> <span class="fl_right">{{ $booking_details->ass_det->zone }}</span></p>
            @endif
            @elseif($booking_details->acpt_status == 2)
            <div style="text-align: center;"><img src="{{ asset('public/images/cancl.png') }}"></div>
            <p><span class="f-500">Cancel Reason:</span> <span class="fl_right">{{ $booking_details->cancel_note }}</span></p>
            @else
            <div style="text-align: center;"><img src="{{ asset('public/images/pending-1.png') }}"></div>
            @endif
            
            <!--forceble assign the booking to any associate-->

            @if($booking_details->req_assign_by != null)
            <p><span class="f-500">Assigned By:</span> <span class="fl_right">{{ $booking_details->assign_by->name }} (@if($booking_details->req_assign_by == 1) ADMINISTRATOR @else SUBADMIN @endif)</span></p>
            @endif

            @if($booking_details->req_assign_by == null && $booking_details->req_acpt_id!=null)
            <p><span class="f-500">Accepted By:</span> <span class="fl_right">{{ $booking_details->ass_det->name }} ( ASSOCIATE )</span></p>
            @endif
            
            @if(!$booking_details->feedback->isEmpty())
            <p><span class="f-500">Rating : </span> @for($num = 1; $num <= $booking_details->feedback[0]->rating; $num ++)
              {!! '<i class="fa fa-star yellow-st"></i> &nbsp;' !!}
              @endfor </p>
            <p><span class="f-500">Feedback : </span> <span class="fl_right">{{ $booking_details->feedback[0]->feedback }}</span></p>
            @endif </div>
          <div class="col-md-4">
            <div class="x_title p_title">
              <h2>Booking Details</h2>
              <div class="clearfix"></div>
            </div>
            <p><span class="f-500">Booking Date Time:</span> <span class="fl_right">{{ date('l, d M Y' ,strtotime($booking_details->created_at)) }} {{ date("g:i A", strtotime($booking_details->created_at)) }}</span></p>
            <p><span class="f-500">Service Date Time:</span> <span class="fl_right">{{ date('l, d M Y' ,strtotime($booking_details->booking_date)) }} {{ date("g:i A", strtotime($booking_details->booking_time)) }}</span></p>
            <p><span class="f-500"></span> <span class="booking-id">BOOKING ID # {{ $booking_details->id }}</span></p>
            <p><span class="f-500">Service Category:</span> <span class="fl_right">{{ $booking_details->service_det->cms_page->title }}</span></p>
            <p><span class="f-500">Service Name:</span> <span class="fl_right">{{ $booking_details->service_det->name }}</span></p>
            <p><span class="f-500">Status:</span> @if($booking_details->acpt_status == 1) <a href="javascript:void(0);" class="btn btn-sm btn-success defult-access">Approved</a> @elseif($booking_details->acpt_status == 2) <a href="javascript:void(0);" class="btn btn-sm btn-danger defult-access">Canceled</a> @elseif($booking_details->acpt_status == 3) <a href="javascript:void(0);" class="btn btn-xs btn-success defult-access">Complated</a> @else <a href="javascript:void(0);" class="btn btn-sm btn-warning defult-access">Pending</a> @endif </p>
            <p><span class="f-500">Total Amount: </span> <span class="booking-price">@if($booking_details->price) &#8377; {{ $booking_details->price }} @endif</span></p>
          </div>

        </div><div class="clearfix"></div>

      </div>
    </div>
  </div>
</div>
@endsection
@push('script') 

@endpush