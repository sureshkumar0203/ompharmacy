@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')
<link rel="stylesheet" href="{{ asset('public/css/alert/jquery-confirm.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/lightbox/lightbox.css') }}">
<style>
a.message {
color: #007aa5;
font-size: 18px;
}
.jconfirm .jconfirm-box div.jconfirm-title-c{
    color: #0d6f91;
    text-transform: uppercase;
    font-weight: 400;
    border-bottom: 1px solid #0d6f91;
    padding-bottom: 5px;
    margin-bottom: 10px;
    font-size: 18px;
}
.jconfirm-content{
  font-size: 13px;
  line-height: 22px;
}
.table tr td{
  line-height: 17px;
  vertical-align: middle;
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
            <h5>Prescription Upload</h5>
          </div>
          <div class="row">
            <div class="col-md-12 payment-history">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="15%" style="text-align: center;"><strong>Upload Date</strong></th>
                    <th width="20%" style="text-align: center;"><strong>Prescription</strong></th>
                    <th width="22%" style="text-align: center;"><strong>Notes</strong></th>
                    <th width="31%" style="text-align: center;"><strong>Address</strong></th>
                    <th width="12%" style="text-align: center;"><strong>Status</strong></th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($prescriptions) > 0)
                  @foreach($prescriptions as $prescription)
                  <tr>
                    <td class="dated">{{ date('d-F-Y g:i A' ,strtotime($prescription->created_at)) }}</td>
                    <td style="text-align: center;">
                      <span class="pres-det">
                        <a href="{{ asset('storage/app/'.$prescription->image) }}" class="gal_link"><img src="{{ asset('storage/app/'.$prescription->image) }}" alt="prescription..." height="80"></a>
                        <a href="{{ asset('storage/app/'.$prescription->image) }}" download class="down"  title="Download Prescription"><i class="fa fa-download"></i></a>
                      </span>
                    </td>
                    <td>{{ $prescription->note }}</td>
                    <td>{{ $prescription->address }}</td>
                    <td style="width: 100px;padding: 0px 5px;vertical-align: middle; text-align: center;">
                      @if($prescription->status == 1)
                      <a href="javascript:void(0)" class="message viewFeedback" data-id="{{ $prescription->id }}" title="Admin Message"><i class="fa fa-comments-o"></i></a>
                      @else
                      <img src="{{ asset('public/images/pending.png') }}" alt="pending...">
                      @endif
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="5" class="record-notfound">No record found!</td>
                  </tr>
                  @endif
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('script')
<script src="{{ asset('public/js/alert/jquery-confirm.min.js') }}"></script>

<script src="{{ asset('public/js/lightbox/jquery.lightbox.js') }}"></script>
<script src="{{ asset('public/js/lightbox/lightbox.js') }}"></script>
@endpush