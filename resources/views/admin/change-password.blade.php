@extends('admin.layouts.master')
@section('title', 'Change Password')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Change Password</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
          	@include('admin.includes.msg')
            {{ Form::open(['url' => 'change-password', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'changepwd', 'id' => 'change-password','files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Current Password <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::password('current_password', ['id' => 'current_password','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Current Password']) !!}
                  @if ($errors->has('current_password'))
	                <span class="help-block">
	                  <strong>{{ $errors->first('current_password') }}</strong>
	                </span>
	              @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">New password <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::password('new_password',['id' => 'new_password','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'New Password']) !!}
                  @if ($errors->has('new_password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('new_password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirm password <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::password('confirm_password', ['id' => 'repeatpass','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Confirm Password']) !!}
                  @if ($errors->has('confirm_password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('confirm_password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Update', array('class' => 'btn btn-success', 'id'=>'updatepass')) }}
                  <a href="{{ URL::to('administrator') }}" class="btn btn-primary">Back</a>
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
@endpush