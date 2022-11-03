<?php

namespace App\Http\Controllers;

use App\PillManagement;
use Illuminate\Http\Request;

class PillManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $numUser = \App\UserRegistration::where('id', $id)->count();
        if($numUser == 0){
            return redirect('/administrator/customer');
        }
        $userDet = \App\UserRegistration::where('id', $id)->select('id','first_name', 'last_name', 'phone', 'email')->first();
        $data = PillManagement::with('user_det')->where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.customer.pill-management.index', compact('userDet', 'data'));
    }


    public function create($id)
    {
        return view('admin.customer.pill-management.create', compact('id'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
	        'medicine' => 'required',
            'start_date' => 'required',
	        'time' => 'date_format:H:i',
	        'days' => 'required',
	        'alert_type' => 'required',
        ]);
        $date = $request->start_date;
        $eDate = explode('/', $date);
        $sDate = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];
        $postAll = $request->all();
        $postAll['start_date'] = $sDate;
        PillManagement::create($postAll);      
        $request->session()->flash('success', 'Pill management added successfully.');
        return redirect('administrator/pill-management/create/'.$request->user_id);
    }


    public function edit(PillManagement $PillManagement)
    {
    	$timeExp = explode(':', $PillManagement->time);
        $time_ = $timeExp[0].':'.$timeExp[1];

        $start_date1 = $PillManagement->start_date;
        $sDate = date('d/m/Y' ,strtotime($start_date1));
        return view('admin.customer.pill-management.edit',compact('PillManagement','time_', 'sDate'));
    }


    public function update(Request $request, PillManagement $PillManagement)
    {
        $this->validate($request,[
	        'medicine' => 'required',
	        'time' => 'date_format:H:i',
            'start_date' => 'required',
	        'days' => 'required',
	        'alert_type' => 'required',
        ]);
        $date = $request->start_date;
        $eDate = explode('/', $date);
        $sDate = $eDate[2].'-'.$eDate[1].'-'.$eDate[0];
        $postAll = $request->all();
        $postAll['start_date'] = $sDate;
        
        PillManagement::find($PillManagement->id)->update($postAll);
        $request->session()->flash('success', 'Pill Management updated successfully.');
        return back();
    }

    public function destroy(PillManagement $PillManagement)
    {
        PillManagement::destroy($PillManagement->id);
        Session()->flash('success', 'Pill Management deleted successfully.');
        return back();
    }

}
