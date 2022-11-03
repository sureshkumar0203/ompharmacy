@extends('admin.layouts.master')
@section('title','Edit Pill Management')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Edit Pill Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {!! Form::model($healthActivity, ['method' => 'PATCH', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'files'=>true, 'autocomplete' => 'off', 'novalidate', 'route' => ['health-activity.update', $healthActivity->id]]) !!}
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Health Activity <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::textarea('description', old('description', $healthActivity->description),['id' => 'description', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Health Activity', 'rows'=>'3']) !!}
                  @if ($errors->has('description'))
                  <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                  </span>
                @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
                  <a href="{{ url('administrator/health-activity') }}/{{ $healthActivity->user_id }}" class="btn btn-primary">Back</a>
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