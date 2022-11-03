@extends('admin.layouts.master')
@section('title','Add Testimonial')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add Testimonial</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {{ Form::open(['route' => 'testimonials.store', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'add-testimonials', 'id' => 'add-testimonials','files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('name', old('name'),['id' => 'name', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Name']) !!}
                  @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Message <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::textarea('description', old('description'),['id' => 'description', 'maxlength'=>'255', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'3', 'placeholder'=>'Description']) !!}
                  @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Image </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::file('image', ['id' => 'image', 'class'=>'form-control col-md-7 col-xs-12', 'onchange'=>'return fileValidation()', 'accept'=>'image/x-png, image/jpeg']) !!}
                  <small class="note"><b>Note</b> : For better quality photo width = 91px & Height = 91px<br>Upload only <strong>png, jpg, jpeg</strong> extension banner. </small>
                  @if ($errors->has('image'))
                  <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                  </span>
                @endif
                <div id="testimonialImagePreview"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
                  <a href="{{ route('testimonials.index') }}" class="btn btn-primary">Back</a>
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
<script type="text/javascript">
function fileValidation(){
    var fileInput = document.getElementById('image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.png|\.jpg|\.jpeg|\.gif|\.svg|\.JPG|\.PNG|\.JPEG|\.GIF|\.SVG)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .png/.jpg/.jpeg only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('testimonialImagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script> 
@endpush