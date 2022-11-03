@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')
<link rel="stylesheet" href="{{ asset('public/css/lightbox/lightbox.css') }}">
<stle>
  
</stle>
@endsection
@section('content') 
<!-- Start Banner Carousel -->
<div class="container mtb200" id="myaccount">
  <div class="row"> @include('includes.usermenu')
    <div class="col-md-9">
      <div class="myaccount-box">
        <div class="container mb40 form-wrapper">
          <div class="row">
            <h5>Prescription Upload</h5>
          </div>
          @if (Session::has('success'))
          <div class="alert alert-success fadeout"> {{ Session::get('success') }} </div>
          @endif
          
          @if (Session::has('error'))
          <div class="alert alert-danger fadeout"> {{ Session::get('error') }} </div>
          @endif
          {{ Form::open(['url' => 'prescription-upload', 'autocomplete' => 'off', 'id' => 'prescription-upload', 'files' => true, 'style' => 'padding-left:20px; padding-bottom: 30px;']) }}
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label>Upload Prescription* :</label>
                {!! Form::file('prescription', ['id' => 'prescription', 'class'=>'form-control ', 
                'placeholder'=>'First Name', 'onchange'=>'return fileValidation()', 'accept'=>'image/x-png, image/jpeg' ]) !!}
                @if ($errors->has('prescription')) <span class="error"> <strong>{{ $errors->first('prescription') }}</strong> </span> @endif </div>
              <div class="form-group">
                <label>Note :</label>
                {!! Form::textarea('note', old('note'), ['id' => 'note', 'class'=>'form-control',
                'placeholder'=>'Note', 'rows' => '1']) !!}
                @if ($errors->has('note')) <span class="error"> <strong>{{ $errors->first('note') }}</strong> </span> @endif </div>
              <div class="form-group">
                <label>Address* :</label>
                {!! Form::textarea('address', old('address', $address->address), ['id' => 'address', 'class'=>'form-control', 'placeholder'=>'Address*', 'rows' => '1']) !!}
                @if ($errors->has('address')) <span class="error"> <strong>{{ $errors->first('address') }}</strong> </span> @endif </div>
              <div class="text-right"> 
              	{{ Form::submit('Submit', array('class' => 'btn blue myac-btn')) }} 
                {{ Form::close() }} 
                </div>
            </div>
            <div class="col-md-7 payment-history">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="30%" style="text-align: center;"><strong>Date</strong></th>
                    <th width="20%" style="text-align: center;"><strong>Prescription</strong></th>
                    <th width="40%" style="text-align: center;"><strong>Notes</strong></th>
                    <th style="text-align: center;"><strong>Delete</strong></th>
                  </tr>
                </thead>
                <tbody>
                @if(count($prescriptions) > 0)
                @foreach($prescriptions as $getdata)
                  <tr>
                    <td class="dated">{{ date('d-F-Y g:i A' ,strtotime($getdata->created_at)) }}</td>
                    <td style="text-align: center;">
                     <a href="{{ asset('storage/app/'.$getdata->image) }}" class="gal_link"><img src="{{ asset('storage/app/'.$getdata->image) }}" alt="" width="100px"></a>
                      <a href="{{ asset('storage/app/'.$getdata->image) }}" download class="presdown"  title="Download Prescription"><i class="fa fa-download"></i></a>
                    </td>
                    <td>{{ $getdata->note }}</td>
                    <td style="width: 100px;padding: 0px 5px;vertical-align: middle; text-align: center;">
                    @if($getdata->status == 0)
                      <a  href="{{ url('/prescription-upload') }}/{{ base64_encode($getdata->id) }}/delete" onClick="return confirm('Are you sure you want to delete this prescription ?')"><i class="fa fa-trash delete-ico" aria-hidden="true"></i></a>
                    @endif
                    </td>
                  </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="4" class="record-notfound">No record found!</td>
                </tr>
                @endif
                </tbody>
              </table>
            @if(count($prescriptions) > 0)
              <div class="row">
                <div class="col-sm-12 text-center"> <a href="{{ url('/prescription-upload-details') }}" class="all-pres pull-right">View More</a> </div>
              </div>
            @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('script') 
<script>
function fileValidation(){
    var fileInput = document.getElementById('prescription');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.png|\.jpg|\.jpeg)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .png/.jpg/.jpeg only.');
        fileInput.value = '';
        return false;
    }
}
</script> 
<script src="{{ asset('public/js/lightbox/jquery.lightbox.js') }}"></script>
<script src="{{ asset('public/js/lightbox/lightbox.js') }}"></script>
@endpush