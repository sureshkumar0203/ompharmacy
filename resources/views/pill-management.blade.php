@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')

@endsection
@section('content') 
<!-- Start Banner Carousel -->
<div class="container mtb200" id="myaccount">
  <div class="row"> @include('includes.usermenu')
    <div class="col-md-9">
      <div class="myaccount-box">
        <div class="container mb40 form-wrapper">
          <div class="row">
            <h5>Pill Management</h5>
          </div>
          
          <div class="row">
            <div class="col-md-12 payment-history">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th><strong>Medicine Name</strong></th>
                    <th><strong>Time</strong></th>
                    <th><strong>Days</strong></th>
                    <th><strong>Alert Type</strong></th>
                  </tr>
                </thead>
                <tbody>
                @if(count($data) > 0)
                @foreach($data as $getData)
                <tr>
                  <td>{{ $getData->medicine }}</td>
                  <td>{{ date("g:i A", strtotime($getData->time)) }}</td>
                  <td>{{ $getData->days }}</td>
                  <td>@if($getData->alert_type == 1) SMS @else CALL @endif</td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="4" class="record-notfound">No record found!</td>
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

@endpush