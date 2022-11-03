@extends('admin.layouts.master')
@section('title', 'About Content')
@section('content')
<script src="{{ asset('public/admin/ckeditor/ckeditor.js') }}"></script>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>About Content</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content"> @include('admin.includes.msg')
            {{ Form::open(['url' => 'about-content', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'about-content', 'id' => 'about-content','files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
            {!! Form::hidden('reference_id', $aboutContent->id, ['id' => 'reference_id']) !!} 
            {!! Form::hidden('hidden_img', $aboutContent->image, ['id' => 'hidden_img']) !!} 
            <div class="item form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description">About Content <span class="required">*</span> </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                {!! Form::textarea('description',$aboutContent->description, ['id' => 'description','required', 'class'=>'form-control col-md-7 col-xs-12 ckeditor', 'rows' =>'3', 'placeholder'=>'About Content']) !!}
                <script type="text/javascript">            
                  CKEDITOR.replace( 'description', {
                    filebrowserUploadUrl: '{{ url("public/admin/ckeditor/filemanager/connectors/php/upload.php")}}'
                  });
                </script>
                @if ($errors->has('description')) <span class="help-block"> <strong>{{ $errors->first('description') }}</strong> </span> @endif </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="vision_mission">Vision & Mission Content <span class="required">*</span> </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                {!! Form::textarea('vision_mission',$aboutContent->vision_mission, ['id' => 'vision_mission','required', 'class'=>'form-control col-md-7 col-xs-12 ckeditor', 'rows' =>'3', 'placeholder'=>'Vision & Mission Content']) !!}
                <script type="text/javascript">            
                  CKEDITOR.replace( 'vision_mission', {
                    filebrowserUploadUrl: '{{ url("public/admin/ckeditor/filemanager/connectors/php/upload.php")}}'
                  });
                </script>
                @if ($errors->has('vision_mission')) <span class="help-block"> <strong>{{ $errors->first('vision_mission') }}</strong> </span> @endif </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-2"> {{ Form::submit('Update', array('class' => 'btn btn-success', 'id'=>'updatepass')) }} <a href="{{ URL::to('administrator') }}" class="btn btn-primary">Back</a> </div>
            </div>
            {{ Form::close() }} </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('script') 
<script src="{{ asset('public/admin/js/validator.js') }}"></script>
@endpush