@extends('admin.layouts.master')
@section('title','Add Sub Admin')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add Sub Admin</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {{ Form::open(['url' => 'administrator/subadmin/create', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'add-subadmin', 'id' => 'add-subadmin','files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Full Name <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('name', old('name'),['id' => 'name', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Full Name']) !!}
                  @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('email', old('email'),['id' => 'email', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'E-mail']) !!}
                  @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_no">Phone <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('phone_no', old('phone_no'), ['onkeypress' => 'return isNumber(event)', 'id' => 'phone_no','required', 'class'=>'form-control col-md-7 col-xs-12', 'maxlength'=>'10', 'placeholder'=>'Phone']) !!}
                  @if ($errors->has('phone_no'))
                    <span class="help-block">
                      <strong>{{ $errors->first('phone_no') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
                  <a href="{{ url('administrator/subadmin/') }}" class="btn btn-primary">Back</a>
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