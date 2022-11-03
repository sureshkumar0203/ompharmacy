@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')
<style>
.link {
    color: #0051a5;
    display: inline-block;
    line-height: 15px;
    text-decoration: underline;
    cursor: pointer;
}
span.approval {
    display: inline-block;
    color: #b20000;
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
            <h5>Payment History</h5>
          </div>
          <div class="row">
            <div class="col-md-12 payment-history">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="22%"><strong>Date (Value Date)</strong></th>
                    <th width="31%"><strong>Narration</strong></th>
                    <th width="23%"><strong>Ref.No.</strong></th>
                    <th width="12%"><strong>Credit (<i class="fa fa-inr" aria-hidden="true"></i>)</strong></th>
                    <th width="12%"><strong>Debit (<i class="fa fa-inr" aria-hidden="true"></i>)</strong></th>
                  </tr>
                </thead>
                <tbody>
                @if(count($transactions) > 0)
                @foreach($transactions as $transaction)
                <tr>
                  <td class="dated">{{ date('d-F-Y g:i A' ,strtotime($transaction->created_at)) }}</td>
                  <td style="line-height: 25px;">
                    @if($transaction->booking_id == null && $transaction->transfer_status == 0)
                      Money added to wallet
                    @elseif($transaction->transfer_status == 2)
                      <b>Cancel</b> / {{ $transaction->book_ser->service_det->cms_page->title }} / {{ $transaction->book_ser->service_det->name }} 
                    @elseif($transaction->transfer_status == 1)
                      <b>Transfer</b> @if($transaction->transfer->status == 0)<span class="approval">(waiting for approval)</span>@endif &nbsp; &nbsp;<span class="link" data-id="{{ $transaction->id }}" data-toggle="modal" data-target="#exampleModal">view Details</span>
                    @else
                      <b>Booking</b> / {{ $transaction->book_ser->service_det->cms_page->title }} / {{ $transaction->book_ser->service_det->name }}
                    @endif
                  </td>
                  <td>
                    @if($transaction->transaction_id && $transaction->transfer_status == 0)
                      # {{ $transaction->transaction_id }} 
                    @elseif($transaction->transfer_status == 2) 
                      BOOKING ID #{{ $transaction->book_ser->id }} 
                    @elseif($transaction->transfer_status == 1)
                      TRANSFER ID #{{ $transaction->id }} 
                    @else
                      BOOKING ID #{{ $transaction->book_ser->id }} 
                    @endif
                  </td>
                  <td>{{ $transaction->credit_amount }}</td>
                  <td> 
                    @if($transaction->transfer)
                      @if($transaction->transfer->status == 0) 
                        <span class="approval">{{ $transaction->debit_amount }}</span> 
                      @else 
                      {{ $transaction->debit_amount }} 
                      @endif
                    @else
                      {{ $transaction->debit_amount }} 
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
              {{ $transactions->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-top: 8%;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title hist-title" id="exampleModalLabel"><span class="hist-ic"><i class="fa fa-file-text-o"></i></span> Account Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body hist-body">
     <table class="table table-borderless">
      <tr>
        <td class="hist-td">Transfer ID</td>
        <td class="hist-td transferid__"></td>
      </tr>
      <tr>
        <td class="hist-td">Account holder name</td>
        <td class="hist-td acname__"></td>
      </tr>
      <tr>
        <td class="hist-td">Account Number</td>
        <td class="hist-td acno__"></td>
      </tr>
      <tr>
        <td class="hist-td">Branch Name</td>
        <td class="hist-td branch__"></td>
      </tr>
       <tr>
        <td class="hist-td">Bank Name</td>
        <td class="hist-td bank__"></td>
      </tr>
       <tr>
        <td class="hist-td">IFSC Code</td>
        <td class="hist-td ifsc__"></td>
      </tr>
       <tr>
        <td class="hist-td">Amount</td>
        <td class="hist-td amount__"></td>
      </tr>
      <tr>
        <td class="hist-td-last">Message</td>
        <td class="hist-td-last transactionid__"></td>
      </tr>
    </table>
      </div>
    </div>
  </div>
</div>
@endsection