<?php

namespace App\Http\Controllers;

use App\User;
use App\Banner;
use App\Testimonials;
use App\Clients;
use App\AboutUs;
use App\Featured;
use App\Video;
use App\Blog;
use App\BlogComment;
use App\UserRegistration;
use App\OurTeam;
use App\CmsPage;
use App\Services;
use Illuminate\Http\Request;
use Session;
use Hash;
use Share;
use Redirect;
use Image;

use Softon\Indipay\Facades\Indipay;  
use Appnings\Payment\Facades\Payment;

class HomeController extends Controller
{
    public function index()
    {
        $aboutData = AboutUs::where('id', 1)->first();
        $featured = Featured::where('id', 1)->first();
        $adminData = User::where('id','=','1')->first();
        $banners = Banner::orderBy('id', 'DESC')->get();
        $testimonials = Testimonials::orderBy('id', 'DESC')->get();
        $video = Video::orderBy('id', 'DESC')->get();
        $videoContent = \App\Cms::where('id', 6)->select('id', 'content')->first();
        $services = CmsPage::where([['parent_id', '=', 0],['status', '=', 1]])->orderBy('id', 'ASC')->get();
        return view('home',compact('aboutData', 'featured', 'adminData', 'banners', 'testimonials', 'video', 'videoContent', 'services'));
    }

    public function myaccount() {
        $userData = UserRegistration::where('id', Session::get('userId'))->first();
        return view('myaccount', compact('userData'));
    }

