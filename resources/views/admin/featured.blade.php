@extends('admin.layouts.master')
@section('title', 'Featured')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Featured</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
          	@include('admin.includes.msg')
            {{ Form::open(['url' => 'featured', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'myaccount', 'id' => 'myaccount','files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="happy_patients">Happy Patients <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('happy_patients', old('happy_patients', $data->happy_patients), ['onkeypress' => 'return isNumber(event)', 'id' => 'happy_patients','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Happy Patients']) !!}
                  @if ($errors->has('happy_patients'))
                    <span class="help-block">
                      <strong>{{ $errors->first('happy_patients') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="success_mission">Success Mission <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('success_mission', old('success_mission', $data->success_mission), ['onkeypress' => 'return isNumber(event)', 'id' => 'success_mission','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Success Mission']) !!}
                  @if ($errors->has('success_mission'))
                    <span class="help-block">
                      <strong>{{ $errors->first('success_mission') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qualified_doctors">Qualified Doctors <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('qualified_doctors', old('qualified_doctors', $data->qualified_doctors), ['onkeypress' => 'return isNumber(event)', 'id' => 'qualified_doctors','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Qualified Doctors']) !!}
                  @if ($errors->has('qualified_doctors'))
                    <span class="help-block">
                      <strong>{{ $errors->first('qualified_doctors') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="years_of_experience">Years of experience <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('years_of_experience', old('years_of_experience', $data->years_of_experience), ['onkeypress' => 'return isNumber(event)', 'id' => 'years_of_experience','required' => 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Years of experience']) !!}
                  @if ($errors->has('years_of_experience'))
                  <span class="help-block">
                    <strong>{{ $errors->first('years_of_experience') }}</strong>
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