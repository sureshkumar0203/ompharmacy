<?php
namespace App\Http\Controllers;
use App\Http\Middleware\ApiAuthentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\PrescriptionUpload;
use App\UserRegistration;
use App\User;
use App\CmsPage;
use Session;
use Hash;
use Config;
use Image;
use App\measurement_type;
use App\measurement;
use App\PillManagement;
use App\HealthActivity;
use App\Banktransfer;
use App\TransactionHistory;
use App\Bookservice;
use App\RatingReview;
use App\deviceToken;
use App\Services;

class ApiController extends Controller
{
   /* public function __construct()
    {
        $this->middleware(ApiAuthentication::class);
    }*/
	
//Home User Photo
//http://192.168.0.170/ompharmacy/api/home_user_photo?data={"user_id":"1",  "device_token":"f5P12OZHTss:APA91bGjZL_bkQbCqIWGRQUru7vXuEriMYSoGwzcgcZ1KJ-hn1M9hxgV-MTGZdtNH_Fw1ctWyj9TrKjYTQp_DjhfzeG4BXXEn8MJ9oB6X0sbFfbfe5rpsJcqKmAEf1YQM9cgc5-fJoMS"}
public function homeUserPhoto(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post = json_decode($posted['data'],true);
    //$chk_sec = checkSecurity($post['device_token'],$post['user_id'],2);
    $chk_sec = true;
    if($chk_sec == false) {
        $res_ = array('error'=>'true','message'=>'Sorry, You are not a authonicate user.');
        echo json_encode($res_);
    } else {
        if(!empty($post['user_id'])){
            $count = UserRegistration::where('id',$post['user_id'])->get();
            if(count($count) == 1){
                $data = UserRegistration::where('id', $post['user_id'])->select('id','profile_img')->first();
                if($data->profile_img != '' && $data->profile_img != null){
                    $data['profile_img'] = asset('public/profiles/'.$data->profile_img);
                }else{
                    $data['profile_img'] = "";
                }
                $res_ = array('error'=>'false','data'=> $data); 
            }else{
                $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
            }
        }else{
            $res_ = array('error'=>'true','message'=>'Please enter required field.');
        }
        echo json_encode($res_);
    }
}

//User SignupOTP
//http://192.168.0.170/ompharmacy/api/user_sign_up_otp?data={"phone":"7205821247"}
public function userSignupOtp(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post = json_decode($posted['data'],true);
    if(!empty($post['phone'])){
        $countMobileNo = UserRegistration::where('phone',$post['phone'])->get();
        if(count($countMobileNo) > 0 ){
            $res_ = array('error'=>'true','message'=>'Mobile number is already exist.','status'=>1);
        }else{
            $otp = mt_rand(1000, 9999);
            $sms = sendSms($post['phone'], 'HAH OTP '.$otp);
            $res_ = array('error'=>'false', 'OTP'=>$otp, 'message'=>'Verification code sent to '.$post['phone']);
        }
    }else{
        $res_ = array('error'=>'true','message'=>'Please enter required field.');
    }
    echo json_encode($res_);
}

//User Signup
//http://192.168.0.170/ompharmacy/api/userSignup?data={"phone":"7205821247", "first_name":"Trideep", "last_name":"Dakua", "email":"trideep@bletindia.com", "psw":"123"}
public function userSignup(Request $request){
    $res_ = array();
    $post = $request->all();
    if(!empty($post['phone']) && !empty($post['first_name']) && !empty($post['last_name']) && !empty($post['email']) && !empty($post['psw'])){
        $info = UserRegistration::where('email',$post['email'])->count();
        $countPhone = UserRegistration::where('phone',$post['phone'])->count();
        if($info > 0 ){
            $res_ = array('error'=>'true','message'=>'The email address is already exist.');
        } else if($countPhone > 0){
            $res_ = array('error'=>'true','message'=>'The phone number is already exist.');
        } else {
            $post['password'] = bcrypt($request->input('password'));
            $lastId = UserRegistration::create($post);
            if($lastId->id > 0){
                $res_ = array('error'=>'false','message'=>'Sign up successful.','userInfo'=>$post,'userId'=>$lastId->id);
            } else {
                $res_ = array('error'=>'true','message'=>'Sign up failed.');
            }
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}


//User Login
//http://192.168.0.170/ompharmacy/api/user_login?data={"email_mobile":"trideep@bletindia.com","password":"123","device_token":"f5P12OZHTss:APA91bGjZL_bkQbCqIWGRQUru7vXuEriMYSoGwzcgcZ1KJ-hn1M9hxgV-MTGZdtNH_Fw1ctWyj9TrKjYTQp_DjhfzeG4BXXEn8MJ9oB6X0sbFfbfe5rpsJcqKmAEf1YQM9cgc5-fJoMS","user_type":"2"}
//User type = 1 - (Associate), 2 - (User)
public function userLogin(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['email_mobile']) && !empty($post['password']) && !empty($post['device_token']) && !empty($post['user_type'])){
        $info = UserRegistration::where('email', $post['email_mobile'])->orWhere('phone', $post['email_mobile'])->count();
        if($info == 1){
            $data = UserRegistration::where('email', $post['email_mobile'])->orWhere('phone', $post['email_mobile'])->first();
            if($data->status == 1){
                if (Hash::check($post['password'], $data->password)) {
                    $tokenPost = [];
                    $tokenPost['ass_user_id'] = $data->id;
                    $tokenPost['user_type'] = $post['user_type'];
                    $tokenPost['device_token'] = $post['device_token'];
                    deviceToken::create($tokenPost);

                    if($data->profile_img != '' && $data->profile_img != null){
                        $data['profile_img'] = asset('public/profiles/'.$data->profile_img);
                    }else{
                        $data['profile_img'] = "";
                    }
                    
                    //dd($data);
                    $res_ = array('error'=>'false','message'=>'Login Success','userInfo'=>$data);
                } else {
                    $res_ = array('error'=>'true','message'=>'The password you provided is wrong.');
                }
            } else {
                $res_ = array('error'=>'true','message'=>'This account is not activated.');  
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The email id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//User Logout
//http://192.168.0.170/ompharmacy/api/user_logout?data={"user_id":"1","device_token":"f5P12OZHTss:APA91bGjZL_bkQbCqIWGRQUru7vXuEriMYSoGwzcgcZ1KJ-hn1M9hxgV-MTGZdtNH_Fw1ctWyj9TrKjYTQp_DjhfzeG4BXXEn8MJ9oB6X0sbFfbfe5rpsJcqKmAEf1YQM9cgc5-fJoMS"}
public function userLogout(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id']) && !empty($post['device_token'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info == 1){
            $data = deviceToken::where([['ass_user_id', '=', $post['user_id']], ['user_type', '=', 2], ['device_token', '=', $post['device_token']]])->delete();
            if($data){
                $res_ = array('error'=>'false','message'=>"User logout successfully.");
            }else{
                $res_ = array('error'=>'true','message'=>"User not logout successfully.");
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The email id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}

//User forgot password otp
//http://192.168.0.170/ompharmacy/api/user_forgot_password_otp?data={"mobile":"7205821247"}
public function userForgotPasswordOtp(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post = json_decode($posted['data'], true);
    if(!empty($post['mobile'])){
        $info = UserRegistration::where('phone', $post['mobile'])->count();
        if($info == 1){
            $data = UserRegistration::where('phone', $post['mobile'])->first();
            if($data->status == 1){
                $otp = mt_rand(1000, 9999);
                $sms = sendSms($post['mobile'], 'HAH OTP '.$otp);
                $res_ = array('error'=>'false','message'=>'Verification code sent to '.$post['mobile'], 'OTP'=>$otp);
            }else{
                $res_ = array('error'=>'true','message'=>'This account is not activated.');
            }
        } else{
            $res_ = array('error'=>'true','message'=>"The mobile number doesn't exist in the system.");
        }
    }else{
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//User forgot password
//http://192.168.0.170/ompharmacy/api/user_forgot_password?data={"mobile":"7205821247", "password":"123"}
public function userForgotPassword(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['mobile']) && !empty($post['password'])){
        $info = UserRegistration::where('phone', $post['mobile'])->count();
        if($info == 1){
            $data = UserRegistration::where('phone', $post['mobile'])->first();
            if($data->status == 1){
                $psw = bcrypt($post['password']);
                $update_pass = UserRegistration::where('phone', $post['mobile'])->update(['password' => $psw]);
                $res_ = array('error'=>'false','message'=>'Your password changed successfully');
            } else {
                $res_ = array('error'=>'true','message'=>'This account is not activated.');  
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The mobile number doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//User Wallet Balance
//http://192.168.0.170/ompharmacy/api/user_wallet_balance?data={"user_id":"1"}
public function userWalletBalance(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info > 0) {
           $userWalletAmount = walletAmount($post['user_id']);
           $res_ = array('error'=>'false','user_wallet_balance'=>$userWalletAmount);
        } else {
            $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//Services listing
//http://192.168.0.170/ompharmacy/api/service_category_list
//time24_status = 0 means no time restriction
//time24_status = 1 means restriction time
//Category Id = 1 means Redirect to prescrition upload
//Category Id = 2 means Redirect to prescrition upload as well as display service list
public function getServiceCategoryList(Request $request){
    $res_ = CmsPage::where('parent_id', 0)->where('status', 1)->orderBy('id', 'ASC')->select('id', 'title', 'image', 'time24_status','from_time','to_time')->get();
    $resdata = [];
    if (count($res_) > 0) {
        foreach ($res_ as $key => $val) {
            $resdata[] = $val;
            if($val->image != '' && $val->image != null){
                $resdata[$key]['image'] = asset('public/images/services/' . $val->image);
            }else{
				 $resdata[$key]['image'] = asset('public/images/services/no-image.jpg');
			}
			$resdata[$key]['from_time'] = ($val->from_time)?$val->from_time:'';
			$resdata[$key]['to_time'] = ($val->to_time)?$val->to_time:'';
        }
        $res_ = array('error'=>'false','serviceCategoryList'=>$resdata);
    }else{
        $res_ = array('error'=>'true','message'=>'Data not found.');
    }
    echo json_encode($res_);
}


//Services details
//http://192.168.0.170/ompharmacy/api/service_list?data={"service_cat_id":"27","user_id":"1"}
public function serviceList(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);

    if(!empty($post['service_cat_id']) && !empty($post['user_id'])){
        $info = CmsPage::where('id', $post['service_cat_id'])->count();
        if($info == 1){
            $data = CmsPage::with('service')->where([['id', '=', $post['service_cat_id']],['status', '=', 1]])->select('id','title','image','banner_img','adv_img','btn_name','service_request','from_time','to_time','time24_status')->first();
            $userDet = UserRegistration::where('id',$post['user_id'])->select('id','phone','address','lat','lng')->first();
            if($userDet->lat !='' && $userDet->lat != null){
                $user_lat = $userDet->lat;
            }else{
                $user_lat = Config::get('constants.defult_lat');
            }

            if($userDet->lng !='' && $userDet->lng != null){
                $user_lng = $userDet->lng;
            }else{
                $user_lng = Config::get('constants.defult_lng');
            }

            $userWalletAmount = walletAmount($post['user_id']);

            $data['user_wallet_balance'] = $userWalletAmount;
            $data['phone'] = $userDet->phone;
            $data['address'] = $userDet->address;
            $data['lat'] = $user_lat;
            $data['lng'] = $user_lng;
            if($data['image'] != '' && $data['image'] != null) $data['image'] = asset('public/images/services/'.$data['image']);
            if($data['banner_img'] != '' && $data['banner_img'] != null) $data['banner_img'] = asset('public/images/services/banner/'.$data['banner_img']);
            if($data['adv_img'] != '' && $data['adv_img'] != null) $data['adv_img'] = asset('public/images/services/advertisement/'.$data['adv_img']);
            $res_ = array('error'=>'false','serviceList'=>$data);
        } else {
            $res_ = array('error'=>'true','message'=>"Data not found.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}


//Book Service
//http://192.168.0.170/ompharmacy/api/book_service
//{"user_id":"1", "service_address":"RMRC Campus,kalinga hospital square, samanta vihar,bhubaneswar" "userlat":"20.2913503", "userlng":"85.8716515", "services_id":"18", "booking_date":"2019-06-12", "booking_time":"12:15:00"}
public function bookService(Request $request){
    $res_ = array();
    $post = $request->all();
    if(!empty($post['user_id']) && !empty($post['service_address']) && !empty($post['userlat']) && !empty($post['userlng']) && !empty($post['services_id']) && !empty($post['booking_date']) && !empty($post['booking_time'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info > 0) {
            $adminPhone =  getAdminDetails()->phone_no;
            $around_km = Config::get('constants.around_km');
            $random_asso = Config::get('constants.random_asso');

            $serviceBookingDate = date('d-m-Y' ,strtotime($post['booking_date']));
            $serviceBookingTime = date("g:i a", strtotime($post['booking_time']));

            $service = Services::with(array('cms_page'=>function($query){ $query->select('id', 'title', 'service_request'); }))->where('id', $post['services_id'])->first();
            $associate = User::where([['id', '!=', 1], ['type', '=', null], ['active', '=', 1]])->select('id', 'lat', 'lng')->inRandomOrder()->take($random_asso)->get();
            
            if($service->cms_page->service_request != 1 && count($associate) > 0){
                $asso_id_ary = array();
                foreach ($associate as $key => $value) {
                    $km = distanceCalculation($value->lat, $value->lng, $post['userlat'], $post['userlng']);
                    if($km <= $around_km){
                        array_push($asso_id_ary, $value->id);
                        //$asso_id_ary[] = $value->id;
                    }
                }

                $associate_ids = implode(',', $asso_id_ary);
                $data = $request->all();
				
				$data['services_id'] = $post['services_id'];
                $data['user_id'] = $post['user_id'];
                $data['associate_ids'] = $associate_ids;
                $data['price'] = $service->sale_price;
                $data['booking_date'] = $post['booking_date'];
                $data['booking_time']  = $post['booking_time'];
                $data['service_address']  = $post['service_address'];
                $data['lat']  = $post['userlat'];
                $data['lng']  = $post['userlng'];
                //dd($data);
                $booking = Bookservice::create($data);
				
				
                $balance = [];
                $balance['user_id'] = $post['user_id'];
                $balance['booking_id'] = $booking->id;
                $balance['debit_amount'] = $service->sale_price;
                $debitMoney = TransactionHistory::create($balance);

                //Push Notification for associate
                $lastId = $booking->id;
                $bookingFetch = Bookservice::where('id', $lastId)->first();
                $insAssIds = $bookingFetch->associate_ids;
                $arr_ph = explode(',', $insAssIds);

                $authorization = Config::get('constants.authorization');
                $message = "A new booking is placed. Check your application to get the booking details";
                foreach($arr_ph as $val){
                    $deviceToken = deviceToken::where([['user_type', '=', 1], ['ass_user_id', '=', $val]])->first();
                    if($deviceToken != null){
                        pushNotification($deviceToken->device_token, $message, $authorization);
                    }
                }
                //SMS for Customer
                $sms = sendSms(customerMobile($post['user_id']), 'Your Booking has been Completed successfully, BOOKING ID : #'.$booking->id.', SERVICE NAME : '.$service->cms_page->title.', TEST NAME : '.$service->name.', TEST ID : #'.$service->test_id.', SERVICE PRICE : ₹ '.$service->sale_price.', SERVICE BOOKING DATE : '.$serviceBookingDate.' AT '.$serviceBookingTime);
                //SMS for Admin
                $aSms = sendSms($adminPhone, 'Dear Admin now as a new booking, BOOKING ID : #'.$booking->id.', SERVICE NAME : '.$service->cms_page->title.', TEST NAME : '.$service->name.', TEST ID : #'.$service->test_id.', SERVICE PRICE : ₹ '.$service->sale_price.', SERVICE BOOKING DATE : '.$serviceBookingDate.' AT '.$serviceBookingTime);
                $res_ = array('error'=>'false','message'=>"Your Booking has been complated successfully.");
            }else{
                //Admin Booking section
				$data['services_id'] = $post['services_id'];
                $data['user_id'] = $post['user_id'];
                $data['associate_ids'] = 1;
                $data['disp_only_adm'] = 1;
                $data['price'] = $service->sale_price;
                $data['booking_date'] = $post['booking_date'];
                $data['booking_time']  = $post['booking_time'];
                $data['service_address']  = $post['service_address'];
                $data['lat']  = $post['userlat'];
                $data['lng']  = $post['userlng'];
                //dd($data);
                $booking = Bookservice::create($data);

                $balance = [];
                $balance['user_id'] = $post['user_id'];
                $balance['booking_id'] = $booking->id;
                $balance['debit_amount'] = $service->sale_price;
                $debitMoney = TransactionHistory::create($balance);
                
                //SMS for Customer
                $sms = sendSms(customerMobile($post['user_id']), 'Your Booking has been Completed successfully, BOOKING ID : #'.$booking->id.', SERVICE NAME : '.$service->cms_page->title.', TEST NAME : '.$service->name.', TEST ID : #'.$service->test_id.', SERVICE PRICE : ₹ '.$service->sale_price.', SERVICE BOOKING DATE : '.$serviceBookingDate.' AT '.$serviceBookingTime);
                
                 //SMS for Admin
                $aSms = sendSms($adminPhone, 'Dear Admin now as a new booking, BOOKING ID : #'.$booking->id.', SERVICE NAME : '.$service->cms_page->title.', TEST NAME : '.$service->name.', TEST ID : #'.$service->test_id.', SERVICE PRICE : ₹ '.$service->sale_price.', SERVICE BOOKING DATE : '.$serviceBookingDate.' AT '.$serviceBookingTime);
                //echo $aSms; exit;
               $res_ = array('error'=>'false','message'=>"Your Booking has been complated successfully.");
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}


//Booking Cancellation
//http://192.168.0.170/ompharmacy/api/booking_cancellation?data={"user_id":"1","booking_id":"4","note":"Sorry for the mistake booking."}
public function bookingCancellation(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id']) && !empty($post['booking_id']) && !empty($post['note'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info > 0){
            $data = Bookservice::where('id', $post['booking_id'])->count();
            if($data > 0){
                $resData = Bookservice::where('id', $post['booking_id'])->first();

                $data = [];
                $data['acpt_status'] = 2;
                $data['cancel_note'] = $post['note'];
                Bookservice::find($post['booking_id'])->update($data);
                $balance = [];
                $balance['user_id'] = $post['user_id'];
                $balance['booking_id'] = $post['booking_id'];
                $balance['transfer_status'] = 2;
                $balance['credit_amount'] = $resData->price;
                TransactionHistory::create($balance);
                $adminPhone =  getAdminDetails()->phone_no;
                #Send SMS to Customer
                sendSms(customerMobile($post['user_id']),'Your BOOKING ID : #'.$post['booking_id'].' has been canceled Successfully. Your Note : "'.$post['note'].'"');
                sendSms($adminPhone, 'BOOKING ID : #'.$post['booking_id'].' has been canceld by the user, Mobile Number : '.customerMobile($post['user_id']));

                $res_ = array('error'=>'false','message'=>"Your booking canceled successfully.");
            }else{
                $res_ = array('error'=>'true','message'=>"Booking id doesn't exist in the system.");
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}



//Booking History
//http://192.168.0.170/ompharmacy/api/booking_history?data={"user_id":"1"}
//Status = 0 -  Panding, 1 - Approved,  2 - Canceled, 3 - Completed
public function bookingHistory(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info > 0){
            $data = Bookservice::with('service_det.cms_page','ass_det','feedback')->where('user_id', $post['user_id'])->orderBy('id', 'DESC')->get();
            $resdata = [];
            if (count($data) > 0) {
                foreach ($data as $key => $val) {
                    if($val->req_acpt_id != null){
                        if($val->ass_det->image !='' && $val->ass_det->image !=NULL) { 
                            $ass_img = asset('public/admin/images/' . $val->ass_det->image);
                        }else{
                            $ass_img = asset('public/admin/images/avtar.png');
                        }
                        $ass_name = $val->ass_det->name;
                        $ass_phone = $val->ass_det->phone_no;
                        if(!$val->feedback->isEmpty()){
                            $ass_rating = $val->feedback[0]->rating;
                            $ass_feedback = $val->feedback[0]->feedback;
                        }else{
                            $ass_rating = "";
                            $ass_feedback = "";
                        }
                        if($val->acpt_status == 3){
                            if(count($val->feedback) > 1){
                                $user_rating = $val->feedback[1]->rating;
                                $user_feedback = $val->feedback[1]->feedback;
                            }else{
                                $user_rating = "";
                                $user_feedback = "";
                            }
                        }else{
                            $user_rating = "";
                            $user_feedback = "";
                        }
                    }else{
                        $ass_img = "";
                        $ass_name = "";
                        $ass_phone = "";
                        $ass_rating = "";
                        $ass_feedback = "";
                        $user_rating = "";
                        $user_feedback = "";
                    }

                    if($val->acpt_status == 2){
                        $cancel_note = $val->cancel_note;
                    }else{
                        $cancel_note = "";
                    }

                    if($val->req_acpt_id != null || $val->req_acpt_id != ""){
                        $req_acpt_id = $val->req_acpt_id;
                    }else{
                        $req_acpt_id = "";
                    }   

                    $resdata[$key]['id'] = $val->id;
                    $resdata[$key]['booking_id'] = "BOOKING ID # ". $val->id;
                    $resdata[$key]['service_name'] = $val->service_det->cms_page->title;
                    $resdata[$key]['test_name'] = $val->service_det->name . " (# ".$val->service_det->test_id.")";
                    $resdata[$key]['test_description'] = $val->service_det->shot_description;
                    $resdata[$key]['booking_date'] = date('l, d M Y' ,strtotime($val->created_at));
                    $resdata[$key]['service_date'] = date('l, d M Y' ,strtotime($val->booking_date));
                    $resdata[$key]['service_time'] = date("g:i A", strtotime($val->booking_time));
                    $resdata[$key]['price'] = $val->price;
                    $resdata[$key]['status'] = $val->acpt_status;
                    $resdata[$key]['req_acpt_id'] = $req_acpt_id;
                    $resdata[$key]['ass_img'] = $ass_img;
                    $resdata[$key]['ass_name'] = $ass_name;
                    $resdata[$key]['ass_phone'] = $ass_phone;
                    $resdata[$key]['ass_rating'] = $ass_rating;
                    $resdata[$key]['ass_feedback'] = $ass_feedback;
                    $resdata[$key]['cancel_note'] = $cancel_note;
                    $resdata[$key]['user_rating'] = $user_rating;
                    $resdata[$key]['user_feedback'] = $user_feedback;
                }
                $res_ = array('error'=>'false','data'=>$resdata);
            }else{
                $res_ = array('error'=>'true','message'=>'No Bookings found!');
            }
        }else{
            $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}


//Prescription Upload
//http://192.168.0.170/ompharmacy/api/prescription_upload?data={"user_id":"1","prescription":"123.jpg","note":"This is test","address":"This is test address"}
public function prescriptionUpload(Request $request){
    $res_ = array();
    $post = $request->all();
    //dd($post);
    if(!empty($post['user_id']) && !empty($post['prescription']) && !empty($post['note']) && !empty($post['address'])){
        $prescription = Storage::putFile('prescription', $post['prescription']);
        $postAll = $request->all();
        $postAll['user_id'] = $post['user_id'];
        $postAll['image'] = $prescription;
        $check = PrescriptionUpload::create($postAll);
        $user = UserRegistration::where('id', $post['user_id'])->select('id', 'first_name', 'last_name', 'phone', 'email')->first();
        if($check){
            $data = array(
                'name' =>$user->first_name.' '.$user->last_name,
                'phone' => $user->phone,
                'email' => $user->email, 
                'prescription' => $post['prescription'],
                'note' =>$post['note'],
                'address' => $post['address']
            );
            $data['subject'] = 'New Prescription from '.$user->first_name .' '.$user->last_name;
            $data['blade'] = 'emails.prescription';
            Mail::send('emails.prescription',compact('data'), function($message) use ($data){
                    $admin = User::where('id','=','1')->select('id','email')->first();
                    $message->to($admin->email);
                    $message->subject($data['subject']);
                    $message->from($data['email']);
                    $message->attach($data['prescription']->getRealPath(), array(
                        'as' => 'prescription.' . $data['prescription']->getClientOriginalName(),
                        'mime' => $data['prescription']->getClientMimeType())
                    );
            });
            $res_ = array('error'=>'false','message'=>'prescription uploaded successfully.');
        } 
    }else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}

//Prescription Upload Details
//http://192.168.0.170/ompharmacy/api/prescription_upload_details?data={"user_id":"1"}
public function prescriptionUploadDetails(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id'])){
        $res_ = PrescriptionUpload::where('user_id', $post['user_id'])->orderBy('id', 'DESC')->select('id','user_id','image','note','address','status','admin_note','created_at')->get();
        $resdata = [];
        if (count($res_) > 0) {
            foreach ($res_ as $key => $val) {
                $resdata[] = $val;
                if($val->image != '' && $val->image != null){
                    $resdata[$key]['image'] = asset('storage/app/'.$val->image);
                    $resdata[$key]['date'] = date('d/m/Y' ,strtotime($val->created_at));
                }
				$resdata[$key]['admin_note'] = ($val->admin_note)?$val->admin_note:'';
				
            }
            $res_ = array('error'=>'false','data'=>$resdata);
        }else{
            $res_ = array('error'=>'true','message'=>'Data not found.');
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}

//Prescription Delete
//http://192.168.0.170/ompharmacy/api/prescription_delete?data={"user_id":"1","prescription_id":"1"}
public function prescriptionDelete(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id']) && !empty($post['prescription_id'])){
        $countUser = UserRegistration::where('id', $post['user_id'])->count();
        if($countUser > 0){
            $countPre = PrescriptionUpload::where([['id', '=', $post['prescription_id']], ['status', '=', 0]])->count();
            if($countPre > 0){
                $info = PrescriptionUpload::where('id', $post['prescription_id'])->first();
                if(!empty($info)){
                    \Storage::Delete($info->image);
                }
                PrescriptionUpload::destroy($post['prescription_id']);
                $res_ = array('error'=>'false','message'=>"Prescription deleted successfully.");
            }else{
                $res_ = array('error'=>'true','message'=>"Prescription not found.");
            }
        }else{
            $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}


//Health Records
//http://192.168.0.170/ompharmacy/api/health_records?data={"user_id":"1"}
public function healthRecords(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id'])){
        $info = measurement_type::orderBy('id', 'DESC')->get();

        $data = measurement::with(array('measurement_types' => function($query){
                        $query->select('id','types','type_unit');
                        }))->where('user_id', $post['user_id'])->orderBy('id', 'DESC')->select('id','user_id','measurements_type_id','measurements_value','updated_at')->get();

        $getData = [];
        foreach ($data as $key => $val) {
            $getData[$key]['id'] = $val->id;
            $getData[$key]['user_id'] = $val->user_id;
            $getData[$key]['measurements_type_id'] = $val->measurements_type_id;
            $getData[$key]['measurements_value'] = $val->measurements_value;
            $getData[$key]['measurement_date'] = date('d/m/Y' ,strtotime($val->updated_at));
            $getData[$key]['types'] = $val->measurement_types->types;
            $getData[$key]['type_unit'] = $val->measurement_types->type_unit;
        }   

        $res_ = array('error'=>'false','healthRecords'=>$getData, 'measurementTypes'=>$info);
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}

//Pill Management
//http://192.168.0.170/ompharmacy/api/pill_management?data={"user_id":"1"}
public function pillManagement(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id'])){
        $info = PillManagement::where('user_id', $post['user_id'])->orderBy('id', 'DESC')->get();

        $res_ = array('error'=>'false','pillManagement'=>$info);
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}

//Health Activity
//http://192.168.0.170/ompharmacy/api/health_activity?data={"user_id":"1"}
public function healthActivity(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id'])){
        $info = HealthActivity::where('user_id', $post['user_id'])->orderBy('id', 'DESC')->select('id','user_id','description','created_at')->get();
        $res_ = array('error'=>'false','healthActivity'=>$info);
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}


//Payment History
//http://192.168.0.170/ompharmacy/api/payment_history?data={"user_id":"1"}
public function paymentHistory(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info > 0){
            $data = TransactionHistory::with('book_ser.service_det.cms_page','transfer')->where('user_id', $post['user_id'])->orderBy('id', 'DESC')->get();
            $resdata = [];
            if (count($data) > 0) {
                foreach ($data as $key => $val) {

                    if($val->booking_id == null && $val->transfer_status == 0) { 
                        $narration = "Money added to wallet";
                        $message = "";
                    }elseif($val->transfer_status == 2) { 
                        $narration = "Cancel / ". $val->book_ser->service_det->cms_page->title ." / ". $val->book_ser->service_det->name; 
                        $message = "";
                    }elseif($val->transfer_status == 1) {
                        $narration = "Transfer";
                        $message = "";
                        if($val->transfer->status == 0) { 
                            $message = "(waiting for approval)"; 
                        }
                    }else{ 
                        $narration = "Booking /" . $val->book_ser->service_det->cms_page->title . "/". $val->book_ser->service_det->name; 
                        $message = "";
                    }

                    if($val->transaction_id && $val->transfer_status == 0){
                      $ref_no = "# " . $val->transaction_id;
                    }
                    elseif($val->transfer_status == 2){
                      $ref_no = "BOOKING ID #" . $val->book_ser->id;
                    }
                    elseif($val->transfer_status == 1){
                      $ref_no = "TRANSFER ID #" . $val->id;
                    }
                    else{
                      $ref_no = "BOOKING ID #" . $val->book_ser->id;
                    }

                    if($val->transfer){
                      if($val->transfer->status == 0){
                        $debit = $val->debit_amount;
                      }else{
                        $debit = $val->debit_amount;
                      }
                    }else{
                      $debit = $val->debit_amount;
                    }

                    $resdata[$key]['id'] = $val->id;
                    $resdata[$key]['date'] = date('d-F-Y g:i A' ,strtotime($val->created_at));
                    $resdata[$key]['narration'] = $narration.$message;
                    $resdata[$key]['ref_no'] = $ref_no;
                    $resdata[$key]['credit'] = ($val->credit_amount) ? $val->credit_amount : "";
                    $resdata[$key]['debit'] = ($debit) ? $debit : "";
					$resdata[$key]['transfer_status'] = $val->transfer_status;
					
                }
                $res_ = array('error'=>'false','data'=>$resdata);
            }else{
                $res_ = array('error'=>'true','message'=>'Data not found.');
            }
        }else{
            $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}

//Account Details
//http://192.168.0.170/ompharmacy/api/account_details?data={"user_id":"1","t_id":"4"}
public function accountDetails(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id']) && !empty($post['t_id'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info > 0){
            $data = TransactionHistory::with(['transfer'=>function($query){
                                                                $query->select('id', 'account_holder_name', 'account_number', 'branch_name', 'bank_name', 'ifsc_code', 'amount', 'status');}
                                                            ])->select('id','transaction_id','transfer_id')->where('id', $post['t_id'])->first();
            $resData = [];
            $resData['transfer_id'] = "TRANSFER ID #" . $data->id;
            $resData['account_holder_name'] = $data->transfer->account_holder_name;
            $resData['account_number'] = $data->transfer->account_number;
            $resData['branch_name'] = $data->transfer->branch_name;
            $resData['bank_name'] = $data->transfer->bank_name;
            $resData['ifsc_code'] = $data->transfer->ifsc_code;
            $resData['amount'] = $data->transfer->amount;
            $resData['message'] = $data->transaction_id;

            $res_ = array('error'=>'false','data'=>$resData);
        }else{
            $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
        }
    }else{
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}

//Transfer Money
//http://192.168.0.170/ompharmacy/api/transfer_money
//{"user_id":"1", "account_holder_name":"Trideep", "account_number":"12345678974", "branch_name":"Bhubaneswar SBI", "bank_name":"SBI", "ifsc_code":"SBIN001235", "amount":"1}
public function transferMoney(Request $request){
    $res_ = array();
    $post = $request->all();
    if(!empty($post['user_id']) && !empty($post['account_holder_name']) && !empty($post['account_number']) && !empty($post['branch_name']) && !empty($post['bank_name']) && !empty($post['ifsc_code'])  && !empty($post['amount'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info > 0){
            $totalAmount = walletAmount($post['user_id']);
            if($post['amount'] <= 0){
                $res_ = array('error'=>'true','message'=>"Please enter a valid amount.");
            }else{
                if($post['amount'] > $totalAmount){
                    $res_ = array('error'=>'true','message'=>"Transfer amount can't be greater then wallet amount.");
                }else{
                    $bankDetail = Banktransfer::create($post);
                    $balance = [];
                    $balance['user_id'] = $post['user_id'];
                    $balance['transfer_status'] = 1;
                    $balance['debit_amount'] = $post['amount'];
                    $balance['transfer_id'] = $bankDetail->id;
                    $debitMoney = TransactionHistory::create($balance);
                    $res_ = array('error'=>'false','message'=>"Waiting for confirmation from administrator.");
                }
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//User Myaccount
//http://192.168.0.170/ompharmacy/api/myaccount_update
//{"user_id":"1","first_name":"Trideep","last_name":"Dakua","email":"trdeep@bletindia.com","address":"Bhubaneswar, Odisha","pincode":"751010","disease_profile":"High Sugar","consultant_contact_dtls":"SK-9861245555","hospital_dtls":"KIIT HOSPITAL","relative_contact_dtls":"SSS-9338455675"}
public function myaccountUpdate(Request $request){
    $res_ = array();
    $post = $request->all();
    if(!empty($post['user_id']) && !empty($post['first_name']) && !empty($post['last_name']) && !empty($post['email']) && !empty($post['address']) && !empty($post['pincode'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info > 0){
            $checkEmail = UserRegistration::where([['email', '=', $post['email']],['id', '!=', $post['user_id']]])->count();
            if($checkEmail == 0){
                $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$post['pincode']."&sensor=false&key=AIzaSyABO3gjGH7SymxSGRZwZ6S2rjKtCtHIWIY";
                $details=file_get_contents($url);
                $result = json_decode($details,true);
                if($result['status'] == 'OK'){
                    $lat=$result['results'][0]['geometry']['location']['lat'];
                    $lng=$result['results'][0]['geometry']['location']['lng'];
                    $postAll = [];
                    $postAll['first_name'] = $post['first_name'];
                    $postAll['last_name'] = $post['last_name'];
                    $postAll['email'] = $post['email'];
                    $postAll['address'] = $post['address'];
                    $postAll['pincode'] = $post['pincode'];

                    $postAll['disease_profile'] = $post['disease_profile'];
                    $postAll['consultant_contact_dtls'] = $post['consultant_contact_dtls'];
                    $postAll['hospital_dtls'] = $post['hospital_dtls'];
                    $postAll['relative_contact_dtls'] = $post['relative_contact_dtls'];
                    
                    $postAll['lat'] = $lat;
                    $postAll['lng'] = $lng;
                    UserRegistration::where('id', $post['user_id'])->update($postAll);
                    $data = UserRegistration::where('id', $post['user_id'])->first();
                    if($data->profile_img != '' && $data->profile_img != null){
                        $data['profile_img'] = asset('public/profiles/'.$data->profile_img);
                    }
                    $res_ = array('error'=>'false','message'=>'Profile updated successfully.', 'data'=>$data);
                }else{
                    $res_ = array('error'=>'true','message'=>"Please enter a valid pincode.");
                }
            }else{
                $res_ = array('error'=>'true','message'=>"The email has already been taken.");
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//User Details
//http://192.168.0.170/ompharmacy/api/user_details?data={"user_id":"1"}
public function userDetails(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info == 1){
            $data = UserRegistration::where('id', $post['user_id'])->first();
            if($data->profile_img != '' && $data->profile_img != null){
                $data['profile_img'] = asset('public/profiles/'.$data->profile_img);
            }else{
                $data['profile_img'] = "";
            }
            $res_ = array('error'=>'false','data'=> $data);
        } else {
            $res_ = array('error'=>'true','message'=>"This user id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//Upload Userphoto
//http://192.168.0.170/ompharmacy/api/upload_user_photo
//{"user_id":"1","photo":"123.jpg"}
public function uploadUserPhoto(Request $request){
    $res_ = array();
    $post = $request->all();
    if(!empty($post['user_id']) && !empty($post['photo'])){
        $data = UserRegistration::where('id',$post['user_id'])->count();
        if($data > 0){
            $pData = UserRegistration::where('id',$post['user_id'])->select('id','first_name','profile_img')->first();
              //Unlink code here
              if(file_exists("public/profiles/" . $pData->profile_img)){
                  if ($pData->profile_img != '')
                  {
                    $unlink_img = "public/profiles/" . $pData->profile_img;
                    unlink($unlink_img);
                  }
              }
              
              $pimg_image = bcrypt(date('dmy').time().$pData->first_name);
              $res = preg_replace("/[^A-Za-z0-9\-]/", "", $pimg_image).'.'.$post['photo']->getClientOriginalExtension();
              //60*60 Photo Uploading
              $post_img = Image::make($post['photo']->getRealPath())->resize(60, 60);
              $post_img->save(public_path() . '/profiles/' . $res);
              $postAll = [];
              $postAll['profile_img'] = $res;
              UserRegistration::where('id', $post['user_id'])->update($postAll);
              $res_ = array('error'=>'false','message'=>'Profile photo updated successfully.');
        }else{
            $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
        }
    }else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}


// Change user Password
//http://192.168.0.170/ompharmacy/api/change_pwd
public function changePassword(Request $request){
    $res_ = array();
    $post = $request->all();
    if(!empty($post['user_id']) && !empty($post['cur_pwd']) && !empty($post['new_pwd'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info > 0){
            $user = UserRegistration::where('id', $post['user_id'])->select('id', 'password')->first();
            if (Hash::check($post['cur_pwd'], $user->password)) {
                $user->fill(['password' => Hash::make($post['new_pwd'])])->save();
                $res_ = array('error'=>'false','message'=>'Password successfully changed.');
            } else {
                $res_ = array('error'=>'true','message'=>'Current password you provided is wrong.');
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The user id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//User Feedback
//http://192.168.0.170/ompharmacy/api/user_feedback?data={"user_id":"1","booking_id":"3","rating":"4","feedback":"This is testing feedback"}
public function userFeedback(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id']) && !empty($post['booking_id']) && !empty($post['rating']) && !empty($post['feedback'])){
        $info = UserRegistration::where('id', $post['user_id'])->count();
        if($info > 0){
            $data = Bookservice::where('id', $post['booking_id'])->select('id', 'user_id', 'acpt_status')->first();
            if($data->acpt_status == 3){
                $postAll = [];
                $postAll['booking_id'] = $post['booking_id'];
                $postAll['rated_by'] = $post['user_id'];
                $postAll['type'] = 'US';
                $postAll['rating'] = $post['rating'];
                $postAll['feedback'] = $post['feedback'];
                RatingReview::create($postAll);
                sendSms(getAdminDetails()->phone_no, 'Feedback & rating from BOOKING ID : #'.$post['booking_id']);
                $res_ = array('error'=>'false','message'=>"You feedback submitted successfully.");
            }else{
                $res_ = array('error'=>'true','message'=>"something went wrong ! please try again.");
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The associate id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}





################# Associate API ##############



//Associate Login
//http://192.168.0.170/ompharmacy/api/associate_login?data={"email_mobile":"trideep@bletindia.com","password":"123","device_token":"f5P12OZHTss:APA91bGjZL_bkQbCqIWGRQUru7vXuEriMYSoGwzcgcZ1KJ-hn1M9hxgV-MTGZdtNH_Fw1ctWyj9TrKjYTQp_DjhfzeG4BXXEn8MJ9oB6X0sbFfbfe5rpsJcqKmAEf1YQM9cgc5-fJoMS","user_type":"1"}
//User type = 1 - (Associate), 2 - (User)
public function associateLogin(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['email_mobile']) && !empty($post['password']) && !empty($post['device_token']) && !empty($post['user_type'])){
        $info = User::where('email', $post['email_mobile'])->orWhere('phone_no', $post['email_mobile'])->count();
        if($info == 1){
            $data = User::where('email', $post['email_mobile'])->orWhere('phone_no', $post['email_mobile'])->first();
            //dd($data);
            if($data->active == 1){
                if (Hash::check($post['password'], $data->password)) {
                    $tokenPost = [];
                    $tokenPost['ass_user_id'] = $data->id;
                    $tokenPost['user_type'] = $post['user_type'];
                    $tokenPost['device_token'] = $post['device_token'];
                    deviceToken::create($tokenPost);
                   
                    if($data->image != '' && $data->image != null){
                        $data['image'] = asset('public/admin/images/'.$data->image);
                    }else{
                        $data['image'] = "";
                    }

                    //dd($data);
                    $res_ = array('error'=>'false','message'=>'Login Success','associateInfo'=>$data);
                } else {
                    $res_ = array('error'=>'true','message'=>'The password you provided is wrong.');
                }
            } else {
                $res_ = array('error'=>'true','message'=>'This account is not activated.');  
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The email id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//Associate forgot password otp
//http://192.168.0.170/ompharmacy/api/associate_forgot_password_otp?data={"mobile":"7205821247"}
public function associateForgotPasswordOtp(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post = json_decode($posted['data'], true);
    if(!empty($post['mobile'])){
        $info = User::where('phone_no', $post['mobile'])->count();
        if($info == 1){
            $data = User::where('phone_no', $post['mobile'])->first();
            if($data->active == 1){
                $otp = mt_rand(1000, 9999);
                $sms = sendSms($post['mobile'], 'HAH OTP '.$otp);
                $res_ = array('error'=>'false','message'=>'Verification code sent to '.$post['mobile'], 'OTP'=>$otp);
            }else{
                $res_ = array('error'=>'true','message'=>'This account is not activated.');
            }
        } else{
            $res_ = array('error'=>'true','message'=>"The mobile number doesn't exist in the system.");
        }
    }else{
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//Associate forgot password
//http://192.168.0.170/ompharmacy/api/associate_forgot_password?data={"mobile":"7205821247", "password":"123"}
public function associateForgotPassword(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['mobile']) && !empty($post['password'])){
        $info = User::where('phone_no', $post['mobile'])->count();
        if($info == 1){
            $data = User::where('phone_no', $post['mobile'])->first();
            if($data->active == 1){
                $psw = bcrypt($post['password']);
                $update_pass = User::where('phone_no', $post['mobile'])->update(['password' => $psw]);
                $res_ = array('error'=>'false','message'=>'Your password changed successfully');
            } else {
                $res_ = array('error'=>'true','message'=>'This account is not activated.');  
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The mobile number doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}


//Associate Logout
//http://192.168.0.170/ompharmacy/api/associate_logout?data={"user_id":"1","device_token":"f5P12OZHTss:APA91bGjZL_bkQbCqIWGRQUru7vXuEriMYSoGwzcgcZ1KJ-hn1M9hxgV-MTGZdtNH_Fw1ctWyj9TrKjYTQp_DjhfzeG4BXXEn8MJ9oB6X0sbFfbfe5rpsJcqKmAEf1YQM9cgc5-fJoMS"}
public function associateLogout(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['user_id']) && !empty($post['device_token'])){
        $info = User::where([['id', '=', $post['user_id']], ['type', '=', null], ['id', '!=', 1]])->count();
        if($info == 1){
            $data = deviceToken::where([['ass_user_id', '=', $post['user_id']], ['user_type', '=', 1], ['device_token', '=', $post['device_token']]])->delete();
            if($data){
                $res_ = array('error'=>'false','message'=>"Associate logout successfully.");
            } else {
                $res_ = array('error'=>'true','message'=>"Associate not logout successfully.");
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The email id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}


//Associate Feedback
//http://192.168.0.170/ompharmacy/api/associate_feedback?data={"ass_id":"21","booking_id":"3","rating":"4","feedback":"This is testing feedback"}
public function associateFeedback(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['ass_id']) && !empty($post['booking_id']) && !empty($post['rating']) && !empty($post['feedback'])){
        $info = User::where('id', $post['ass_id'])->count();
        if($info > 0){
            $data = Bookservice::where('id', $post['booking_id'])->select('id', 'user_id', 'acpt_status')->first();
            if($data->acpt_status != 2 && $data->acpt_status != 3){
                $postAll = [];
                $postAll['booking_id'] = $post['booking_id'];
                $postAll['rated_by'] = $post['ass_id'];
                $postAll['type'] = 'AS';
                $postAll['rating'] = $post['rating'];
                $postAll['feedback'] = $post['feedback'];
                RatingReview::create($postAll);
                $bookAll = [];
                $bookAll['acpt_status'] = 3;
                Bookservice::find($post['booking_id'])->update($bookAll);
                sendSms(customerMobile($data->user_id), 'Your BOOKING ID : #'.$post['booking_id'].' has been complated. Check your account to give your feedback.');
                $res_ = array('error'=>'false','message'=>"You feedback submitted successfully.");
            }else{
                $res_ = array('error'=>'true','message'=>"You have already submitted your feedback.");
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The associate id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//Associate Service Listing
//http://192.168.0.170/ompharmacy/api/associate_service_listing?data={"ass_id":"21"}
public function associateServiceListing(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['ass_id'])){
        $info = User::where('id', $post['ass_id'])->count();
        if($info > 0){
            $assId = $post['ass_id'];
            $data = Bookservice::with('service_det.cms_page','ass_det','feedback','user_det')->whereRaw('FIND_IN_SET('.$assId.',associate_ids)')->where([['req_acpt_id', '=', null], ['acpt_status', '=', 0]])->orderBy('id', 'DESC')->get();
			
			//dd($data);
            if (count($data) > 0) {
                foreach ($data as $key => $val) {
                if($val->req_acpt_id != null){
                    if($val->ass_det->image !='' && $val->ass_det->image !=NULL) { 
                        $ass_img = asset('public/admin/images/' . $val->ass_det->image);
                    }else{
                        $ass_img = asset('public/admin/images/avtar.png');
                    }
                    $ass_name = $val->ass_det->name;
                    $ass_phone = $val->ass_det->phone_no;
                    if(!$val->feedback->isEmpty()){
                        $ass_rating = $val->feedback[0]->rating;
                        $ass_feedback = $val->feedback[0]->feedback;
                    }else{
                        $ass_rating = "";
                        $ass_feedback = "";
                    }
                    if($val->acpt_status == 3){
                        if(count($val->feedback) > 1){
                            $user_rating = $val->feedback[1]->rating;
                            $user_feedback = $val->feedback[1]->feedback;
                        }else{
                            $user_rating = "";
                            $user_feedback = "";
                        }
                    }else{
                        $user_rating = "";
                        $user_feedback = "";
                    }
                }else{
                    $ass_img = "";
                    $ass_name = "";
                    $ass_phone = "";
                    $ass_rating = "";
                    $ass_feedback = "";
                    $user_rating = "";
                    $user_feedback = "";
                }

                if($val->acpt_status == 2){
                    $cancel_note = $val->cancel_note;
                }else{
                    $cancel_note = "";
                }
				//$resdata [] = $val;
				//dd($resdata);exit;
				
				if($val->user_det->profile_img !='' && $val->user_det->profile_img !=NULL) {
					$user_img = asset('public/profiles/' . $val->user_det->profile_img);
                }else{
					$user_img = asset('public/admin/images/avtar.png');
                }	
				
				
                $resdata[$key]['id'] = $val->id;
                $resdata[$key]['booking_id'] = "BOOKING ID # ". $val->id;
                $resdata[$key]['service_name'] = $val->service_det->cms_page->title;
                $resdata[$key]['test_name'] = $val->service_det->name . ' (# ' . $val->service_det->test_id . ')';
                $resdata[$key]['test_description'] = $val->service_det->shot_description;
                $resdata[$key]['booking_date'] = date('l, d M Y' ,strtotime($val->created_at));
                $resdata[$key]['service_date'] = date('l, d M Y' ,strtotime($val->booking_date));
                $resdata[$key]['time'] = date("g:i A", strtotime($val->booking_time));
                $resdata[$key]['price'] = $val->price;
                $resdata[$key]['status'] = $val->acpt_status;
				
                $resdata[$key]['req_acpt_id'] = $val->req_acpt_id ? $val->req_acpt_id : "";
				
                $resdata[$key]['ass_img'] = $ass_img;
                $resdata[$key]['ass_name'] = $ass_name;
                $resdata[$key]['ass_phone'] = $ass_phone;
                $resdata[$key]['ass_rating'] = $ass_rating;
                $resdata[$key]['ass_feedback'] = $ass_feedback;
                $resdata[$key]['cancel_note'] = $cancel_note;
                $resdata[$key]['user_rating'] = $user_rating;
                $resdata[$key]['user_feedback'] = $user_feedback;
				
				$resdata[$key]['user_id'] = $val->user_det->id;
				$resdata[$key]['user_name'] = $val->user_det->first_name." ".$val->user_det->last_name;
				$resdata[$key]['user_phone'] = $val->user_det->phone;
				$resdata[$key]['user_phone'] = $val->user_det->phone;
				$resdata[$key]['user_email'] = $val->user_det->email;
				$resdata[$key]['user_address'] = $val->user_det->address;
				$resdata[$key]['user_pincode'] = $val->user_det->pincode;
				$resdata[$key]['user_lat'] = $val->user_det->lat;
				$resdata[$key]['user_lng'] = $val->user_det->lng;
				$resdata[$key]['user_img'] = $user_img;
				
            }
                $res_ = array('error'=>'false','data'=>$resdata);
            }else{
                $res_ = array('error'=>'true','message'=>'No Bookings found!');
            }
        }else{
            $res_ = array('error'=>'true','message'=>"The associate id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}


//Associate Service Accept
//http://192.168.0.170/ompharmacy/api/associate_service_accept?data={"ass_id":"21","booking_id":"1"}
public function associateServiceAccept(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['ass_id']) && !empty($post['booking_id'])){
        $info = User::where('id', $post['ass_id'])->count();
        if($info > 0){
            $checkAss = Bookservice::where('id', $post['booking_id'])->whereRaw('FIND_IN_SET('.$post['ass_id'].',associate_ids)')->first();
            if($checkAss != null){
                $data = Bookservice::where('id', $post['booking_id'])->select('id', 'user_id', 'acpt_status')->first();
                if($data->acpt_status == 0 && $data->req_acpt_id == null){
                    $bookAll = [];
                    $bookAll['acpt_status'] = 1;
                    $bookAll['req_acpt_id'] = $post['ass_id'];
                    Bookservice::find($post['booking_id'])->update($bookAll);
                    sendSms(customerMobile($data->user_id), 'Your Booking has been confirmed. Login to check the associate details.');
                    $res_ = array('error'=>'false','message'=>"approved successfully.");
                }else{
                    $res_ = array('error'=>'true','message'=>"Sorry an associate approved this booking.");
                }
            }else{
                $res_ = array('error'=>'true','message'=>"Associate not found in this booking.");
            }
        } else {
            $res_ = array('error'=>'true','message'=>"The associate id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
    }
    echo json_encode($res_);
}

//Associate Booking Details OR Request send to the associate
//http://192.168.0.170/ompharmacy/api/associate_booking_details?data={"ass_id":"18"}
public function associateBookingDetails(Request $request){
    $res_ = array();
    $posted = $request->all();
    $post =  json_decode($posted['data'],true);
    if(!empty($post['ass_id'])){
        //$info = User::where('id', $post['ass_id'])->where('active',1)->count();
		$info = User::where('id', $post['ass_id'])->where('active',1)->first();
		//dd($info);
        //if($info > 0){
		if($info != NULL){
            $assId = $post['ass_id'];
			
			//$requestSend = Bookservice::where([['associate_ids', 'like', '%' . $assId . '%'],['acpt_status', '!=', 2]])->count();
			$requestSend = Bookservice::whereRaw('FIND_IN_SET('.$assId.',associate_ids)')->where('acpt_status', '!=', 2)->count();
		 
		 
			
			
            $requestSendDetail = Bookservice::with('service_det.cms_page','ass_det','feedback')->whereRaw('FIND_IN_SET('.$assId.',associate_ids)')->where('acpt_status', '!=', 2)->orderBy('id', 'DESC')->get();

                $requestSendData = [];
                foreach ($requestSendDetail as $key => $val) {
                $requestSendData[$key]['id'] = $val->id;
                $requestSendData[$key]['booking_id'] = "BOOKING ID # ". $val->id;
                $requestSendData[$key]['service_name'] = $val->service_det->cms_page->title;
                $requestSendData[$key]['test_name'] = $val->service_det->name . ' (# '. $val->service_det->test_id .')';
                $requestSendData[$key]['test_description'] = $val->service_det->shot_description;
                $requestSendData[$key]['booking_date'] = date('l, d M Y' ,strtotime($val->created_at));
                $requestSendData[$key]['service_date'] = date('l, d M Y' ,strtotime($val->booking_date));
                $requestSendData[$key]['time'] = date("g:i A", strtotime($val->booking_time));
                $requestSendData[$key]['price'] = $val->price;
                $requestSendData[$key]['status'] = $val->acpt_status;
                }

            //$requestAccept = Bookservice::where('req_acpt_id', 'like', '%' . $assId . '%')->count();
			$requestAccept = Bookservice::where('req_acpt_id',$assId)->count();
			
			
            $requestAcceptDetail = Bookservice::with('service_det.cms_page','ass_det','feedback','user_det')->where('req_acpt_id', $assId)->orWhere([['acpt_status', 3], ['acpt_status', '=', 1]])->orderBy('id', 'DESC')->get();
			//dd($requestAcceptDetail);

                $requestAcceptData = [];
                foreach ($requestAcceptDetail as $key => $val) {
                if($val->req_acpt_id != null){
                    if($val->ass_det->image !='' && $val->ass_det->image !=NULL) { 
                        $ass_img = asset('public/admin/images/' . $val->ass_det->image);
                    }else{
                        $ass_img = asset('public/admin/images/avtar.png');
                    }
                    $ass_name = $val->ass_det->name;
                    $ass_phone = $val->ass_det->phone_no;
                    if(!$val->feedback->isEmpty()){
                        $ass_rating = $val->feedback[0]->rating;
                        $ass_feedback = $val->feedback[0]->feedback;
                    }else{
                        $ass_rating = "";
                        $ass_feedback = "";
                    }
                    if($val->acpt_status == 3){
                        if(count($val->feedback) > 1){
                            $user_rating = $val->feedback[1]->rating;
                            $user_feedback = $val->feedback[1]->feedback;
                        }else{
                            $user_rating = "";
                            $user_feedback = "";
                        }
                    }else{
                        $user_rating = "";
                        $user_feedback = "";
                    }
                }else{
                    $ass_img = "";
                    $ass_name = "";
                    $ass_phone = "";
                    $ass_rating = "";
                    $ass_feedback = "";
                    $user_rating = "";
                    $user_feedback = "";
                }
				
				if($val->user_det->profile_img !='' && $val->user_det->profile_img !=NULL) {
					$user_img = asset('public/profiles/' . $val->user_det->profile_img);
                }else{
					$user_img = asset('public/admin/images/avtar.png');
                }	
                $requestAcceptData[$key]['id'] = $val->id;
                $requestAcceptData[$key]['booking_id'] = "BOOKING ID # ". $val->id;
                $requestAcceptData[$key]['service_name'] = $val->service_det->cms_page->title;
                $requestAcceptData[$key]['test_name'] = $val->service_det->name . ' (# '. $val->service_det->test_id .')';
                $requestAcceptData[$key]['test_description'] = $val->service_det->shot_description;
                $requestAcceptData[$key]['booking_date'] = date('l, d M Y' ,strtotime($val->created_at));
                $requestAcceptData[$key]['service_date'] = date('l, d M Y' ,strtotime($val->booking_date));
                $requestAcceptData[$key]['time'] = date("g:i A", strtotime($val->booking_time));
                $requestAcceptData[$key]['price'] = $val->price;
                $requestAcceptData[$key]['status'] = $val->acpt_status;
                $requestAcceptData[$key]['req_acpt_id'] = $val->req_acpt_id;
                $requestAcceptData[$key]['ass_img'] = $ass_img;
                $requestAcceptData[$key]['ass_name'] = $ass_name;
                $requestAcceptData[$key]['ass_phone'] = $ass_phone;
                $requestAcceptData[$key]['ass_rating'] = $ass_rating;
                $requestAcceptData[$key]['ass_feedback'] = $ass_feedback;
                $requestAcceptData[$key]['user_rating'] = $user_rating;
                $requestAcceptData[$key]['user_feedback'] = $user_feedback;
				$requestAcceptData[$key]['user_name'] = $val->user_det->first_name." ".$val->user_det->last_name;
				$requestAcceptData[$key]['user_phone'] = $val->user_det->phone;
				$requestAcceptData[$key]['user_phone'] = $val->user_det->phone;
				$requestAcceptData[$key]['user_email'] = $val->user_det->email;
				$requestAcceptData[$key]['user_address'] = $val->user_det->address;
				$requestAcceptData[$key]['user_pincode'] = $val->user_det->pincode;
				$requestAcceptData[$key]['user_lat'] = $val->user_det->lat;
				$requestAcceptData[$key]['user_lng'] = $val->user_det->lng;
				$requestAcceptData[$key]['user_img'] = $user_img;
				
				
				
                }
            $requestNotAccepted = $requestSend - $requestAccept;

            $res_ = array('error'=>'false','requestSend'=>$requestSend, 'requestSendDetails' =>$requestSendData, 'requestAccept'=>$requestAccept, 'requestAcceptDetails'=>$requestAcceptData, 'notAccepted'=>$requestNotAccepted);
            
        }else{
            $res_ = array('error'=>'true','message'=>"The associate id doesn't exist in the system.");
        }
    } else {
        $res_ = array('error'=>'true','message'=>'Something went wrong.');
    }
    echo json_encode($res_);
}

//http://192.168.0.170/ompharmacy/api/contact-us
public function contactUs(Request $request){
    $post = $request->all();
    if(!empty($post['checkmark']) && !empty($post['first_name']) && !empty($post['last_name']) && !empty($post['email']) && !empty($post['phone']) && !empty($post['message'])){

    	$data = array(
                'first_name' =>$post['first_name'],
                'last_name' =>$post['last_name'],
                'email' => $post['email'],
                'phone' => $post['phone'] ,
                'skills' => $post['skills'] ,
                'experience' => $post['experience'] ,
                'message' => $post['message']
            );
    	if($post['checkmark'] == 'Inquiry'){
            $data['subject'] = 'Ompharmacy inquiry';
            $data['blade'] = 'emails.inquiry';

            Mail::send('emails.inquiry',compact('data'), function($message) use ($data){
	            $admin = User::where('id','=', 1)->first();
	         	$type = json_decode($admin->type, true);
	            $toEmail = $type['Inquiry'];

	            $message->to($toEmail);
	            $message->subject($data['subject']);
	            $message->from($data['email']);
            });
            $res_ = array('error'=>'false','message'=>'Message send successfully.');
        }else{
            $data['subject'] = 'Ompharmacy Work with us';
            $data['blade'] = 'emails.work-with-us';

            Mail::send('emails.work-with-us',compact('data'), function($message) use ($data){
            		$admin = User::where('id','=', 1)->first();
	         		$type = json_decode($admin->type, true);
                    $toEmail = $type['Work with us'];

                    $message->to($toEmail);
                    $message->subject($data['subject']);
                    $message->from($data['email']);
            });
            $res_ = array('error'=>'false','message'=>'Message send successfully.');
        }
    	echo json_encode($res_);
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
        echo json_encode($res_);
    }   
}

//Search Service
//http://192.168.0.170/ompharmacy/api/search-service?data={"user_id":"18"}
public function searchService(Request $request){
    $res_ = array();
	$request_data = $request->all();
    $request_rec =  json_decode($request_data['data'],true);
	
    $data = CmsPage::with('service')->select('id','title','service_request','from_time','to_time','time24_status')->get();
    //dd($data);
    
    $user_data = UserRegistration::where('id',$request_rec['user_id'])->first();
    //dd($user_data);
    $address = ($user_data->address)?$user_data->address:'';
    $pincode = ($user_data->pincode)?$user_data->pincode:'';
    $lat = ($user_data->lat)?$user_data->lat:'';
    $lng = ($user_data->lng)?$user_data->lng:'';
    $phone = $user_data->phone;

    $user_dtls = array('address'=>$address,'pincode'=>$pincode,'lat'=>$lat,'lng'=>$lng,'phone'=>$phone);


    $search_record = [];
    foreach ($data as $key => $val) {
        $search_record [] = $val;
        $search_record[$key]['from_time'] = ($val->from_time)?$val->from_time:'';
        $search_record[$key]['to_time'] = ($val->to_time)?$val->to_time:'';
        //$search_record[$key]['user_dtls'] = $user_dtls;
        
    }
	
	 $wallet_amount = walletAmount($request_rec['user_id']);
	 //$wallet_amount = $userWalletAmount;

    $res_ = array('error'=>'false','walletBalance'=>$wallet_amount,'user_dtls'=>$user_dtls,'serviceList'=>$search_record);
    echo json_encode($res_);
}

//http://192.168.0.170/ompharmacy/api/account-contact-us
public function accountContactUs(Request $request){
    $post = $request->all();
    if(!empty($post['user_id']) && !empty($post['message'])){
		$user_dtls = UserRegistration::select('first_name','last_name','email','phone')->where('id',$post['user_id'])->first();
		//dd($user_dtls);

        if(empty($user_dtls)){
            $res_ = array('error'=>'true','message'=>'Invalid user ID');
            echo json_encode($res_);exit;
        }
    	$data = array(
                'name' =>$user_dtls['first_name']." ".$user_dtls['last_name'],
                'email' => $user_dtls['email'],
                'phone' => $user_dtls['phone'] ,
                'message' => $post['message']
            );
		$data['subject'] = 'Inquiry account queries';
        $data['blade'] = 'emails.account-mail';

        Mail::send('emails.account-mail',compact('data'), function($message) use ($data){
			$toEmail = Config::get('constants.account_email');
			$message->to($toEmail);
			$message->subject($data['subject']);
			$message->from($data['email']);
        });
        $res_ = array('error'=>'false','message'=>'Message send successfully.');
    	echo json_encode($res_);
    } else {
        $res_ = array('error'=>'true','message'=>'Please provide required field values.');
        echo json_encode($res_);
    }   
}








}