    public function updateMyaccount(Request $request) {
        //dd($request->all());
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:user_registrations,phone,'.Session::get('userId'),
            'email' => 'required|email|unique:user_registrations,email,'.Session::get('userId'),
            'address' => 'required',
            'pincode' => 'required|regex:/\b\d{6}\b/',
            'profile_img' => 'image|nullable|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048'
        ]);
            $data = UserRegistration::where('id',Session::get('userId'))->first();
            if($request->file('profile_img') != ""){
              if(file_exists("public/profiles/" . $data->profile_img)){
                  if ($data->profile_img != '') 
                  {
                    $unlink_img = "public/profiles/" . $data->profile_img;
                    unlink($unlink_img);
                  }
              }
              
              //Unlink code ends here
              $pimg_image = bcrypt(date('dmy').time().$request->input('first_name'));
              $res = preg_replace("/[^A-Za-z0-9\-]/", "", $pimg_image).'.'.$request->file('profile_img')->getClientOriginalExtension();
              //750*270 Photo Uploading
              $post_img = Image::make($request->file('profile_img')->getRealPath())->resize(60, 60);
              $post_img->save(public_path() . '/profiles/' . $res);
            }else{
                $res = $data->profile_img;
            }

       $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$request->input('pincode')."&sensor=false&key=AIzaSyABO3gjGH7SymxSGRZwZ6S2rjKtCtHIWIY";
       $details=file_get_contents($url);
       $result = json_decode($details,true);
       if($result['status'] != 'OK'){
            $request->session()->flash('error', 'please enter a valid pincode.');
            return back();
       }
       $lat=$result['results'][0]['geometry']['location']['lat'];
       $lng=$result['results'][0]['geometry']['location']['lng'];
       $postAll = request()->except(['_token']);
       $postAll['lat'] = $lat;
       $postAll['lng'] = $lng;
       $postAll['profile_img'] = $res;
       $postAll['disease_profile'] = $request->disease_profile;
       $postAll['consultant_contact_dtls'] = $request->consultant_contact_dtls;
       $postAll['hospital_dtls'] = $request->hospital_dtls;
       $postAll['relative_contact_dtls'] = $request->relative_contact_dtls;
       UserRegistration::where('id', Session::get('userId'))->update($postAll);
       $request->session()->flash('success', 'Profile data updated successfully.');
       return back();
    }

    public function changePassword() {
        return view('change-password');
    }

    public function userChnagePassword(Request $request) {
        $this->validate($request,[
            'old_password' => 'required',
            'new_password' => 'required',
            'repeat_password' => 'required|same:new_password',
        ]);
        $user = UserRegistration::where('id', Session::get('userId'))->select('id', 'password')->first();
        if (Hash::check($request->old_password, $user->password)) {
            $user->fill(['password' => Hash::make($request->new_password)])->save();
            $request->session()->flash('success', 'Password changed successfully.');
            return back();
        } else {
            $request->session()->flash('error', 'Please enter your correct old password.');
            return back();
        }
    }

    public function about() {
        $getAboutContent = AboutUs::where('id', 1)->first();
        $team = OurTeam::orderBy('id', 'DESC')->get();
        return view('about', compact('getAboutContent', 'team'));
    }

    public function contact() {
        $data = User::where('id', 1)->select('id', 'type')->first();
        $typeData = json_decode($data->type, true);
        return view('contact', compact('typeData'));
    }

    public function blog() {
        $blogPost = Blog::orderBy('id', 'DESC')->paginate(6);
        $topBlogs = Blog::orderBy('id', 'DESC')->limit(10)->get();
        return view('blog', compact('blogPost', 'topBlogs'));
    }

    public function blogDetails($slug) {
        $blogContent = Blog::where('slug',$slug)->first();
        if($blogContent == null){
            return redirect('blog');
        }

        $topBlogs = Blog::orderBy('id', 'DESC')->where('id', '!=', $blogContent['id'])->limit(10)->get();
        $countComment = BlogComment::where('blog_id',$blogContent->id)->where('status','1')->count();
        $blogComments = BlogComment::where('blog_id',$blogContent->id)->where('status','1')->orderBy('id','DESC')->get();
        $share = Share::load(url()->current().'/'. $blogContent->short_description)->services('facebook', 'gplus', 'twitter');
        return view('blog-details', compact('blogContent', 'topBlogs', 'countComment', 'blogComments', 'share'));
    }

    public function cmsPage($slug){
        $exURL = explode('-', $slug);
        $id = $exURL[0];
        $cmspage = CmsPage::where([['id', '=', $id],['status', '=', 1]])->first();
        if($cmspage == null){
            return redirect('404');
        }
        $data = frontFetchCategoryTreeList($id);
        if($data == []){
            $content = $cmspage->description;
        }else{
            $content = '';
        }
        
        //$cmsData = CmsPage::where('parent_id', $cmspage->id)->where('status', 1)->orderBy('id', 'ASC')->get();
        // $parent = [];
        // foreach($cmsData as $data) {
        //  $parent[] = $data->id;
        // }
        // $parentData = CmsPage::whereIn('parent_id', $parent)->where('status', 1)->orderBy('id', 'ASC')->get();
        
        return view('cms-page', compact('cmspage', 'data', 'content'));
    }

    public function servicesCategory($slug){
        $exURL = explode('-', $slug);
        $id = $exURL[0];

        $cms_page = CmsPage::where([['id', '=', $id],['status', '=', 1]])->first();
        if($cms_page == null){
            return redirect('404');
        }
        if($cms_page->time24_status == 0){
            $getServices = Services::where('cms_id', $id)->get();
            $avalable = 1;
        }else{
            $current_time = date('H:i:s');
            $from_time = $cms_page->from_time;
            $to_time = $cms_page->to_time;
            if($current_time <= $to_time && $current_time >= $from_time){
                $getServices = Services::where('cms_id', $id)->get();
                $avalable = 1;
            }else{
                $getServices = [];
                $avalable = 0;
            }
        }
        return view('services-category', compact('cms_page','getServices','avalable'));
    }
    
	public function services(){
        $servicesCategory = CmsPage::where('parent_id', 0)->where('status', 1)->orderBy('id', 'ASC')->get();
        $services = Services::orderBy('id', 'ASC')->get();
        //dd($services);
		return view('services', compact('servicesCategory', 'services'));
	}

    public function video(){
        return view('video');
    }

    public function playVideo(Request $request){
        $id = $request->input('id');
        $video = Video::where('id', $id)->select('id', 'video')->first();
        return response()->json(['response' => "success", 'datas' => $video->video]);
    }

    public function CmsContent($slug){
        $num = \App\Cms::where('slug', $slug)->count();
        if($num > 0){
            $cms = \App\Cms::where('slug', $slug)->first();
            return view('pages', compact('cms'));
        }else{
            return redirect::to('/404');
        }
    }

    public function transfer(){
        return view('transfer');
    }

    public function healthRecords(){
        $measurement = \App\measurement_type::orderBy('id', 'DESC')->pluck('types', 'id')->prepend('Select Measurement types...', '');
        $data = \App\measurement::with('measurement_types')->where('user_id', Session::get('userId'))->orderBy('id', 'DESC')->paginate(20);
        return view('health-records', compact('measurement','data'));
    }

    public function pillManagement(){
        $data = \App\PillManagement::where('user_id', Session::get('userId'))->orderBy('id', 'DESC')->paginate(20);
        //dd($data);
        return view('pill-management', compact('data'));
    }

    public function healthActivity(){
        $data = \App\HealthActivity::where('user_id', Session::get('userId'))->orderBy('id', 'DESC')->paginate(20);
        return view('health-activity', compact('data'));
    }

    public function searchMeasurement(Request $request){
        //dd($request->all());
        $fromDate = date('Y-m-d', strtotime($request->fromDate)); 
        //$toDate = date('Y-m-d', strtotime($request->toDate)); 
        $toDate = date("Y-m-d",strtotime($request->input('toDate')."+1 day"));
        if($request->measurement != null){
            $data = \App\measurement::with('measurement_types')->where('user_id', Session::get('userId'))->where('measurements_type_id',$request->measurement)->whereBetween('updated_at', [$fromDate, $toDate])->orderBy('id', 'DESC')->paginate(20);
        }else{
            $data = \App\measurement::with('measurement_types')->where('user_id', Session::get('userId'))->whereBetween('updated_at', [$fromDate, $toDate])->orderBy('id', 'DESC')->paginate(20);
        }
        $measurement = \App\measurement_type::orderBy('id', 'DESC')->pluck('types', 'id')->prepend('Select Measurement types...', '');
        return view('health-records', compact('measurement','data'));
    }

    public function showPayment(){
        return view('payment-gateway');
    }

    // public function userPaymentProcess(Request $request){
    //     $order_id = rand(1,9999);
    //     $total_order_price = '10.00';
    //     /*echo "<pre>";
    //     print_r($order_det);
    //     exit;*/
    //     //Parameter URL PayYou Money : https://developer.payumoney.com/redirect/
    //     //Parameter URL CCAvenue: http://aravin.net/list-ccavenue-response-parameters-error-codes/
    //     //CCAvenue Sample Code : http://www.laraphp.com/ccavenue-payment-gateway-integration-php-step-step-source-code/php/
    //     //************Pay Yoo Money Parameters**************
    //     $parameters = [
    //     'amount' => $total_order_price,
    //     'firstname' => 'Trideep Dakua',
    //     'email' => 'trideep@bletindia.com',
    //     'phone' => '7205821247',
    //     'productinfo' => 'Order Details',
    //     'service_provider' => 'Test',//payu_paisa
    //     'address1' => 'Bhubaneswar Odisha',
    //     'address2' => 'Bhubaneswar Odisha',
    //     'city' => 'Bhubaneswar',
    //     'state' => 'Odisha',
    //     'country' => 'India',
    //     'zipcode' => '751010',
    //     'udf1' => $order_id,
        
    //     //CCavenue Extra Parameter
    //     'tid' => $order_id,
    //     'order_id' => $order_id,
    //     ];
    //     /*echo "<pre>"; 
    //     print_r($parameters);
    //     exit;*/
    //    //gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo / ZapakPay / Mocker
    //   $order = Indipay::gateway('CCAvenue')->prepare($parameters);
    //   /*echo "<pre>";   
    //   print_r($order);
    //   exit;*/
    //    return Indipay::process($order);
    // }


    // public function paymentResponse(Request $request){
    //     /*$fp=fopen("ipnresult.txt","w");
    //     foreach($_POST as $key => $value){
    //         fwrite($fp,$key.'===='.$value."\n");
    //     }*/
        
    //     // For default Gateway
    //     //$response = Indipay::response($request);
        
    //     // For Otherthan Default Gateway
    //     //$response = Indipay::gateway('PayUMoney')->response($request);
    //     $response = Indipay::gateway('CCAvenue')->response($request);
    //     dd($response);
    //     echo "<br>----------<br>".$_POST['status'];
    //     exit;
    // }

    public function errorPage(){
        return view('errors/404');
    }

    public function bookError(){
        return view('book-error');
    }

    public function pillReminder(){
        $data = \App\PillManagement::with(['user_det' => function($query){
            $query->select('id','first_name','last_name', 'phone', 'email');
        }])->get();
        $serverTime = date('H:i');
        $serverDate = date('Y-m-d');

        foreach ($data as $key => $value) {
            $timeExp = explode(':', $value->time);
            $time_ = $timeExp[0].':'.$timeExp[1];
            if($serverDate >= $value->start_date){
                if($value->status < $value->days && $time_ == $serverTime){
                    sendSms($value->user_det->phone, 'Dear '.$value->user_det->first_name.' '.$value->user_det->last_name.' You take this '.$value->medicine.' medicine @ '. date("g:i A", strtotime($value->time)));
                    $uStatus = $value->status+1;
                    \App\PillManagement::where('id', $value->id)->update(['status' => $uStatus]);
                }
            }
        }
    }

    public function refillReminder(){
        $data = \App\PillManagement::with(['user_det' => function($query){
            $query->select('id','first_name','last_name', 'phone', 'email');
        }])->get();
        foreach ($data as $key => $value) {
            $status = $value->status;
            $days = $value->days;
            $calculation = $days - $status;
            
            if($calculation == 4){
                sendSms($value->user_det->phone, 'Dear '.$value->user_det->first_name.' '.$value->user_det->last_name.' your '.$value->medicine.' medicine '. " going to be finish soon. Please purchase this medicine.");
            }
        }
    }


    // public function pushNotification(){
    //     $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
    //     $token='f5P12OZHTss:APA91bGjZL_bkQbCqIWGRQUru7vXuEriMYSoGwzcgcZ1KJ-hn1M9hxgV-MTGZdtNH_Fw1ctWyj9TrKjYTQp_DjhfzeG4BXXEn8MJ9oB6X0sbFfbfe5rpsJcqKmAEf1YQM9cgc5-fJoMS';
        

    //     $notification = [
    //         'body' => 'this is test',
    //         'sound' => true,
    //     ];
        
    //     $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

    //     $fcmNotification = [
    //         //'registration_ids' => $tokenList, //multple token array
    //         'to'        => $token, //single token
    //         'notification' => $notification,
    //         'data' => $extraNotificationData
    //     ];

    //     $headers = [
    //         'Authorization: key=AIzaSyCxL8GcEGeZZX5RFGaxC8UXBPZEk7fQ4gM',
    //         'Content-Type: application/json'
    //     ];


    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL,$fcmUrl);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
    //     $result = curl_exec($ch);
    //     curl_close($ch);


    //     dd($result);
    // }
}
