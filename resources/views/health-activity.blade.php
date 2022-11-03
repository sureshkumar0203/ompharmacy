@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')
<style>
td p {
    line-height: 25px;
    text-align: justify;
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
            <h5>Health Activity</h5>
          </div>
          
          <div class="row">
            <div class="col-md-12 payment-history">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="15%"><strong>Date</strong></th>
                    <th><strong>Health Activity</strong></th>
                  </tr>
                </thead>
                <tbody>
                @if(count($data) > 0)
                @foreach($data as $getData)
                <tr>
                  <td>{{ date('d M Y' ,strtotime($getData->created_at)) }}</td>
                  <td><p>{{ $getData->description }}</p></td>
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