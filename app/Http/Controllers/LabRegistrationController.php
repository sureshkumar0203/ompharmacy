<?php

namespace App\Http\Controllers;
use App\User;
use App\AssociateDocument;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Hash;
use Mail;

class LabRegistrationController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function associateRegistration(){
        $labsUsers = User::where([['id', '!=', 1],['type', '=', NULL]])->orderBy('id', 'DESC')->get();
        //dd($labsUsers);
        return view('admin.associate.index',compact('labsUsers'));
    }

    public function viewAssociateRegistration() {
    	return view('admin.associate.create');
    }

    public function saveAssociateRegistration(Request $request){
        //dd($request->all());
    	$this->validate($request,[
            'first_name' => 'required|string|max:250',
            'surname' => 'required|string|max:250',
            'dob' => 'required|date',
            'skill' => 'required|string|max:250',
            'experience' => 'required|string|max:250',
            'email' => 'required|string|email|unique:users',
            'phone_no' => 'required|min:10|numeric|unique:users',
            'fathers_name' => 'required|string|max:250',
            'address' => 'required|string',
            'permanent_address' => 'required|string',
            'zone' => 'required|string|max:250',
            'id_proof' => 'required|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048',
            'residence_proof' => 'required|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048',
            'educational_certificates' => 'required|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048',
            'verification_certificate' => 'required|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048',
            'experience_certificate' => 'required|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048',
            'agreement_letter' => 'required|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048'
        ]);
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
	    $password = substr(str_shuffle($chars), 0, 6);
	    $postAll = $request->all();
        $postAll['password'] = Hash::make($password);
        $postAll['name'] = $request->input('first_name') . ' ' . $request->input('surname');
        $postAll['dob'] = date('Y-m-d' ,strtotime($request->input('dob')));
        $save = User::create($postAll);
        $last_id = $save->id;
        $unique_id = 'ASS_'.strtoupper(substr($request->input('first_name'), 0, 3)).$last_id;

        $updateAll['associate_id'] = $unique_id;
        $updateAll['active'] = 1;
        $update = User::where('id', $last_id)->update($updateAll);

        if(!empty($request['id_proof'])){
           $idProofPath = Storage::putFile('idproof', $request['id_proof']); 
        } else {
            $idProofPath = '';
        }

        if(!empty($request['residence_proof'])){
           $residenceProofPath = Storage::putFile('residenceproof', $request['residence_proof']); 
        } else {
            $residenceProofPath = '';
        }

        if(!empty($request['educational_certificates'])){
           $educationalPath = Storage::putFile('educational_certificates', $request['educational_certificates']); 
        } else {
            $educationalPath = '';
        }

        if(!empty($request['verification_certificate'])){
           $verificationPath = Storage::putFile('verification_certificate', $request['verification_certificate']); 
        } else {
            $verificationPath = '';
        }

        if(!empty($request['experience_certificate'])){
           $experiencePath = Storage::putFile('experience_certificate', $request['experience_certificate']); 
        } else {
            $experiencePath = '';
        }

        if(!empty($request['agreement_letter'])){
           $agreementPath = Storage::putFile('agreement_letter', $request['agreement_letter']); 
        } else {
            $agreementPath = '';
        }
        $document = [];
        $document['user_id'] = $last_id;
        $document['id_proof'] = $idProofPath;
        $document['residence_proof'] = $residenceProofPath;
        $document['educational_certificates'] = $educationalPath;
        $document['verification_certificate'] = $verificationPath;
        $document['experience_certificate'] = $experiencePath;
        $document['agreement_letter'] = $agreementPath;
        AssociateDocument::create($document);

        $data = array(
            'name' =>$request->first_name . ' ' . $request->surname,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'password' => $password
        );
            $data['subject'] = 'Registration Confirmation';
            $data['blade'] = 'emails.associate-confirmation';
            Mail::send('emails.associate-confirmation',compact('data'), function($message) use ($data){
                    $admin = User::where('id','=', 1)->first();
                    $message->to($data['email']);
                    $message->subject($data['subject']);
                    $message->from($admin->email);
            });
        if($save){
	        $request->session()->flash('success', 'Associate User added successfully.');
	        return back();
        }else{
        	$request->session()->flash('error', 'Oops! Something want wrong.');
	        return back();
        }
    }

    public function editAssociateRegistration($id) {
        $data = User::with('associate_doc')->where('id', $id)->first();
        $name = $data->name;
        $explodeName = explode(' ', $name);
        $firstName = $explodeName[0];
        $surName = $explodeName[1];
        $dob = date('m/d/Y' ,strtotime($data->dob));
        return view('admin.associate.edit',compact('data', 'firstName', 'surName', 'dob'));
    }

    public function updateAssociateRegistration(Request $request) {
        $id = $request->input('id');
        $this->validate($request,[
            'first_name' => 'required|string|max:250',
            'surname' => 'required|string|max:250',
            'dob' => 'required|date',
            'skill' => 'required|string|max:250',
            'experience' => 'required|string|max:250',
            'email' => 'required|string|email|unique:users,email,'.$id,
            'phone_no' => 'required|min:10|numeric|unique:users,phone_no,'.$id,
            'fathers_name' => 'required|string|max:250',
            'address' => 'required|string',
            'permanent_address' => 'required|string',
            'zone' => 'required|string|max:250',
            'id_proof' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048',
            'residence_proof' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048',
            'educational_certificates' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048',
            'verification_certificate' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048',
            'experience_certificate' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048',
            'agreement_letter' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048'
        ]);
        $postAll = request()->except(['_token']);
        $postAll['name'] = $request->input('first_name') . ' ' . $request->input('surname');
        $postAll['dob'] = date('Y-m-d' ,strtotime($request->input('dob')));
        $update = User::find($id)->update($postAll);

        $oldIdproof = $request->input('hid_idproof');
        if(!empty($request['id_proof'])){
            $idProofPath = Storage::putFile('idproof',$request['id_proof']);
            \Storage::Delete($oldIdproof);
        } else {
            $idProofPath = $oldIdproof;
        }

        $oldResidence = $request->input('hid_residence');
        if(!empty($request['residence_proof'])){
            $residenceProofPath = Storage::putFile('residenceproof',$request['residence_proof']);
            \Storage::Delete($oldResidence);
        } else {
            $residenceProofPath = $oldResidence;
        }

        $oldEducational = $request->input('hid_educational');
        if(!empty($request['educational_certificates'])){
            $educationalPath = Storage::putFile('educational_certificates',$request['educational_certificates']);
            \Storage::Delete($oldEducational);
        } else {
            $educationalPath = $oldEducational;
        }

        $oldVerification = $request->input('hid_verification');
        if(!empty($request['verification_certificate'])){
            $verificationPath = Storage::putFile('verification_certificate',$request['verification_certificate']);
            \Storage::Delete($oldVerification);
        } else {
            $verificationPath = $oldVerification;
        }

        $oldExperience = $request->input('hid_experience');
        if(!empty($request['experience_certificate'])){
            $experiencePath = Storage::putFile('experience_certificate',$request['experience_certificate']);
            \Storage::Delete($oldExperience);
        } else {
            $experiencePath = $oldExperience;
        }

        $oldAgreement = $request->input('hid_agreement');
        if(!empty($request['agreement_letter'])){
            $agreementPath = Storage::putFile('agreement_letter',$request['agreement_letter']);
            \Storage::Delete($oldAgreement);
        } else {
            $agreementPath = $oldAgreement;
        }
        $document = [];
        $document['id_proof'] = $idProofPath;
        $document['residence_proof'] = $residenceProofPath;
        $document['educational_certificates'] = $educationalPath;
        $document['verification_certificate'] = $verificationPath;
        $document['experience_certificate'] = $experiencePath;
        $document['agreement_letter'] = $agreementPath;
        AssociateDocument::where('user_id', $id)->update($document);
        if($update){
            $request->session()->flash('success', 'Associate User Updated successfully.');
            return back();
        }else{
            $request->session()->flash('error', 'Oops! Something want wrong.');
            return back();
        }
    }

    public function deleteAssociateRegistration($id) {
        $countBooking = \App\Bookservice::where('associate_ids', 'like', '%' . $id . '%')->count();
        if($countBooking > 0){
            Session()->flash('error', 'This associate is assign by an user.');
            return redirect('administrator/associate-registration');
        }

        $info = AssociateDocument::where('user_id', $id)->first();
        if(!empty($info)){
            AssociateDocument::where('user_id', $id)->delete();
            \Storage::Delete($info->id_proof);
            \Storage::Delete($info->residence_proof);
            \Storage::Delete($info->educational_certificates);
            \Storage::Delete($info->verification_certificate);
            \Storage::Delete($info->experience_certificate);
            \Storage::Delete($info->agreement_letter);
        }
        User::destroy($id);
        Session()->flash('success', 'Associate User deleted successfully.');
        return back();
    }

    public function viewAssociate($id){
        $user = User::with('associate_doc')->where('id', $id)->first();
        return view('admin.associate.view', compact('user'));
    }

    public function associateChangeStatus($id){
        $checkStatus = User::where('id', $id)->select('id', 'active')->first();
        if($checkStatus->active == 0){
            User::where('id', $id)->update(['active' => 1]);
            Session::flash('success', 'Associate Active Successfully.');
            return back();
        }else{
            User::where('id', $id)->update(['active' => 0]);
            Session::flash('success', 'Associate inactive Successfully.');
            return back();
        }
    }
}
