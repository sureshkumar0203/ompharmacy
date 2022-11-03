@extends('admin.layouts.master')
@section('title', 'Add Video')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add Video</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
          	@include('admin.includes.msg')
            {{ Form::open(['route' => 'video.store', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'video', 'id' => 'video','files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video">Upload Video <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::file('video', ['id' => 'video', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'onchange'=>'return fileValidation(this)', 'accept'=>'video/mp4,video/*']) !!}
                  <small class="note"><b>Note</b> : Upload only <strong>.mp4 or .mov</strong> extension video. <br>Maximum size = 10MB</small>
                  @if ($errors->has('video'))
                  <span class="help-block">
                    <strong>{{ $errors->first('video') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Submit', array('class' => 'btn btn-success', 'id'=>'updatepass')) }}
                  <a href="{{ route('video.index') }}" class="btn btn-primary">Back</a>
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
<script src="{{ asset('public/admin/js/validator.js') }}"></script>
<script>
function fileValidation(file){
    var FileSize = Math.round((file.files[0].size/1024/1024));
    var filePath = file.value;
    var exe_all = filePath.split('.')[1];
	var ext = exe_all.toLowerCase();
	
    if(ext == "mp4" || ext == "mov") {
      if(FileSize > 10){
        $('#video')[0].reset();
        alert('Maximum upload file size should be less than 10MB.');
      }
    }else{
        $('#video')[0].reset();
        alert('Invalid extensions.Upload only .mp4 or .mov file');
    } 
}
</script> 
@endpush