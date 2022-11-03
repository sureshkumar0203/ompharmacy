@extends('admin.layouts.master')
@section('title', 'Prescription Details Management')
@section('css')
<link rel="stylesheet" href="{{ asset('public/css/lightbox/lightbox.css') }}">
<style>
.feedback {
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
@endsection
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Prescription Details Management</h3>
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
                  <th width="5%" style="text-align:center">#</th>
                  <th width="15%">Upload Date</th>
                  <th width="15%">User Name</th>
                  <th width="15%">Prescription</th>
                  <th width="20%">Notes</th>
                  <th width="15%">Address</th>
                  <th width="15%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($prescription as $key=>$data)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ date('d-F-Y g:i A' ,strtotime($data->created_at)) }}</td>
                  <td>{{ $data->user_det->first_name }} {{ $data->user_det->last_name }}</td>
                  <td style="text-align: center;">
                    <a href="{{ asset('storage/app/'.$data->image) }}" class="gal_link"><img src="{{ asset('storage/app/'.$data->image) }}" alt="" height="100px"></a>
                    <a href="{{ asset('storage/app/'.$data->image) }}" download class="presdown"  title="Download Prescription"><i class="fa fa-download"></i></a>
                  </td>
                  <td>{{ $data->note }}</td>
                  <td>{{ $data->address }}</td>
                  <td style="vertical-align: middle; text-align: center">
                    @if($data->status == 1)
                    <span class="btn btn-success btn-sm defult-access">Complete</span>
                    @else
                    <a href="javascript:void(0);" onclick="prescriptionFeedback({{ $data->id }},{{ $data->user_id }})" class="btn btn-sm btn-info">On Process</a>
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

<div class="feedback" style="display: none;">
  <div class="container">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4 form-design">
        <div class="closebtn"></div>
        {{ Form::open(['class' =>'form-horizontal form-label-left', 'id' => 'prescriptionForm', 'autocomplete' => 'off']) }}
        {!! Form::hidden('prescriptionId', '', ['id' => 'prescriptionId']) !!}
        {!! Form::hidden('userId', '', ['id' => 'userId']) !!}
        <div class="form-group">
          <label for="note">Note :</label>
          {!! Form::textarea('note', 'your medicine is ready to deliver.Contact for home delivery- 7381025181', ['id' => 'note', 'class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Note']) !!}
          <small id="emailHelp" class="form-text text-muted">Share tracking Url and tracking number to check order delivery status</small>
        </div>
        {!! Form::button('Submit', ['type' => 'submit','class'=> 'btn btn-primary', 'id' => 'feedbackSubmit']) !!}
        {{ Form::close() }}
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
<script src="{{ asset('public/js/lightbox/jquery.lightbox.js') }}"></script>
<script src="{{ asset('public/js/lightbox/lightbox.js') }}"></script>
@endpush