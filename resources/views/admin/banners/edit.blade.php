@extends('admin.layouts.master')
@section('title','Edit Banner')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Edit Banner</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {!! Form::model($banner, ['method' => 'PATCH', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'add-banners', 'id' => 'add-banners','files'=>true, 'autocomplete' => 'off', 'novalidate', 'route' => ['banners.update', $banner->id]]) !!}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Text 1 <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('title',old('title', $banner->title), ['id' => 'title','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Title', 'maxlength' => '33']) !!}
                  @if ($errors->has('title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Text 2 <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::textarea('description',old('description', $banner->description), ['id' => 'description','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'4', 'maxlength' => '255', 'placeholder'=>'Description']) !!}
                  @if ($errors->has('description'))
                  <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="link">Link </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('link',old('link', $banner->link), ['id' => 'link', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Link']) !!}
                  @if ($errors->has('link'))
                  <span class="help-block">
                    <strong>{{ $errors->first('link') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Banner <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::file('image', ['id' => 'image', 'class'=>'form-control col-md-7 col-xs-12', 'onchange'=>'return fileValidation()', 'accept'=>'image/x-png, image/jpeg']) !!}
                  <small class="note"><b>Note</b> : For better quality photo width = 1920px & Height = 594px<br>Upload only <strong>png, jpg, jpeg</strong> extension banner. </small>
                  @if ($errors->has('image'))
                  <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                  </span>
                @endif
                <div id="imagePreview"><img src="{{ asset('public/images/banner') }}/{{ $banner->image }}" alt="" height="80px"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
                  <a href="{{ route('banners.index') }}" class="btn btn-primary">Back</a>
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
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script> 
@endpush