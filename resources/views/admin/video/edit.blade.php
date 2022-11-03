@extends('admin.layouts.master')
@section('title', 'Video Management')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Video Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
          	@include('admin.includes.msg')
            {{ Form::model($video, ['method' => 'PATCH', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'video', 'id' => 'video','files'=>true, 'autocomplete' => 'off', 'novalidate', 'route' => ['video.update', $video->id]]) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video">Upload Video <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::file('video', ['id' => 'video', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'onchange'=>'return fileValidation(this)', 'accept'=>'video/*']) !!}
                  <small class="note"><b>Note</b> : Upload only <strong>.mp4 or .mov</strong> extension video. <br>Maximum size = 10MB</small>
                  @if ($errors->has('video'))
                  <span class="help-block">
                    <strong>{{ $errors->first('video') }}</strong>
                  </span>
                @endif
                </div>
              </div>
            @if($video->video !="")
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="video"></label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <video width="400" controls>
                    <source src="{{ asset('public/video') }}/{{ $video->video }}" type="video/mp4">
                  </video>
                </div>
              </div>
            @endif
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Update', array('class' => 'btn btn-success', 'id'=>'updatepass')) }}
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
	
    if(exe == "mp4" || exe == "mov") {
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