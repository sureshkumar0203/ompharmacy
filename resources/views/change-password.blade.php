@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('content') 
<!-- Start Banner Carousel -->
<div class="container mtb200" id="myaccount">
  <div class="row">
    @include('includes.usermenu')
    <div class="col-md-9">
      <div class="myaccount-box">
        <div class="container mb40 form-wrapper">
          <h5>Change Password</h5>
          @if (Session::has('success'))
            <div class="alert alert-success fadeout"> {{ Session::get('success') }} </div>
          @endif

          @if (Session::has('error'))
            <div class="alert alert-danger fadeout"> {{ Session::get('error') }} </div>
          @endif
          {{ Form::open(['url' => 'user-change-password', 'autocomplete' => 'off', 'id' => 'change-password', 'style' => 'padding-left:20px']) }}
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Old Password *:</label>
                {!! Form::password('old_password', ['id' => 'old_password', 'class'=>'form-control', 'placeholder'=>'Old Password']) !!}
                  @if ($errors->has('old_password'))
                    <span class="error">
                      <strong>{{ $errors->first('old_password') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="email">New Password *:</label>
                {!! Form::password('new_password', ['id' => 'new_password', 'class'=>'form-control', 'placeholder'=>'New Password']) !!}
                  @if ($errors->has('new_password'))
                    <span class="error">
                      <strong>{{ $errors->first('new_password') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="pwd">Repeat Password *:</label>
                {!! Form::password('repeat_password', ['id' => 'repeat_password','class'=>'form-control', 'placeholder'=>'Repeat Password']) !!}
                  @if ($errors->has('repeat_password'))
                    <span class="error">
                      <strong>{{ $errors->first('repeat_password') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-12 text-right">
              {{ Form::submit('Update', array('class' => 'btn blue myac-btn')) }}
            </div>
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection