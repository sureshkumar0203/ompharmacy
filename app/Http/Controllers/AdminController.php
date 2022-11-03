<?php
namespace App\Http\Controllers;
use App\User;
use App\AboutUs;
use App\Video;
use App\Featured;
use App\BlogComment;
use App\UserRegistration;
use App\CmsPage;
use App\Cms;
use App\Bookservice;
use App\PrescriptionUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;
use Image;
use Session;
use DB;
use Mail;


class AdminController extends Controller
{	
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function checkLogin(){
        if(auth()->user()->id){
            return redirect('/administrator/home');
        }else{
            return view('admin.auth.login');
        }
    }

	public function index(){
		return view('admin.home');
	}
	
    public function changePassword(){
        return view('admin.change-password');
    }
	
	public function passwordUpdate(Request $request){
        $this->validate($request,[
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);
        $user = User::find(auth()->user()->id);
        if (Hash::check($request->current_password, $user->password)) {
            $user->fill(['password' => Hash::make($request->new_password)])->save();
            $request->session()->flash('success', 'Password changed successfully.');
            return back();
        } else {
            $request->session()->flash('error', 'Please enter your correct old password.');
            return back();
        }
    }
	
	public function myAccount(){
        $userId = User::find(auth()->user()->id);
        $userData = User::where('id',$userId->id)->first();
        $typeData = json_decode($userData->type);
        if($userData->dob != '' || null){
            $exData = explode('-', $userData->dob);
            $dob = $exData[1].'/'.$exData[2].'/'.$exData[0];
        }else{
            $dob = '';
        }
		return view('admin.my-account',compact('userData', 'dob', 'typeData'));
	}
	
	public function myaccountUpdate(Request $request){
        //dd($request->all());
        $id = $request->input('id');
        //echo $id; exit;
		$this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone_no' => 'required',
            'landline' => 'nullable',
            'tollfree_no' => 'nullable',
            'address' => 'nullable',
            'gst_no' => 'nullable',
            'facebook_url' => 'url|nullable',
            'twitter_url' => 'url|nullable',
            'linkedin_url' => 'url|nullable',
            'googleplus_url' => 'url|nullable',
        ]);
        
        $typeArrray = $request->input('type');
        if($typeArrray != ''){
            $arrPush['Inquiry'] = $typeArrray[0];
            $arrPush['Work with us'] = $typeArrray[1];
            $typeData = json_encode($arrPush);
        }else{
            $typeData = 1;
        }
        
        $userId = User::find(auth()->user()->id);
        if($request->file('image') != ""){
          $data = User::where('id','=',$userId->id)->first();
          $ext_cat_icon = strtolower($request->file('image')->getClientOriginalExtension());
          if ($request->file('image')->getClientOriginalName() != "" && $ext_cat_icon == "png" || $ext_cat_icon == "jpg" || $ext_cat_icon == "jpeg"){
            if(file_exists("public/admin/images/" . $data->image)){
                if ($data->image != '') 
                {
                  $unlink_path = "public/admin/images/" . $data->image;
                  unlink($unlink_path);
                }
            }
            //Unlink code ends here
            $banner_image = date('dmy') . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $thumb_img = Image::make($request->file('image')->getRealPath())->resize(128, 128);
            $thumb_img->save(public_path() . '/admin/images/' . $banner_image, 80);
            $banner_data = $request->all();
            $banner_data['image'] = $banner_image;
            $banner_data['dob'] = date('Y-m-d' ,strtotime($request->input('dob')));
            $banner_data['type'] = $typeData;
            User::find($userId->id)->update($banner_data);
            $request->session()->flash('success', 'Profile data updated successfully.');
            return back();
            }
        }
        $update_data = $request->all();
        $update_data['dob'] = date('Y-m-d' ,strtotime($request->input('dob')));
        $update_data['type'] = $typeData;
        User::find($userId->id)->update($update_data);
        $request->session()->flash('success', 'Profile data updated successfully.');
        return back();
	}

    public function aboutContent(){
        $aboutContent = AboutUs::where('id', 1)->first();
        return view('admin.about-content',compact('aboutContent'));
    }

    public function updateAboutContent(Request $request){
        $reference_id = $request->input('reference_id');
        $oldImage = $request->input('hidden_img');
        $this->validate($request,[
            'description' => 'required|string',
        ]);
        AboutUs::find($reference_id)->update($request->all());
        $request->session()->flash('success', 'Information updated successfully.');
        return back();
    }

    public function viewFeatured(){
        $data = Featured::where('id', 1)->first();
        return view('admin.featured',compact('data'));
    }

    public function updateFeatured(Request $request) {
        $this->validate($request,[
            'happy_patients' => 'required|numeric',
            'success_mission' => 'required|numeric',
            'qualified_doctors' => 'required|numeric',
            'years_of_experience' => 'required|numeric',
        ]);
        Featured::find(1)->update($request->all());
        $request->session()->flash('success', 'Featured Updated successfully!');
        return back();
    }

    public function blogComment() {
        $blogComments = BlogComment::with(array('blog' => function($query){
                        $query->select('id','title');
                        }))->orderBy('id', 'DESC')->get();
        return view('admin.blog-comment', compact('blogComments'));
    }

    public function changeStatus($id){
        $checkStatus = BlogComment::where('id', $id)->select('id', 'status')->first();
        if($checkStatus->status == 0){
            BlogComment::where('id', $id)->update(['status' => 1]);
        }else{
            BlogComment::where('id', $id)->update(['status' => 0]);
        }
        Session::flash('success', 'Status Updated Successfully.');
        return back();
    }

    public function deleteBlogComment($id){
        BlogComment::destroy($id);
        Session()->flash('success', 'Blog comment deleted successfully.');
        return back();
    }

    public function customerListing(){
        $getUser = UserRegistration::orderBy('id', 'DESC')->get();
        return view('admin.customer.index', compact('getUser'));
    }

    public function customerDetails($id){
        $customeDet = UserRegistration::where('id', $id)->first();
        return view('admin.customer.custome-details', compact('customeDet'));
    }

    public function cmsStatus($id){
        $checkStatus = CmsPage::where('id', $id)->select('id', 'status')->first();
        if($checkStatus->status == 0){
            CmsPage::where('id', $id)->update(['status' => 1]);
        }else{
            CmsPage::where('id', $id)->update(['status' => 0]);
        }
        Session::flash('success', 'Status Updated Successfully.');
        return back();
    }

    public function viewCms(){
        $data = Cms::select('id', 'title', 'content')->orderBy('id', 'ASC')->get();
        return view('admin.cms.index', compact('data'));
    }

    public function editViewCms($id){
        $data = Cms::where('id', $id)->first();
        return view('admin.cms.edit', compact('data'));
    }

    public function updateCms(Request $request){
        $id = $request->input('id');
        $this->validate($request,[
            'title' => 'required|string|max:250|unique:cms,title,'.$id,
            'content' => 'required|string'
        ]);

        $postAll = $request->all();
        $postAll['slug'] = str_slug($request->input('title'));
        Cms::find($id)->update($postAll);
        $request->session()->flash('success', 'CMS updated successfully.');
        return back();
    }

    public function userBooking(){
        $booking_details = Bookservice::with(
                            ['service_det'=>function($query){
                                $query->select('id', 'name', 'test_id','sale_price');},
                             'user_det'=>function($query){
                                $query->select('id', 'first_name', 'last_name');}
                            ])
                            ->select('id', 'user_id', 'services_id', 'associate_ids', 'acpt_status', 'req_acpt_id', 'disp_only_adm', 'price', 'booking_date', 'booking_time', 'service_address', 'created_at')
                            ->where('disp_only_adm', 0)
                            ->orderBy('id', 'DESC')
                            ->get();
        //dd($booking_details);
        return view('admin.booking.index', compact('booking_details'));
    }

    public function userBookingDetails($id){
        $booking_details = Bookservice::with('user_det','service_det.cms_page', 'ass_det', 'assign_by', 'feedback')->where('id', $id)->orderBy('id', 'DESC')->first();
        //dd($booking_details);
        return view('admin.booking.booking-details', compact('booking_details'));
    }

    public function adminBooking(){
        $booking_details = Bookservice::with(
                            ['service_det'=>function($query){
                                $query->select('id', 'name', 'test_id','sale_price');},
                             	'user_det'=>function($query){
                                $query->select('id', 'first_name', 'last_name');}
                            ])
                            ->select('id', 'user_id', 'services_id', 'acpt_status', 'disp_only_adm', 'price', 'booking_date', 'booking_time', 'service_address', 'created_at')
                            ->where('disp_only_adm', 1)
                            ->orderBy('id', 'DESC')
                            ->get();
        //dd($booking_details);
        return view('admin.booking.admin-booking', compact('booking_details'));
    }

    public function prescriptionUploaded(){
        $prescription = PrescriptionUpload::with(['user_det' => function($query){
            $query->select('id','first_name','last_name', 'phone', 'email');
        }])->orderBy('id', 'DESC')->get();
        return view('admin.prescription.index', compact('prescription'));
    }

    public function feedBack(Request $request){
        if($request->input('note') != '' || $request->input('prescriptionId') != ''){
            PrescriptionUpload::where('id', $request->input('prescriptionId'))->update(['status' => 1, 'admin_note' => $request->input('note')]);

            //SMS for Customer & Admin
            $sms = sendSms(customerMobile($request->userId), $request->input('note'));
            if($sms){
                return response()->json(['response' => "success", 'msg' => "Your message submitted successfully"]);
            }
        }else{
            return response()->json(['response' => "error", 'msg' => "Something went wrong!"]);
        }
    }

    public function associateDetails(Request $request){
        $data = User::selectRaw('id, CONCAT(name," [",associate_id,"] ") as name')->orderBy('id', 'DESC')->where('id', '!=', 1)->get();
        if($data != null){
            return response()->json(['response' => "success", 'data' => $data]);
        }else{
            return response()->json(['response' => "error", 'data' => $data]);
        }
    }

    public function assignAssociate(Request $request){
        //dd($request->all());
        $req_assign_by = auth()->user()->id;
        
        $assign = Bookservice::where([['id', '=', $request->input('booking_id')],['acpt_status', '=', 0]])->update(['req_acpt_id' => $request->input('assciate_id'), 'req_assign_by' => $req_assign_by, 'acpt_status' => 1]);
        
        if($assign){
            return redirect('administrator/booking')->with('success', 'Associate assigned successfully.');
        }else{
            return redirect('administrator/booking')->with('success', 'Associate not assigned.');
        }
    }

    public function approveAdmin(Request $request){
        $userPhone = Bookservice::with(['user_det'=>function($query){
                                          $query->select('id', 'phone');}
                                        ])->where('id', $request->id)->first();
        //echo $userPhone->user_det->phone; exit;
        $assign = Bookservice::where([['id', '=', $request->input('id')],['acpt_status', '=', 0]])->update(['req_acpt_id' => 1, 'req_assign_by' => auth()->user()->id, 'acpt_status' => 1]);
        sendSms($userPhone->user_det->phone, 'Your Booking has been confirmed. Login to check the associate details.');
        
        if($assign){
            return response()->json(['response' => "success"]);
        }else{
            return response()->json(['response' => "error"]);
        }
    }


    public function associateSentDetail($id){
        $bookDetail = Bookservice::with(['ass_det'=>function($query){
                                          $query->select('id', 'name', 'email', 'phone_no');}
                                        ])->where('id', $id)->first();
        $assId = $bookDetail->associate_ids;
        $explAssId = explode(',', $assId);
        $asso_name_arry = [];
        if($explAssId[0]!=''){
            foreach ($explAssId as $key => $value) {
                $assDetails = User::where('id', $value)->first();
                $asso_name_arry[$value] = $assDetails->name.'/'.$assDetails->email.'/'.$assDetails->phone_no;
            }
        }
        //dd($asso_name_arry);
        return view('admin.booking.asso-detail', compact('asso_name_arry','bookDetail'));
    }



    public function transfer() {
        $getTransfer = \App\TransactionHistory::with(['user'=>function($query){
                                                        $query->select('id', 'first_name', 'last_name','phone', 'email', 'address');},
                                                     'transfer'=>function($query){
                                                        $query->select('id', 'account_holder_name', 'account_number', 'branch_name', 'bank_name', 'ifsc_code', 'amount', 'status');}
                                                    ])
                                                ->select('id', 'user_id', 'transfer_status', 'debit_amount', 'transfer_id', 'updated_at')
                                                ->where('transfer_id', '!=', null)
                                                ->orderBy('id', 'DESC')
                                                ->get();
        //dd($getTransfer);
        return view('admin.transfer.index', compact('getTransfer'));
    }

    public function customerStatus($id){
        $checkStatus = UserRegistration::where('id', $id)->select('id', 'status')->first();
        if($checkStatus->status == 0){
            UserRegistration::where('id', $id)->update(['status' => 1]);
        }else{
            UserRegistration::where('id', $id)->update(['status' => 0]);
        }
        Session::flash('success', 'Status Updated Successfully.');
        return back();
    }

    public function adminTransfer(Request $request){
        if($request->input('note') != '' || $request->input('transaction_id') != '' || $request->input('userId') != ''){
            \App\TransactionHistory::where([['id', '=', $request->transaction_id],['user_id', '=', $request->userId]])->update(['transaction_id' => $request->note]);
            \App\Banktransfer::where('id', $request->transfer_id)->update(['status' => 1]);
            //SMS for Customer & Admin
            // $url = 'http://sms.creativetrends.in/api/sendmsg.php';
            // $data = array (
            //     'user' => 'omtrans',
            //     'pass' => 'IamGRV@771',
            //     'sender' => 'OMHCAH',
            //     'phone' => customerMobile($request->userId),
            //     'text' => $request->input('note'),
            //     'priority' => 'ndnd',
            //     'stype' => 'normal',
            // );
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url); //Remote Location URL
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in 
            // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); //Timeout after 7 seconds
            // curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
            // curl_setopt($ch, CURLOPT_HEADER, 0);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //parameters data
            // $result = curl_exec($ch);
            // curl_close($ch);
            // if($result){
            //     return response()->json(['response' => "success", 'msg' => "Your message submitted successfully"]);
            // }
            return response()->json(['response' => "success", 'msg' => "Your message submitted successfully"]);
        }else{
            return response()->json(['response' => "error", 'msg' => "Something want wrong!"]);
        }
    }

    public function transferDetail(Request $request){
        $id = $request->input('id');
        $userId = $request->input('userId');

        if($id != '' && $userId != ''){
            $data = \App\TransactionHistory::where([['id', '=', $id],['user_id', '=', $userId]])->select('id', 'transaction_id')->first();
            return response()->json(['response' => "success", 'msg' => $data ]);
        }else{
            return response()->json(['response' => "error", 'msg' => "Something want wrong!"]);
        }
    }

    public function subAdmin(){
        //Admin Permit
        //$subAdmin = User::get();

        //Subadmin Permit
        $subAdmin = User::where('type', 1)->get();
        return view('admin.subadmin.index',compact('subAdmin'));
    }

    public function createsubAdmin(){
        return view('admin.subadmin.create');
    }

    public function savesubAdmin(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:250',
            'email' => 'required|string|email|unique:users',
            'phone_no' => 'required|min:10|numeric|unique:users'
        ]);
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $password = substr(str_shuffle($chars), 0, 6);
        $postAll = $request->all();
        $postAll['password'] = Hash::make($password);
        $postAll['type'] = 1;
        $postAll['active'] = 1;
        $save = User::create($postAll);

        $data = array(
            'name' =>$request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'password' => $password
        );
        $data['subject'] = 'Subadmin Registration Confirmation';
        $data['blade'] = 'emails.subadmin-confirmation';
        Mail::send('emails.subadmin-confirmation',compact('data'), function($message) use ($data){
                $admin = User::where('id','=', 1)->first();
                $message->to($data['email']);
                $message->subject($data['subject']);
                $message->from($admin->email);
        });
		
		sendSms($request->phone_no,'You are Registered as a Subadmin. Your login credentials as follow  URL - https://www.healthcarehome.in/administrator Email - '.$request->email.' Password - '.$password);
        if($save){
            $request->session()->flash('success', 'Subadmin created successfully.');
            return redirect('administrator/subadmin/create');
        }else{
            $request->session()->flash('error', 'Oops! Something want wrong.');
            return redirect('administrator/subadmin/create');
        }
    }

    public function editViewsubAdmin($id){
        $data = User::where('id', $id)->select('id','name','email','phone_no','type')->first();
        //dd($data);
        return view('admin.subadmin.edit',compact('data'));
    }

    public function updatesubAdmin(Request $request){
        $id = $request->input('id');
        $this->validate($request,[
            'name' => 'required|string|max:250',
            'email' => 'required|string|email|unique:users,email,'.$id,
            'phone_no' => 'required|min:10|numeric|unique:users,phone_no,'.$id,
        ]);

        $postAll = $request->all();
        $postAll['name'] = $request->name;
        $postAll['email'] = $request->email;
        $postAll['phone_no'] = $request->phone_no;
        User::find($id)->update($postAll);
        $request->session()->flash('success', 'Sub Admin updated successfully.');
        return back();
    }

    public function deleteSubAdmin($id){
        $countPermit = \App\MenuPermit::where('user_id', $id)->count();
        if($countPermit > 0){
            \App\MenuPermit::where('user_id', $id)->delete();
        }
        User::destroy($id);
        Session()->flash('success', 'Sub Admin deleted successfully.');
        return back();
    }

    public function permitSubAdmin($id){
        return view('admin.subadmin.permit',compact('id'));
    }

    public function fetchGivenPermissions(Request $request){
        $uId = $request->input('userID'); 
        $info = \App\MenuPermit::where('user_id','=',$uId)->get();
        return response()->json($info);
    }

    public function assignPermit(Request $request){
        $data = $request->all();

        if(isset($data['chkSubMenu'])){
             $sub_menu_data = $data['chkSubMenu'];
        }else{
            $sub_menu_data = [];
        }
        

        // Delete all record of that user
        \App\MenuPermit::where('user_id', $data['hUserID'])->delete();

        // Add menu Details
        foreach($data['chkMenu'] as $key=>$val){
            $data['user_id'] = $data['hUserID'];
            $data['menu_id'] = $val;
            \App\MenuPermit::create($data);
        }


        foreach($sub_menu_data as $key=>$val){
            foreach($val as $i=>$j){       
                $subData = [];
                $subData['user_id'] = $data['hUserID'];
                $subData['menu_id'] = $key;
                $subData['sub_menu_id'] = $j;
                \App\MenuPermit::create($subData);
            }
        }
        Session()->flash('success','Permission added successfully.');
        return back();
    }

    public function subadminChangeStatus($id){
        $checkStatus = User::where('id', $id)->select('id', 'active')->first();
        if($checkStatus->active == 0){
            User::where('id', $id)->update(['active' => 1]);
            Session::flash('success', 'Subadmin Active Successfully.');
            return back();
        }else{
            User::where('id', $id)->update(['active' => 0]);
            Session::flash('success', 'Subadmin inactive Successfully.');
            return back();
        }
    }
}
