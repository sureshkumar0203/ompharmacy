@extends('admin.layouts.master')
@section('title','Edit Measurement Types')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Edit Measurement Types</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            @include('admin.includes.msg')
            {!! Form::model($measurement_type, ['method' => 'PATCH', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'edit-services', 'id' => 'edit-services','files'=>true, 'autocomplete' => 'off', 'novalidate', 'route' => ['measurement-types.update', $measurement_type->id]]) !!}
            {!! Form::hidden('id', $measurement_type->id) !!}
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="types">Types <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('types', old('types', $measurement_type->types),['id' => 'types', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Types']) !!}
                  @if ($errors->has('types'))
                  <span class="help-block">
                    <strong>{{ $errors->first('types') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type_unit">Unit Name <span class="required">*</span> </label>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  {!! Form::text('type_unit', old('type_unit', $measurement_type->type_unit),['id' => 'type_unit', 'required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Unit Name']) !!}
                  @if ($errors->has('type_unit'))
                  <span class="help-block">
                    <strong>{{ $errors->first('type_unit') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
                  <a href="{{ route('measurement-types.index') }}" class="btn btn-primary">Back</a>
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
@endpush