@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('content')
<div class="container mtb200" id="myaccount">
	<div class="row">
		@include('includes.usermenu')
		<div class="col-md-9">
			<div class="myaccount-box">
				<div class="container mb40 form-wrapper">
					<div class="row"><h5>Add Money</h5></div>
					<div class="container">
					    <iframe src="<?php echo $production_url?>" id="paymentFrame" width="100%" height="470" frameborder="0" scrolling="No" ></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('script')
<script type="text/javascript" src="{{ asset('public/js/jquery-1.7.2.js') }}"></script>
<script type="text/javascript">
    	$(document).ready(function(){
    		 window.addEventListener('message', function(e) {
		    	 $("#paymentFrame").css("height",e.data['newHeight']+'px'); 	 
		 	 }, false);
	 	 	
		});
</script>
@endpush