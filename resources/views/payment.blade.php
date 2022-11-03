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
					    
                        <?php 
                        
                        // 	error_reporting(0);
                        
                        // 	$working_key='78D002A364F2D49B379810B42EE8BE43';//Shared by CCAVENUES
                        // 	$access_code='AVMU02GD64AW62UMWA';//Shared by CCAVENUES
                        // 	$merchant_data='';
                        	
                            //echo "<pre>";print_r($_POST); exit;
                        		
                        		
                        // 	foreach ($postAll as $key => $value){
                        // 		$merchant_data .=$key.'='.$value.'&';
                        // 	}
                        	//print_r($merchant_data);exit;
                        	
                        //	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
                        
                        	//$production_url='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
                        	//$production_url='https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
                        ?>
                       
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