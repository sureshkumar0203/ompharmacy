@extends('admin.layouts.master')
@section('title', 'My Account')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>My Account</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
          	@include('admin.includes.msg')
            {{ Form::open(['url' => 'my-account', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'myaccount', 'id' => 'myaccount','files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
            {{ Form::hidden('id', $userData->id) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('name', $userData->name, ['id' => 'name','required' => 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Name']) !!}
                  @if ($errors->has('name'))
	                <span class="help-block">
	                  <strong>{{ $errors->first('name') }}</strong>
	                </span>
	              @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::email('email', $userData->email, ['id' => 'email','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Email']) !!}
                  @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_no">Phone No <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('phone_no', $userData->phone_no, ['onkeypress' => 'return isNumber(event)', 'id' => 'phone_no','required', 'maxlength' => '10', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Phone No']) !!}
                  @if ($errors->has('phone_no'))
                    <span class="help-block">
                      <strong>{{ $errors->first('phone_no') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
            @if(auth()->user()->id == 1)
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_no">Landline <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('landline', $userData->landline, ['onkeypress' => 'return isNumber(event)', 'id' => 'landline','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Landline']) !!}
                  @if ($errors->has('landline'))
                    <span class="help-block">
                      <strong>{{ $errors->first('landline') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tollfree_no">Toll Free No <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('tollfree_no', $userData->tollfree_no, ['onkeypress' => 'return isNumber(event)', 'id' => 'tollfree_no','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Toll Free No']) !!}
                  @if ($errors->has('tollfree_no'))
                    <span class="help-block">
                      <strong>{{ $errors->first('tollfree_no') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gst_no">GST NO <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('gst_no', $userData->gst_no, ['id' => 'gst_no','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'GST NO']) !!}
                  @if ($errors->has('gst_no'))
                    <span class="help-block">
                      <strong>{{ $errors->first('gst_no') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::textarea('address',$userData->address, ['id' => 'address','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'3', 'placeholder'=>'Address']) !!}
                  @if ($errors->has('address'))
                    <span class="help-block">
                      <strong>{{ $errors->first('address') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook_url">Facebook Url <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::url('facebook_url', $userData->facebook_url, ['id' => 'facebook_url','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Facebook Url']) !!}
                  @if ($errors->has('facebook_url'))
                    <span class="help-block">
                      <strong>{{ $errors->first('facebook_url') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter_url">Twitter Url <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::url('twitter_url', $userData->twitter_url, ['id' => 'twitter_url','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Twitter Url']) !!}
                  @if ($errors->has('twitter_url'))
                    <span class="help-block">
                      <strong>{{ $errors->first('twitter_url') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkedin_url">Linkedin Url <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::url('linkedin_url', $userData->linkedin_url, ['id' => 'linkedin_url','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Linkedin Url']) !!}
                  @if ($errors->has('linkedin_url'))
                    <span class="help-block">
                      <strong>{{ $errors->first('linkedin_url') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="googleplus_url">Google+ Url <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::url('googleplus_url', $userData->googleplus_url, ['id' => 'googleplus_url','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Google+ Url']) !!}
                  @if ($errors->has('googleplus_url'))
                    <span class="help-block">
                      <strong>{{ $errors->first('googleplus_url') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              @foreach($typeData as $key=>$val)
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">{{ $key }} Email<span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::email('type[]', $val, ['id' => 'type','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Email']) !!}
                  @if ($errors->has('type'))
                    <span class="help-block">
                      <strong>{{ $errors->first('type') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              @endforeach
            @endif
            
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Profile Image <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::file('image', ['id' => 'image', 'class'=>'form-control col-md-7 col-xs-12', 'onchange'=>'return fileValidation()', 'accept'=>'image/x-png, image/jpeg']) !!}
                  <small class="note"><b>Note</b> : For better quality photo width = 128px & Height = 128px<br>Upload only <strong>png, jpg, jpeg</strong> extension banner. </small>
                  @if ($errors->has('image'))
                    <span class="help-block">
                      <strong>{{ $errors->first('image') }}</strong>
                    </span>
                  @endif
                  <br>
                  <div id="imageProfile">@if($userData->image)<img src="{{ asset('public/admin/images') }}/{{ $userData->image }}" alt="" height="80px">@endif</div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Update', array('class' => 'btn btn-success', 'id'=>'updatepass')) }}
                  <a href="{{ URL::to('administrator') }}" class="btn btn-primary">Back</a>
                </div>
              </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('script') 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('public/admin/js/validator.js') }}"></script>
<script type="text/javascript">
function fileValidation(){
    var fileInput = document.getElementById('image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.png|\.jpg|\.jpeg)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .png/.jpg/.jpeg only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imageProfile').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
$(document).ready(function () {
    $('#dob').datepicker({
        autoclose: true,
        todayHighlight: true
    });
});
</script> 
@endpush