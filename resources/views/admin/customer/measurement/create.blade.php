@extends('admin.layouts.master')
@section('title','Add Management')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {{ Form::open(['route' => 'measurement.store', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
            {!! Form::hidden('user_id', $id) !!}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="measurements_type_id">Measurements Type <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::select('measurements_type_id',$data,old('measurements_type_id'), ['id' => 'measurements_type_id', 'required', 'class'=>'form-control']) !!}
                  @if ($errors->has('measurements_type_id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('measurements_type_id') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="measurements_value">Measurements Value <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('measurements_value', old('measurements_value'),['id' => 'measurements_value', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Measurements Value']) !!}
                  @if ($errors->has('measurements_value'))
                  <span class="help-block">
                    <strong>{{ $errors->first('measurements_value') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
                  <a href="{{ url('administrator/measurement') }}/{{ $id }}" class="btn btn-primary">Back</a>
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
</script>
@endpush