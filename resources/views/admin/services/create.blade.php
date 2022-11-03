@extends('admin.layouts.master')
@section('title','Add Services')
@section('content')
<script src="{{ asset('public/admin/ckeditor/ckeditor.js') }}"></script>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add Services</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {{ Form::open(['route' => 'services.store', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'add-services', 'id' => 'add-services','files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cms_id">Service Category <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::select('cms_id',$pages,old('cms_id'), ['id' => 'cms_id', 'required', 'class'=>'form-control']) !!}
                  @if ($errors->has('cms_id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('cms_id') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_id">Service Id <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('test_id', old('test_id', $serviceId),['id' => 'test_id', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'readonly', 'placeholder'=>'Service Id']) !!}
                  @if ($errors->has('test_id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('test_id') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Service Name <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('name', old('name'),['id' => 'name', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Service Name']) !!}
                  @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
                </div>
              </div>


              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="shot_description">Description <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::textarea('shot_description',old('shot_description'), ['id' => 'shot_description','required', 'class'=>'form-control  ckeditor', 'rows' =>'3', 'placeholder'=>'Address']) !!}
                
                @if ($errors->has('shot_description')) 
                <span class="help-block"> 
                  <strong>{{ $errors->first('shot_description') }}</strong> 
                </span> 
                @endif
              </div>

              <div class="clearfix"><br></div><div class="clearfix"><br></div>


              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sale_price">Price <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('sale_price', old('sale_price'), ['onKeyUp' => 'validatePrice(this)', 'id' => 'sale_price','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Price']) !!}
                  @if ($errors->has('sale_price'))
                    <span class="help-block">
                      <strong>{{ $errors->first('sale_price') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hour">Hour <span class="required">*</span> </label>
                <div class="col-md-2 col-sm-3 col-xs-12">
                  {!! Form::text('hour', old('hour'), ['onkeypress' => 'return isNumber(event)', 'id' => 'hour','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Hour', 'maxlength'=>'3']) !!}
                  @if ($errors->has('hour'))
                    <span class="help-block">
                      <strong>{{ $errors->first('hour') }}</strong>
                    </span>
                  @endif
                </div>
                <label class="control-label col-md-1 col-sm-1 col-xs-12" for="minute">Minute <span class="required">*</span> </label>
                <div class="col-md-2 col-sm-3 col-xs-12">
                  {!! Form::text('minute', old('minute'), ['onkeypress' => 'return isNumber(event)', 'id' => 'minute','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Minute', 'maxlength'=>'2']) !!}
                  @if ($errors->has('minute'))
                    <span class="help-block">
                      <strong>{{ $errors->first('minute') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
                  <a href="{{ route('services.index') }}" class="btn btn-primary">Back</a>
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
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function validatePrice(e) {
  var val = e.value;
  var re = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;
  var re1 = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)/g;
  
  val = re1.exec(val);
  if (val) {
    e.value = val[0];
  } else {
    e.value = "";
  }
}
</script>
@endpush