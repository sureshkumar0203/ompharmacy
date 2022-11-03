@extends('admin.layouts.master')
@section('title','Add Category Content')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/chosen/chosen.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/timepicker/jquery.timepicker.min.css') }}">
<style>
div#imageView img {
    width: 20%;
}
#banner_imageView img, #advertisement_imageView img {
    width: 314px;
    height: 82px;
}
/* ul.ui-timepicker-viewport li:first-child {
    display: none;
} */
</style>
@stop
@section('content')
<script src="{{ asset('public/admin/ckeditor/ckeditor.js') }}"></script>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add Category Content</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {{ Form::open(['route' => 'cms-page.store', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'add-cms', 'id' => 'add-cms','files'=>true, 'autocomplete' => 'off', 'novalidate']) }}

              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::text('title',old('title'), ['id' => 'title','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Title']) !!}
                  @if ($errors->has('title'))
                    <span class="help-block">
                      <strong>{{ $errors->first('title') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="parent_id">Parent Menu </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  @php
                  $res = cmsMenu();
                  @endphp
                  <select name="parent_id" id="parent_id" class="form-control chosen" onchange="return selectParent(this.value)">
                    <option value="0">Select Parent Menu...</option>
                  <?php foreach($res as $cl) { ?>
                    <option value="<?php echo $cl["id"] ?>"><?php echo $cl["name"]; ?></option>
                  <?php } ?>
                  </select>
                  
                  @if ($errors->has('parent_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('parent_id') }}</strong>
                    </span>
                  @endif

                </div>
              </div>
              <div class="item form-group" id="ser_request">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="service_request">Send Service Request </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <div class="checkbox">
                    <label>
                      {!! Form::checkbox('service_request','1', false, ['id'=>'service_request']) !!} <strong>Only Admin</strong>
                    </label>
                  </div>
                  @if ($errors->has('service_request'))
                  <span class="help-block">
                    <strong>{{ $errors->first('service_request') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::textarea('description',old('description'), ['id' => 'description','required', 'class'=>'form-control col-md-7 col-xs-12 ckeditor', 'rows' =>'3', 'placeholder'=>'Address']) !!}
                <script type="text/javascript">            
                  CKEDITOR.replace( 'description', {
                    filebrowserUploadUrl: '{{ url("public/admin/ckeditor/filemanager/connectors/php/upload.php")}}'
                  });
                </script>
                @if ($errors->has('description')) 
                  <span class="help-block"> 
                    <strong>{{ $errors->first('description') }}</strong> 
                  </span> 
                @endif
                </div>
              </div>

              <div class="item form-group" id="service_time">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="service_request">Service Time </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <div class="checkbox" style="float: left; width: 20%">
                    <label>
                      {!! Form::radio('time24_status','0', true, ['id'=>'service_request']) !!} <strong>24 Hour Service</strong>
                    </label>
                  </div>
                  <div class="checkbox" style="float: left; width: 20%">
                    <label>
                      {!! Form::radio('time24_status','1', false, ['id'=>'service_request']) !!} <strong>Restriction Service</strong>
                    </label>
                  </div>
                  @if ($errors->has('service_request'))
                  <span class="help-block">
                    <strong>{{ $errors->first('service_request') }}</strong>
                  </span>
                @endif
                </div>
              </div>

              <div class="item form-group" id="time-restriction" style="display:none;">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="title">Booking Time <span class="required">*</span> </label>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  {!! Form::text('from_time',old('from_time'), ['id' => 'from_time', 'class'=>'form-control col-md-7 col-xs-12', 'readonly'=>'readonly', 'placeholder'=>'From Time']) !!}
                  @if ($errors->has('from_time'))
                    <span class="help-block">
                      <strong>{{ $errors->first('from_time') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                  {!! Form::text('to_time',old('to_time'), ['id' => 'to_time', 'class'=>'form-control col-md-7 col-xs-12', 'readonly'=>'readonly', 'placeholder'=>'To Time']) !!}
                  @if ($errors->has('to_time'))
                    <span class="help-block">
                      <strong>{{ $errors->first('to_time') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group" id="file-image">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="image">Image </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  {!! Form::file('image', ['id' => 'image', 'class'=>'form-control col-md-7 col-xs-12', 'onchange'=>'return fileValidation()']) !!}
                  <small class="note"><b>Note</b> : For better quality photo width = 180px & Height = 180px<br>Upload only <strong>png, jpg, jpeg</strong> extension Image. </small>
                  @if ($errors->has('image'))
                  <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                  </span>
                @endif
                <div id="imageView"></div>
                </div>
              </div>
              <div class="item form-group" id="bann-image">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="banner_img">Banner Image <span class="required">*</span> </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  {!! Form::file('banner_img', ['id' => 'banner_img', 'class'=>'form-control col-md-7 col-xs-12', 'required', 'onchange'=>'return bannerFileValidation()', 'accept'=>'image/x-png, image/jpeg']) !!}
                  <small class="note"><b>Note</b> : For better quality photo width = 1920px & Height = 400px<br>Upload only <strong>png, jpg, jpeg</strong> extension Image. </small>
                  @if ($errors->has('banner_img'))
                  <span class="help-block">
                    <strong>{{ $errors->first('banner_img') }}</strong>
                  </span>
                @endif
                <div id="banner_imageView"></div>
                </div>
              </div>
              <div class="item form-group" id="adv-image">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="adv_img">Advertisement Image </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  {!! Form::file('adv_img', ['id' => 'adv_img', 'class'=>'form-control col-md-7 col-xs-12', 'onchange'=>'return advertisementFileValidation()', 'accept'=>'image/x-png, image/jpeg']) !!}
                  <small class="note"><b>Note</b> : For better quality photo width = 1110px & Height = 250px<br>Upload only <strong>png, jpg, jpeg</strong> extension Image. </small>
                  @if ($errors->has('adv_img'))
                  <span class="help-block">
                    <strong>{{ $errors->first('adv_img') }}</strong>
                  </span>
                @endif
                <div id="advertisement_imageView"></div>
                </div>
              </div>
              <div class="item form-group" id="button-text">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="btn_name">Button Text name <span class="required">*</span> </label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  {!! Form::text('btn_name',old('btn_name'), ['id' => 'btn_name','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Button Text name']) !!}
                  @if ($errors->has('btn_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('btn_name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                  {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
                  <a href="{{ route('cms-page.index') }}" class="btn btn-primary">Back</a>
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
<script src="{{ asset('public/admin/chosen/chosen.jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/timepicker/jquery.timepicker.min.js') }}"></script> 
<script>

$("#from_time").timepicker({
    minTime: '12:00 AM'
});
$("#to_time").timepicker({
    minTime: '12:15 AM'
});

$("input[type='radio']").on('change', function () {
   var selectedValue = $("input[name='time24_status']:checked").val();
   if(selectedValue == 1){
      $('#time-restriction').show(500);
   }else{
      $('#time-restriction').hide(500);
   }
});

function fileValidation(){
    var fileInput = document.getElementById('image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.png|\.jpg|\.jpeg|\.gif|\.svg|\.JPG|\.PNG|\.JPEG|\.GIF|\.SVG)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .png/.jpg/.jpeg/.svg/.gif only.');
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

function bannerFileValidation(){
  var fileInput = document.getElementById('banner_img');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.png|\.jpg|\.jpeg|\.JPG|\.PNG|\.JPEG)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .png/.jpg/.jpeg only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('banner_imageView').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function advertisementFileValidation(){
  var fileInput = document.getElementById('adv_img');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.png|\.jpg|\.jpeg|\.JPG|\.PNG|\.JPEG)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .png/.jpg/.jpeg only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('advertisement_imageView').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function selectParent(id){
  if(id != 0){
    $('#service_request').removeAttr('checked');
    $('#banner_img').val('');
    $('#image').val('');
    $('#imageView').html('');
    $('#banner_imageView').html('');
    $('#ser_request').css('display', 'none');
    $('#file-image').css('display', 'none');
    $('#bann-image').css('display', 'none');
    $('#adv-image').css('display', 'none');
    $('#button-text').css('display', 'none');
    $('#time-restriction').css('display', 'none');
    $('#service_time').css('display', 'none');
  }else{
    $('#ser_request').css('display', 'block');
    $('#file-image').css('display', 'block');
    $('#bann-image').css('display', 'block');
    $('#adv-image').css('display', 'block');
    $('#button-text').css('display', 'block');
    $('#time-restriction').css('display', 'block');
    $('#service_time').css('display', 'block');
  }
}

$("#from_time").change(function(){
  alert("The text has been changed.");
});

$(document).ready(function() {
    $("#parent_id").chosen({no_results_text: "Oops, nothing found!"}); 
});
</script> 
@endpush