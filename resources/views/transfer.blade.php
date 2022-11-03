@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('content') 
<!-- Start Banner Carousel -->
<div class="container mtb200" id="myaccount">
  <div class="row"> @include('includes.usermenu')
    <div class="col-md-9">
      <div class="myaccount-box">
        <div class="text-center" style="margin-top:30px; margin-bottom:30px;"><img src="{{ asset('public/images/transfer.png') }}"  alt=""></div>
        {{ Form::open(['url' => '', 'role' => 'form', 'id'=>'transfer', 'autocomplete' => 'off', 'style'=>'padding-left:20px; padding-bottom: 30px; padding-right:20px;']) }}
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Account holder name:</label>
                {!! Form::text('account_holder_name', old('name'), ['required', 'id'=>'name', 'class'=>'form-control', 'placeholder'=>'Account holder name']) !!}
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Account Number:</label>
                {!! Form::text('account_number', old('account_number'), ['onkeypress' => 'return numeric(event)', 'required', 'class'=>'form-control', 'id'=>'account_number', 'maxlength'=>'15', 'placeholder'=>'Account Number']) !!}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Branch Name:</label>
                {!! Form::text('branch_name', old('branch_name'), ['required', 'class'=>'form-control', 'id'=>'branch_name', 'placeholder'=>'Branch Name']) !!}
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Bank Name:</label>
                {!! Form::text('bank_name', old('bank_name'), ['required', 'class'=>'form-control', 'id'=>'bank_name', 'placeholder'=>'Bank Name']) !!}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>IFSC Code:</label>
                {!! Form::text('ifsc_code', old('ifsc_code'), ['required', 'class'=>'form-control', 'id'=>'ifsc_code',  'placeholder'=>'IFSC Code']) !!}
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Amount:</label>
                {!! Form::text('amount', old('amount'), ['onkeypress' => 'return numeric(event)', 'required', 'id'=>'amount', 'maxlength'=>'7', 'class'=>'form-control amount', 'placeholder'=>'Amount']) !!}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <p class="note"><strong>Note:</strong> Check <a href="{{ url('/payment-history') }}">payment history</a> to know your payment status.</p>
            </div>
            <div class="col-sm-4 text-right">
              {{ Form::submit('SUBMIT', array('type' => 'submit', 'class' => 'btn blue myac-btn')) }}
            </div>
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@endsection
@push('script') 
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> 
<script>
$('.amount').change(function(){
  var amount = $(this).val();
  var tot_amount = <?php echo walletAmount(Session::get('userId')) ?>;
  if(amount > tot_amount){
    alert('Transfer amount can\'t be greater then wallet amount');
    return false;
  }else if(amount <= 0){
    alert('Please enter a valid amount');
    return false;
  }else{
    return true;
  }
})

$('#transfer').submit(function(){
   var amount = $(this).val();
    var tot_amount = <?php echo walletAmount(Session::get('userId')) ?>;
    if(amount > tot_amount){
      alert('Transfer amount can\'t be greater then wallet amount');
      return false;
    }else if(amount <= 0){
      console.log("here"); return false;
      alert('Please enter a valid amount');
      return false;
    }else{
      return true;
    }
});
</script>
@endpush