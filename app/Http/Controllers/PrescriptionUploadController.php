<?php

namespace App\Http\Controllers;

use App\PrescriptionUpload;
use App\UserRegistration;
use App\User;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Http\Request;
use Mail;

class PrescriptionUploadController extends Controller
{
    public function index()
    {
        $prescriptions = PrescriptionUpload::orderBy('id', 'DESC')->where('user_id', Session::get('userId'))->limit(4)->get();
        $address = UserRegistration::where('id', Session::get('userId'))->select('id', 'address')->first();
        return view('prescription-upload', compact('prescriptions', 'address'));
    }

    public function prescriptionDetails()
    {
        $prescriptions = PrescriptionUpload::orderBy('id', 'DESC')->where('user_id', Session::get('userId'))->get();
        return view('prescription-upload-details', compact('prescriptions'));
    }

    public function prescriptionUpload(Request $request)
    {
        $this->validate($request,[
            'prescription' => 'required|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG|max:2048',
            'note' => 'nullable|string',
            'address' => 'required|string'
        ]);

        if(!empty($request['prescription'])){
           $prescription = Storage::putFile('prescription', $request['prescription']); 
        } else {
            $prescription = '';
        }

        $postAll = $request->all();
        $postAll['user_id'] = Session::get('userId');
        $postAll['image'] = $prescription;
        $check = PrescriptionUpload::create($postAll);
        $user = UserRegistration::where('id', Session::get('userId'))->select('id', 'first_name', 'last_name', 'phone', 'email')->first();
        if($check){
            $data = array(
                'name' =>$user->first_name.' '.$user->last_name,
                'phone' => $user->phone,
                'email' => $user->email, 
                'prescription' => $request->prescription,
                'note' =>$request->note,
                'address' => $request->address
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
            $request->session()->flash('success', 'prescription uploaded successfully.');
            return back();
        }else{
            $request->session()->flash('error', 'prescription not uploaded! Please try again.');
            return back();
        }
    }

    public function viewFeedback(Request $request){
        $id = $request->input('id');
        $data = PrescriptionUpload::where('id', $id)->select('id','admin_note')->first();
        return response()->json(['response' => "success", 'data' => $data->admin_note]);
    }

    public function deletePrescription($id){
        $info = PrescriptionUpload::where('id', base64_decode($id))->first();
        if(!empty($info)){
            \Storage::Delete($info->image);
        }
        PrescriptionUpload::destroy(base64_decode($id));
        return back();
    }
}
