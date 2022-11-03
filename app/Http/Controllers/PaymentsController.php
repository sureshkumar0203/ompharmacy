<?php

namespace App\Http\Controllers;
use App\UserRegistration;
use Session;
use App\Services;
use App\TransactionHistory;
use App\Bookservice;
use App\RatingReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentsController extends Controller
{
    public function addMoney(){
        $userDet = UserRegistration::where('id', Session::get('userId'))->first();
    	return view('add-money',compact('userDet'));
    }
    
    public function payNow(Request $request){
        $amount = $request->input('amount');
        $userDet = \App\UserRegistration::where('id', Session::get('userId'))->select('first_name','last_name','phone','email','address','pincode')->first();
        $post_data = Array ('tid' => mt_rand(), 'merchant_id' => '204814', 'order_id' => mt_rand(), 'amount' => $amount, 'currency' => 'INR', 'redirect_url' => 'https://www.bletechnolabs.com/projects/ompharmacy/api/ccavResponseHandler', 'cancel_url' =>' https://www.bletechnolabs.com/projects/ompharmacy/api/ccavResponseHandler', 'language' => 'EN', 'billing_name' => $userDet->first_name.' '.$userDet->last_name, 'billing_address' => $userDet->address, 'billing_city' => 'Bhubaneswar', 'billing_state' => 'Odisha', 'billing_zip' => $userDet->pincode, 'billing_country' => 'India', 'billing_tel' => $userDet->phone, 'billing_email' => $userDet->email, 'delivery_name' => $userDet->first_name.' '.$userDet->last_name, 'delivery_address' => $userDet->address, 'delivery_city' => 'Bhubaneswar', 'delivery_state' => 'Odisha', 'delivery_zip' => $userDet->pincode, 'delivery_country' => 'India', 'delivery_tel' => $userDet->phone, 'merchant_param1' => Session::get('userId'), 'merchant_param2' => 'additional Info.', 'merchant_param3' => 'additional Info.', 'merchant_param4' => 'additional Info.', 'merchant_param5' => 'additional Info.','promo_code' => '', 'customer_identifier' =>'', 'integration_type' => 'iframe_normal');
        $working_key='5B42BCF5BB129BAA45B3FE69E0F4D9DA';//Shared by CCAVENUES
    	$access_code='AVMU02GD64AW63UMWA';//Shared by CCAVENUES
    	$merchant_data='';
    	foreach ($post_data as $key => $value){
    		$merchant_data .=$key.'='.$value.'&';
    	}
    	$encrypted_data=ccencrypt($merchant_data,$working_key); // Method for encrypting the data.
    	//$production_url='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
    	$production_url='https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
        return view('pay-now', compact('post_data','production_url'));
    }
    
    public function paymentResponse(Request $request){
    $workingKey='5B42BCF5BB129BAA45B3FE69E0F4D9DA';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=ccdecrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	
// 	echo "<table cellspacing=4 cellpadding=4>";
// 	for($i = 0; $i < $dataSize; $i++) 
// 	{
// 		$information=explode('=',$decryptValues[$i]);
// 	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
// 	}

// 	echo "</table><br>";
// 	echo "</center>";
// 	exit;
	
	
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
		if($i==0)	$order_id=$information[1];
		if($i==1)	$tracking_id=$information[1];
		if($i==2)	$bank_ref_no=$information[1];
		if($i==10)	$amount=$information[1];
		if($i==26)	$user_id=$information[1];
		
	}
	

	if($order_status==="Success")
	{
	    $data = [];
	    $data['user_id'] = $user_id;
        $data['credit_amount'] = $amount;
        $data['transaction_id'] = $bank_ref_no;
        //dd($data);
        TransactionHistory::create($data);
		//return redirect('add-money')->with('success', 'Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.');
		//return Redirect::to('contact-us')->with('success', true);
		return Redirect::to('add-money')->with('success', 'Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.');
		
	}
	else if($order_status==="Aborted")
	{
	    Session()->flash('error', 'Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail');
		return redirect('add-money');
	
	}
	else if($order_status==="Failure")
	{
	    Session()->flash('error', 'Thank you for shopping with us.However,the transaction has been declined.');
		return redirect('add-money');
	}
	else
	{
	    Session()->flash('error', 'Security Error. Illegal access detected');
		return redirect('add-money');
	
	}

}

    public function paymenthistory(){
        $transactions = TransactionHistory::with('book_ser.service_det.cms_page','transfer')->where('user_id', Session::get('userId'))->orderBy('id', 'DESC')->paginate(15);
        //dd($transactions);
    	return view('payment-history', compact('transactions'));
    }

    public function bookingHistory(){
        $bookings = Bookservice::with('service_det.cms_page','ass_det','feedback')->where('user_id', Session::get('userId'))->orderBy('id', 'DESC')->paginate(10);
        //dd($bookings);
    	return view('booking-history', compact('bookings'));
    }

    public function requestCancellation(Request $request){
        $user_id = Session::get('userId');
        
        $numbers = explode('.', $request->id);
        $id = end($numbers);
        $booking = Bookservice::where('id', $id)->select('id', 'price')->first();
        //echo $booking->price; exit;
        // $service = Bookservice::with(['service_det' => function($query){
        //                 $query->select('id','sale_price');
        //                 }])->where('id', $id)->first();
        $data = [];
        $data['acpt_status'] = 2;
        $data['cancel_note'] = $request->note;
        Bookservice::find($id)->update($data);
        $balance = [];
        $balance['user_id'] = $user_id;
        $balance['booking_id'] = $id;
        $balance['transfer_status'] = 2;
        $balance['credit_amount'] = $booking->price;
        $creditMoney = TransactionHistory::create($balance);

        $adminPhone =  getAdminDetails()->phone_no;

        #Send SMS to Customer
        $sendSms = sendSms(customerMobile($user_id),'Your BOOKING ID : #'.$id.' has been canceled Successfully. Your Note : "'.$request->note.'"');

        $aSms = sendSms($adminPhone, 'BOOKING ID : #'.$id.' has been canceld by the user, Mobile Number : '.customerMobile($user_id));

        if($creditMoney){
            return redirect('booking-history');
        }
    }

    public function checkBalance(Request $request){
        // $creditAmount = walletCredit(Session::get('userId'));
        // $debitAmount = walletDebit(Session::get('userId'));
        $totalAmount = walletAmount(Session::get('userId'));
    	$services = Services::where('id', $request->input('id'))->select('id', 'sale_price')->first();
		//dd($totalAmount);
    	if($totalAmount >= $services->sale_price){
    		return response()->json(['response' => "success"]);
    	}else{
			$due_amount = $services->sale_price - $totalAmount;
    		return response()->json(['response' => "error", 'msg' => 'Sorry you have insuffisant balance. Please add Rs '.$due_amount.' in wallet to get this service.Please <a href="'.url("/add-money").'">click</a> here to add money.']);
    	}
    }
	
    public function getMoreContent(Request $request){
        $services = Services::where('id', $request->input('id'))->select('id', 'shot_description')->first();
        if($services != null){
            return response()->json(['response' => "success", 'getcontent' => $services->shot_description]);
        }else{
            return response()->json(['response' => "error", 'msg' => 'Something went wrong!']);
        }
    }

    public function userFeedback(Request $request) {
        $type = 'US';
        $postAll = $request->all();
        $postAll['booking_id'] = $request->booking_id;
        $postAll['rated_by'] = Session::get('userId');
        $postAll['type'] = $type;
        $postAll['rating'] = $request->rating;
        $postAll['feedback'] = $request->feedback;
        $save = RatingReview::create($postAll);
        
        sendSms(getAdminDetails()->phone_no, 'Feedback & rating from BOOKING ID : #'.$request->booking_id);
        
        return redirect('booking-history');
    }

}
