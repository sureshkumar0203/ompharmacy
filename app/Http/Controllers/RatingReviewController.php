<?php

namespace App\Http\Controllers;
use App\User;
use App\UserRegistration;
use App\RatingReview;
use Session;
use App\Bookservice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RatingReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminFeedback(Request $request){
    	if(auth()->user()->id == 1){
    		$type = 'AD';
    	}else{
    		$type = 'SU';
    	}

    	$postAll = $request->all();
    	$postAll['booking_id'] = $request->booking_id;
    	$postAll['rated_by'] = auth()->user()->id;
    	$postAll['type'] = $type;
    	$postAll['rating'] = $request->rating;
    	$postAll['feedback'] = $request->feedback;

    	$save = RatingReview::create($postAll);

    	$bookAll = [];
    	$bookAll['acpt_status'] = 3;
    	Bookservice::find($request->booking_id)->update($bookAll);

        $user = Bookservice::where('id', $request->booking_id)->select('id', 'user_id')->first();

        sendSms(customerMobile($user->user_id), 'Your BOOKING ID : #'.$request->booking_id.' has been complated. Check your account to give your feedback.');

    	return redirect('administrator/admin-booking');
    }

    

}
