@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')
<link rel="stylesheet" href="{{ asset('public/css/datepicker/zebra_datepicker.min.css') }}" type="text/css">
<style>
form.search-measurement #datepicker, #todatepicker {
padding: 22px 24px;
    height: 38px;
    border-radius: 3px;
    border: solid 1px #00000057;
    background: transparent;
}
select.select-measurement {
    border: 1px solid #a9a9a9;
	border-radius:3px;
}
.book-date, .to-book-date {
    position: absolute;
    top: -20px;
}
.search-btn {
    background: #007aa5;
    border: none;
    outline: none;
    margin: 0 !important;
    font-size: 16px !important;
    text-transform: capitalize !important;
    cursor: pointer;
    border-radius: 3px !important;
}
.payment-history {
    margin-top: 20px;
}
.btn-clear {
    background: #c70000;
    border: none;
    outline: none;
    margin: 0 !important;
    font-size: 16px !important;
    text-transform: capitalize !important;
    cursor: pointer;
    line-height: 47px;
    font-weight: 500;
    color: #fff;
    padding: 15px;
    border-radius: 3px;
}
.btn-clear:hover {
    color: #fff;
}
</style>
@endsection
@section('content') 
<!-- Start Banner Carousel -->
<div class="container mtb200" id="myaccount">
  <div class="row"> @include('includes.usermenu')
    <div class="col-md-9">
      <div class="myaccount-box">
        <div class="container mb40 form-wrapper">
          <div class="row">
            <h5>Health Records</h5>
          </div>
          
          {{ Form::open(['url' => 'search-measurement', 'class' => 'search-measurement', 'method' => 'get', 'autocomplete' => 'off']) }}
            <div class="row">
                <div class="col-md-2 padr0">
                  {!! Form::text('fromDate', old('fromDate'),['id' => 'datepicker','class' => 'padr0', 'required', 'placeholder'=>'From date']) !!}
                  <div class="book-date"></div>
                </div>
                <div class="col-md-2 padr0">
                  {!! Form::text('toDate', old('toDate'),['id' => 'todatepicker','class' => 'padr0', 'required', 'placeholder'=>'To date']) !!}
                  <div class="to-book-date"></div>
                </div>
                <div class="col-md-4 padr0">
                  {!! Form::select('measurement',$measurement,old('measurement'), ['class'=>'select-measurement']) !!}
                </div>
                <div class="col-md-2 padr0">
                  {{ Form::submit('search', array('class' => 'search-btn')) }}
                </div>
                <div class="col-md-2 padr0">
                  <a href="{{ url('/health-records') }}" class="btn-clear">Cancel</a>
                </div>
              </div>
          {{ Form::close() }}

          <div class="row">
            <div class="col-md-12 payment-history">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th><strong>Measurement Date</strong></th>
                    <th><strong>Measurement Types</strong></th>
                    <th><strong>Measurements Value</strong></th>
                  </tr>
                </thead>
                <tbody>
                @if(count($data) > 0)
                @foreach($data as $getData)
                <tr>
                  <td class="dated">{{ date('F d Y' ,strtotime($getData->updated_at)) }}</td>
                  <td>{{ $getData->measurement_types->types }}</td>
                  <td>{{ $getData->measurements_value }} ({{ $getData->measurement_types->type_unit }})</td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="3" class="record-notfound">No record found!</td>
                </tr>
                @endif
                  </tbody>
                
              </table>
              {{ $data->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('script') 
<script src="{{ asset('public/js/datepicker/zebra_datepicker.min.js') }}"></script> 
<script>
$(document).ready(function() {
  $('#datepicker').Zebra_DatePicker({
    pair: $('#todatepicker'),
    format: 'M d, Y',
    container: $(".book-date")
  });

  $('#todatepicker').Zebra_DatePicker({
    direction: 1,
    format: 'M d, Y',
    container: $(".to-book-date")
  });
});
</script>
@endpush