<?php
namespace App\Http\Controllers;
use App\User;
use App\BlogComment;
use App\UserRegistration;
use Session;
use Mail;
use Hash;
use Illuminate\Support\Facades\Redirect;
//use DB;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function sendOtp(Request $request) {
    	$checkPhone = UserRegistration::where('phone', $request->input('phone'))->count();
    	if($checkPhone == 0) {
    		$otp = mt_rand(1000, 9999);
    		Session::put('otp', $otp);
            $sms = sendSms($request->input('phone'), 'HAH OTP '.session::get('otp'));

            if($sms){
                return response()->json(['response' => "success", 'msg' => "Verification code sent to ".$request->input('phone').""]);
            }
        	}else{
                return response()->json(['response' => "error", 'msg' => "error"]);
        	}
    }

    public function userSignup(Request $request) {
        if($request->input('otp') != session::get('otp')){
            return response()->json(['response' => "otperror", 'msg' => "Please enter valid OTP"]);
        }
        $checkEmail = UserRegistration::where('email', $request->input('email'))->count();
        if($checkEmail == 0) {

        }else{
            return response()->json(['response' => "emailerror", 'msg' => "Email address already exists."]);
        }
        $signUpData = $request->all();
        $signUpData['password'] = bcrypt($request->input('password'));
        $data = UserRegistration::create($signUpData);
        Session::forget('otp');
        if($data){
            Session::put('userId', $data->id);
            return response()->json(['response' => "success", 'msg' => "You are registed successfully."]);
        }
    }

    public function resendOtp(Request $request) {
        $sms = sendSms($request->input('phone'), 'HAH OTP '.session::get('otp'));

        if($sms){
            return response()->json(['response' => "success", 'msg' => "Verification code sent to ".$request->input('phone').""]);
        }
    }

    public function forgotOtp(Request $request) {
        $checkPhone = UserRegistration::where('phone', $request->input('phone_no'))->count();
        if($checkPhone == 1) {
            $otp = mt_rand(1000, 9999);
            Session::put('otp', $otp);
            $sms = sendSms($request->input('phone_no'), 'HAH OTP '.session::get('otp'));

            if($sms){
                return response()->json(['response' => "success", 'msg' => "Verification code sent to ".$request->input('phone_no').""]);   
            }
        }else{
            return response()->json(['response' => "error", 'msg' => "error"]);
        }
    }

    public function resendOtpForgot(Request $request){
        $sms = sendSms($request->input('phone'), 'HAH OTP '.session::get('otp'));
        
        if($sms){
            return response()->json(['response' => "success", 'msg' => "Verification code sent to ".$request->input('phone_no').""]);
        }
    }

    public function userForgot(Request $request) {
        if($request->input('otp') != session::get('otp')){
            return response()->json(['response' => "error", 'msg' => "Please enter valid OTP"]);
        }
        $password = bcrypt($request->input('password'));
        $update_pass = UserRegistration::where('phone', $request->input('phone_no'))->update(['password' => $password]);
        if($update_pass){
            return response()->json(['response' => "success", 'msg' => "Your password changed successfully"]);
        }
    }

    public function userSignin(Request $request) {
        $this->validate($request, [
            'user_email' => 'required',
            'user_password' => 'required'
        ]);
        //DB::enableQueryLog();
        $user = UserRegistration::where('email', $request->input('user_email'))->orWhere('phone', $request->input('user_email'))->count();
        //dd(DB::getQueryLog());
        if($user == 1){
            $check_login = UserRegistration::where('email', $request->input('user_email'))->orWhere('phone', $request->input('user_email'))->first();
            if($check_login->status == 0){
                return response()->json(['response' => 'error', 'msg' => 'Invalid email / password / account blocked by admin']);
            }else if(Hash::check($request->user_password, $check_login->password)){
                Session::put('userId', $check_login->id);
                Session::put('userName', $check_login->first_name.' '.$check_login->last_name);
                return response()->json(['response' => 'success', 'msg' => 'Login Success']);
            }else{
                return response()->json(['response' => 'error', 'msg' => 'Invalid email / password']);
            }
        }else{
            return response()->json(['response' => 'error', 'msg' => 'Email or phone not found. Please register']);
        }
    }

    public function userLogoout() {
        Session::forget('userId');
        return Redirect::to('/');
    }

    public function sendMail(Request $request){
        dd($request->all());
        $this->validate($request,[
        'type' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'phone' => 'required', 
        ]);

        if(!preg_match('/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\.[a-zA-Z]{2,4}$/',$request->input('email'))){
            return response()->json(['error' => "error"]); exit;
        }

        if($request->input('type') == 'Inquiry'){
            $data = array(
                'first_name' =>$request->first_name,
                'last_name' =>$request->last_name,
                'email' => $request->email,
                'phone' => $request->phone, 
                'message' => $request->message
            );
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
            return response()->json(['success' => "success"]); exit;
        }else{
            $data = array(
                'first_name' =>$request->first_name,
                'last_name' =>$request->last_name,
                'email' => $request->email,
                'skills' => $request->skills,
                'experience' => $request->experience,
                'phone' => $request->phone, 
                'message' => $request->message
            );
            $data['subject'] = 'Ompharmacy Work with us';
            $data['blade'] = 'emails.work_with_us';
            Mail::send('emails.work_with_us',compact('data'), function($message) use ($data){
                    $admin = User::where('id','=', 1)->first();
                    $type = json_decode($admin->type, true);
                    $toEmail = $type['Work with us'];
                    $message->to($toEmail);
                    $message->subject($data['subject']);
                    $message->from($data['email']);
            });
            return response()->json(['success' => "success"]); exit;
        }
    }

    public function postComment(Request $request) {
        $this->validate($request,[
        'name' => 'required',
        'email' => 'required|email',
        'comment' => 'required', 
        ]);

        $data = BlogComment::create($request->all());
        if($data){
            return response()->json(['response' => "success", 'msg' => "Your comment posted successfully"]);
        }else{
            return response()->json(['response' => "error", 'msg' => "Your comment not posted"]);
        }
    }
    
    public function transfer(Request $request){
        $this->validate($request,[
        'account_holder_name' => 'required',
        'account_number' => 'required',
        'branch_name' => 'required',
        'bank_name' => 'required',
        'ifsc_code' => 'required',
        'amount' => 'required',
        ]);
        
        $totalAmount = walletAmount(Session::get('userId'));
        if($request->amount <= 0){
            return response()->json(['response' => 'error', 'msg' => 'Please enter a valid amount']);
        }

        if($request->amount > $totalAmount){
            return response()->json(['response' => 'error', 'msg' => 'Transfer amount can\'t be greater then wallet amount']);
        }
        $bankDetail = \App\Banktransfer::create($request->all());
        $balance = [];
        $balance['user_id'] = Session::get('userId');
        $balance['transfer_status'] = 1;
        $balance['debit_amount'] = $request->amount;
        $balance['transfer_id'] = $bankDetail->id;
        $debitMoney = \App\TransactionHistory::create($balance);
        if($debitMoney) {
            return response()->json(['response' => "success"]);
        }else{
            return response()->json(['response' => "error", 'msg' => 'Something went wrong !']);
        }
    }

    public function accountDetails(Request $request){
        if($request->id != ''){
            $accountDetail = \App\TransactionHistory::with(['transfer'=>function($query){
                                                                $query->select('id', 'account_holder_name', 'account_number', 'branch_name', 'bank_name', 'ifsc_code', 'amount', 'status');}
                                                            ])->select('id','transaction_id','transfer_id')->where('id', $request->id)->first();
            return response()->json(['response' => 'success', 'data' => $accountDetail]);
        }else{
            return response()->json(['response' => 'error', 'msg' => 'Something went wrong !']);
        }
    }
}
