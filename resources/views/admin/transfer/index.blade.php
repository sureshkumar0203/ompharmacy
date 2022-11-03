@extends('admin.layouts.master')
@section('title', 'Booking Details Management')
@section('css')
<style>
table td{
  vertical-align: middle !important;
}
span.booking-price {
    color: #000000;
    font-weight: bold;
    background: #f3c005;
    padding: 0px 8px;
    display: block;
}
.adminTransfer, .transferDetails {
display: none;
position: fixed;
left: 0;
right: 0;
top: 0;
bottom: 0;
background: rgba(0,0,0,0.5);
z-index: 999;
padding-top: 10%;
}
.closebtn {
position: absolute;
right: -10px;
top: -10px;
background: #e5322d;
box-shadow: 2px 2px 5px rgba(35, 31, 32, 0.50);
width: 30px;
height: 30px;
border-radius: 15px;
cursor: pointer;
z-index: 99;
}
.closebtn:before {
content: '';
width: 50%;
height: 2px;
background: #fff;
position: absolute;
margin: auto;
left: 0;
right: 0;
top: 0;
bottom: 0;
transform: rotate(45deg);
}
.closebtn:after{
content: '';
width: 50%;
height: 2px;
background: #fff;
position: absolute;
margin: auto;
left: 0;
right: 0;
top: 0;
bottom: 0;
transform: rotate(-45deg);
}
.form-design{
background: #fff;
padding: 15px 20px;
border-radius: 3px;
}
.gal_link {
    display: inline-block;
}
</style>
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Transfer Details Management</h3>
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
                  <th width="5%" style="text-align:center">Sl No</th>
                  <th>Account Holder Name</th>
                  <th>Account Number</th>
                  <th>Branch Name</th>
                  <th>Bank Name</th>
                  <th>IFSC Code</th>
                  <th>Transfer ID</th>
                  <th>Amount</th>
                  <th width="15%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($getTransfer as $key=>$getData)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>
                    {{ $getData->transfer->account_holder_name }}<br>
                    <span class="booking-price">{{ date('d-F-Y g:i A' ,strtotime($getData->updated_at)) }}</span>
                  </td>
                  <td>{{ $getData->transfer->account_number }}</td>
                  <td>{{ $getData->transfer->branch_name }}</td>
                  <td>{{ $getData->transfer->bank_name }}</td>
                  <td>{{ $getData->transfer->ifsc_code }}</td>
                  <td>TRANSFER ID #{{ $getData->id }}</td>
                  <td><span class="booking-price">&#8377; {{ $getData->transfer->amount }}</span></td>
                  <td style="vertical-align: middle; text-align: center;">
                    <!-- <a href="{{ url('/administrator/transfer/user-details') }}/{{ $getData->user_id }}" class="btn btn-xs btn-primary">User Details</a>  -->
                  @if($getData->transfer->status == 1)
                    <a href="javascript:void(0);" class="btn btn-xs btn-success defult-access">Success</a>
                    <a href="javascript:void(0);" class="btn btn-xs btn-info" onclick="transferDetails({{ $getData->id }},{{ $getData->user_id }})"><i class="fa fa-info-circle"></i></a>
                  @else
                    <a href="javascript:void(0);" class="btn btn-xs btn-warning" onclick="adminTransfer({{ $getData->id }},{{ $getData->user_id }},{{ $getData->transfer_id }})">Pending</a>
                  @endif
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

<div class="adminTransfer" style="display: none;">
  <div class="container">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4 form-design">
        <div class="closebtn"></div>
        {{ Form::open(['class' =>'form-horizontal form-label-left', 'id' => 'admintransfer', 'autocomplete' => 'off']) }}
        {!! Form::hidden('transaction_id', '', ['id' => 'transaction_id']) !!}
        {!! Form::hidden('userId', '', ['id' => 'userId']) !!}
        {!! Form::hidden('transfer_id', '', ['id' => 'transfer_id']) !!}
        <div class="form-group">
          <label for="note">Transfer Details :</label>
          {!! Form::textarea('note', '', ['id' => 'note', 'class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Transfer Details']) !!}
          <small class="form-text text-muted">Share transaction number and transfer details</small>
        </div>
        {!! Form::button('Submit', ['type' => 'submit','class'=> 'btn btn-primary', 'id' => 'adminTransferSubmit']) !!}
        {{ Form::close() }}
      </div>
      <div class="col-sm-4"></div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<div class="transferDetails" style="display: none;">
  <div class="container">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4 form-design">
        <div class="closebtn"></div>
        <div class="form-group">
          <label for="note">Transaction ID OR Transfer Details :</label><br><br>
          <p id="trandferDetail"></p>
        </div>
      </div>
      <div class="col-sm-4"></div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>


@endsection
@push('script')
<script src="{{ asset('public/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/js/admin-custom.js') }}"></script>
@endpush