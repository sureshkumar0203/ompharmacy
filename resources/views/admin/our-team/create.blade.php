@extends('admin.layouts.master')
@section('title','Add Team')
@section('css')
<style>
div#imageView img {
    width: 20%;
}
</style>
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add Team</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {{ Form::open(['route' => 'our-team.store', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'add-team', 'id' => 'add-team','files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Full Name <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {!! Form::text('name',old('name'), ['id' => 'name','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Full Name']) !!}
                  @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="designation">Designation <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {!! Form::text('designation',old('designation'), ['id' => 'designation','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Designation']) !!}
                  @if ($errors->has('designation'))
                    <span class="help-block">
                      <strong>{{ $errors->first('designation') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile">Mobile No </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {!! Form::text('mobile',old('mobile'), ['id' => 'mobile', 'onkeypress' => 'return numeric(event)', 'maxlength' => '10', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Mobile No']) !!}
                  @if ($errors->has('mobile'))
                    <span class="help-block">
                      <strong>{{ $errors->first('mobile') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Photo <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  {!! Form::file('image', ['id' => 'image', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'onchange'=>'return fileValidation()', 'accept'=>'image/x-png, image/jpeg']) !!}
                  <small class="note"><b>Note</b> : For better quality photo width = 180px & Height = 180px<br>Upload only <strong>png, jpg, jpeg</strong> extension Photo. </small>
                  @if ($errors->has('image'))
                  <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                  </span>
                @endif
                <div id="imageView"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
                  <a href="{{ route('our-team.index') }}" class="btn btn-primary">Back</a>
                </div>
              </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@push('script')
<script src="{{ asset('public/admin/js/validator.js') }}"></script>
<script>
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
                document.getElementById('imageView').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function numeric(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script> 
@endpush