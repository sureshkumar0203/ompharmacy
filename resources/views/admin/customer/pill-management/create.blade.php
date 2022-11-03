@extends('admin.layouts.master')
@section('title','Add Pill Management')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add Pill Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {{ Form::open(['route' => 'pill-management.store', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
            {!! Form::hidden('user_id', $id) !!}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="medicine">Medicine Name <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('medicine', old('medicine'),['id' => 'medicine', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Medicine Name']) !!}
                  @if ($errors->has('medicine'))
                  <span class="help-block">
                    <strong>{{ $errors->first('medicine') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Medicine start Date <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12"> {!! Form::text('start_date',old('start_date'), ['id' => 'start_date','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Medicine start Date', 'readonly']) !!}
                  @if ($errors->has('start_date')) <span class="help-block"> <strong>{{ $errors->first('start_date') }}</strong> </span> @endif </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Time <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('time', old('time'),['id' => 'time', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'HH:MM', 'maxlength'=>'5']) !!}
                  [FORMAT - HH:MM]
                  @if ($errors->has('time'))
                  <span class="help-block">
                    <strong>{{ $errors->first('time') }}</strong>
                  </span>
                @endif
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="days">Days <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('days', old('days'),['id' => 'days', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Days', 'maxlength'=>'3', 'onkeypress' => 'return isNumber(event)']) !!}
                  @if ($errors->has('days'))
                  <span class="help-block">
                    <strong>{{ $errors->first('days') }}</strong>
                  </span>
                @endif
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alert_type">Alert Type <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::select('alert_type', array('1' => 'SMS'),  old('alert_type'), ['id' => 'alert_type', 'required', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                  @if ($errors->has('alert_type'))
                  <span class="help-block">
                    <strong>{{ $errors->first('alert_type') }}</strong>
                  </span>
                @endif
                </div>
              </div>


              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
                  <a href="{{ url('administrator/pill-management') }}/{{ $id }}" class="btn btn-primary">Back</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$(document).ready(function () {
    var date = new Date();
    $('#start_date').datepicker({
        autoclose: true,
        todayHighlight: true,
        startDate: date,
        format: 'dd/mm/yyyy'
    });
});
</script>
@endpush