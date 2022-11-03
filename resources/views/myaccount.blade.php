@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('content') 
<!-- Start Banner Carousel -->
<div class="container mtb200" id="myaccount">
  <div class="row">
    @include('includes.usermenu')
    <div class="col-md-9">
      <div class="myaccount-box">
        <div class="container mb30 form-wrapper">
          <h5>Personal Information</h5>
          @if (Session::has('success'))
            <div class="alert alert-success fadeout"> {{ Session::get('success') }} </div>
          @endif

          @if (Session::has('error'))
            <div class="alert alert-danger fadeout"> {{ Session::get('error') }} </div>
          @endif
          {{ Form::open(['url' => 'myaccount', 'autocomplete' => 'off', 'id' => 'my-account', 'files'=>true, 'style' => 'padding-left:20px; padding-bottom: 30px;']) }}
          <div class="row">
          
            <div class="col-sm-6">
              <div class="form-group">
                <label for="first_name">First Name *:</label>
                {!! Form::text('first_name', old('first_name', $userData->first_name), ['id' => 'first_name', 'class'=>'form-control', 'placeholder'=>'First Name', 'data-error' => 'Please enter your first Name']) !!}
                  @if ($errors->has('first_name'))
                    <span class="error">
                      <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="last_name">Last Name *:</label>
                {!! Form::text('last_name', old('last_name', $userData->last_name), ['id' => 'last_name', 'class'=>'form-control', 'placeholder'=>'Last Name']) !!}
                  @if ($errors->has('last_name'))
                    <span class="error">
                      <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            </div>
            <div class="row ">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="phone_">Phone *:</label>
                {!! Form::text('phone', old('phone_', $userData->phone), ['id' => 'phone_', 'class'=>'form-control', 'onkeypress' => 'return numeric(event)', 'readonly', 'maxlength' => '10', 'placeholder'=>'Phone']) !!}
                  @if ($errors->has('phone_'))
                    <span class="error">
                      <strong>{{ $errors->first('phone_') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="email">Email *:</label>
                {!! Form::text('email', old('email', $userData->email), ['id' => 'email', 'class'=>'form-control', 'placeholder'=>'Email']) !!}
                  @if ($errors->has('email'))
                    <span class="error">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="address">Address *:</label>
                {!! Form::textarea('address', old('address', $userData->address), ['id' => 'address', 'class'=>'form-control', 'placeholder'=>'Address', 'rows' => '2']) !!}
                  @if ($errors->has('address'))
                    <span class="error">
                      <strong>{{ $errors->first('address') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="pin">Pin *:</label>
                {!! Form::text('pincode', old('pin', $userData->pincode), ['id' => 'pin', 'class'=>'form-control', 'onkeypress' => 'return numeric(event)', 'maxlength' => '6', 'placeholder'=>'Pin']) !!}
                  @if ($errors->has('pin'))
                    <span class="error">
                      <strong>{{ $errors->first('pin') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="profile_img">profile Image :</label>
                {!! Form::file('profile_img', ['id' => 'profile_img', 'class'=>'form-control']) !!}
                  @if ($errors->has('profile_img'))
                    <span class="error">
                      <strong>{{ $errors->first('profile_img') }}</strong>
                    </span>
                  @endif
              </div>
            </div>

            <div class="clearfix" style="width:100%;"></div>
            <h5 style="padding-left:15px;">Personal Information</h5>
            <div class="clearfix" style="width:100%;"></div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="profile_img">Disease profile :</label>
                {!! Form::textarea('disease_profile', old('disease_profile', $userData->disease_profile), ['id' => 'disease_profile', 'class'=>'form-control', 'placeholder'=>'Disease profile']) !!}
                  @if ($errors->has('disease_profile'))
                    <span class="error">
                      <strong>{{ $errors->first('disease_profile') }}</strong>
                    </span>
                  @endif
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="profile_img">Consultant contact details :</label>
                {!! Form::textarea('consultant_contact_dtls', old('consultant_contact_dtls', $userData->consultant_contact_dtls), ['id' => 'consultant_contact_dtls', 'class'=>'form-control', 'placeholder'=>'Ex - Suresh Kumar  &nbsp; 9861245555']) !!}
                  @if ($errors->has('consultant_contact_dtls'))
                    <span class="error">
                      <strong>{{ $errors->first('consultant_contact_dtls') }}</strong>
                    </span>
                  @endif
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="profile_img">Hospital to be in case of emergency :</label>
                {!! Form::textarea('hospital_dtls', old('hospital_dtls', $userData->hospital_dtls), ['id' => 'consultant_contact_dtls', 'class'=>'form-control', 'placeholder'=>'Hospital to be in case of emergency']) !!}
                  @if ($errors->has('hospital_dtls'))
                    <span class="error">
                      <strong>{{ $errors->first('hospital_dtls') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            
            <div class="col-sm-6">
              <div class="form-group">
                <label for="profile_img">Bhubaneswar based contact person details :</label>
                {!! Form::textarea('relative_contact_dtls', old('relative_contact_dtls', $userData->relative_contact_dtls), ['id' => 'relative_contact_dtls', 'class'=>'form-control', 'placeholder'=>'Ex - Suresh Kumar  &nbsp; 9861245555']) !!}
                  @if ($errors->has('relative_contact_dtls'))
                    <span class="error">
                      <strong>{{ $errors->first('relative_contact_dtls') }}</strong>
                    </span>
                  @endif
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group" style="margin-bottom: 0px;margin-top: 24px;float: left;">
                {{ Form::submit('Update', array('class' => 'btn blue myac-btn')) }}
              </div>
            </div>
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection