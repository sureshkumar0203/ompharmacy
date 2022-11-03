@extends('admin.layouts.master')
@section('title','Edit CMS')
@section('content')
<script src="{{ asset('public/admin/ckeditor/ckeditor.js') }}"></script>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Edit CMS</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {!! Form::open(['url' => 'update-page-content', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'edit-cms', 'id' => 'edit-cms','files'=>true, 'autocomplete' => 'off', 'novalidate']) !!}
            {!! Form::hidden('id', $data->id) !!}
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::text('title',old('title', $data->title), ['id' => 'title','required', 'readonly', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Title']) !!}
                  @if ($errors->has('title'))
                    <span class="help-block">
                      <strong>{{ $errors->first('title') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="content">Content <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::textarea('content',old('content', $data->content), ['id' => 'content','required', 'class'=>'form-control col-md-7 col-xs-12 ckeditor', 'rows' =>'3', 'placeholder'=>'Content']) !!}
                <script type="text/javascript">            
                  CKEDITOR.replace( 'description', {
                    filebrowserUploadUrl: '{{ url("public/admin/ckeditor/filemanager/connectors/php/upload.php")}}'
                  });
                </script>
                @if ($errors->has('content')) 
                  <span class="help-block"> 
                    <strong>{{ $errors->first('content') }}</strong> 
                  </span> 
                @endif
                </div>
              </div>
              @if($data->id != 6)
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="meta_title">Meta Title <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::textarea('meta_title',old('meta_title', $data->meta_title), ['id' => 'meta_title','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'3', 'placeholder'=>'Meta Title']) !!}
                @if ($errors->has('meta_title')) 
                  <span class="help-block"> 
                    <strong>{{ $errors->first('meta_title') }}</strong> 
                  </span> 
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="meta_keywords">Meta Keyword <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::textarea('meta_keywords',old('meta_keywords', $data->meta_keywords), ['id' => 'meta_keywords','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'3', 'placeholder'=>'Meta Keyword']) !!}
                @if ($errors->has('meta_keywords'))
                  <span class="help-block"> 
                    <strong>{{ $errors->first('meta_keywords') }}</strong> 
                  </span> 
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="meta_description">Meta Description <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::textarea('meta_description',old('meta_description', $data->meta_description), ['id' => 'meta_description','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'3', 'placeholder'=>'Meta Description']) !!}
                @if ($errors->has('meta_description')) 
                  <span class="help-block"> 
                    <strong>{{ $errors->first('meta_description') }}</strong> 
                  </span> 
                @endif
                </div>
              </div>
              @endif
              <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                  {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
                  <a href="{{ url('administrator/page-content') }}" class="btn btn-primary">Back</a>
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
@endpush