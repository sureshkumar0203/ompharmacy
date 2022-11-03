@extends('admin.layouts.master')
@section('title','Edit Blog')
@section('content')
<script src="{{ asset('public/admin/ckeditor/ckeditor.js') }}"></script>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Edit Blog</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {!! Form::model($blog, ['method' => 'PATCH', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'edit-blogs', 'id' => 'edit-blogs','files'=>true, 'autocomplete' => 'off', 'novalidate', 'route' => ['blogs.update', $blog->id]]) !!}
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::text('title',old('title', $blog->title), ['id' => 'title','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Title']) !!}
                  @if ($errors->has('title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="description">Sort Description <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::textarea('sort_description',old('sort_description', $blog->sort_description), ['id' => 'sort_description','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'4', 'placeholder'=>'Sort Description']) !!}
                  @if ($errors->has('sort_description'))
                  <span class="help-block">
                    <strong>{{ $errors->first('sort_description') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::textarea('description',old('description', $blog->description), ['id' => 'description','required', 'class'=>'form-control col-md-7 col-xs-12 ckeditor', 'rows' =>'3', 'placeholder'=>'Address']) !!}
                <script type="text/javascript">            
                  CKEDITOR.replace( 'description', {
                    filebrowserUploadUrl: '{{ url("public/admin/ckeditor/filemanager/connectors/php/upload.php")}}'
                  });
                </script>
                @if ($errors->has('description')) <span class="help-block"> <strong>{{ $errors->first('description') }}</strong> </span> @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="description">Meta Title <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::textarea('meta_title',old('meta_title', $blog->meta_title), ['id' => 'meta_title','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'4', 'placeholder'=>'Meta Title']) !!}
                  @if ($errors->has('meta_title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('meta_title') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="description">Meta Keyword <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::textarea('meta_keyword',old('meta_keyword', $blog->meta_keyword), ['id' => 'meta_keyword','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'4', 'placeholder'=>'Meta Keyword']) !!}
                  @if ($errors->has('meta_keyword'))
                  <span class="help-block">
                    <strong>{{ $errors->first('meta_keyword') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="description">Meta Description <span class="required">*</span> </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  {!! Form::textarea('meta_description',old('meta_description', $blog->meta_description), ['id' => 'meta_description','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'4', 'placeholder'=>'Meta Description']) !!}
                  @if ($errors->has('meta_description'))
                  <span class="help-block">
                    <strong>{{ $errors->first('meta_description') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="link">Author <span class="required">*</span></label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('author',old('author', $blog->author), ['id' => 'author', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Author']) !!}
                  @if ($errors->has('author'))
                  <span class="help-block">
                    <strong>{{ $errors->first('author') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="image">Image </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::file('image', ['id' => 'image', 'class'=>'form-control col-md-7 col-xs-12', 'onchange'=>'return fileValidation()', 'accept'=>'image/x-png, image/jpeg']) !!}
                  <small class="note"><b>Note</b> : For better quality photo width = 750px & Height = 270px<br>Upload only <strong>png, jpg, jpeg</strong> extension banner. </small>
                  @if ($errors->has('image'))
                  <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                  </span>
                @endif
                <div id="imagePreview"><img src="{{ asset('public/blog') }}/{{ $blog->image }}" alt="" height="80px"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                  {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
                  <a href="{{ route('blogs.index') }}" class="btn btn-primary">Back</a>
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
        alert('Please upload file having extensions .png/.jpg/.jpeg/.svg/.gif only.');
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