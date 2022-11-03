<?php

namespace App\Http\Controllers;

use App\HealthActivity;
use Illuminate\Http\Request;

class HealthActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data = HealthActivity::with('user_det')->where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.customer.health-activity.index', compact('userDet', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.customer.health-activity.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'description' => 'required',
        ]);

        HealthActivity::create($request->all());   
        $request->session()->flash('success', 'Health Activity added successfully.');
        return redirect('administrator/health-activity/create/'.$request->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthActivity  $healthActivity
     * @return \Illuminate\Http\Response
     */
    public function show(HealthActivity $healthActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HealthActivity  $healthActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthActivity $healthActivity)
    {
        return view('admin.customer.health-activity.edit',compact('healthActivity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthActivity  $healthActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthActivity $healthActivity)
    {
        $this->validate($request,[
            'description' => 'required',
        ]);

        HealthActivity::find($healthActivity->id)->update($request->all());
        $request->session()->flash('success', 'Health Activity updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthActivity  $healthActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthActivity $healthActivity)
    {
        HealthActivity::destroy($healthActivity->id);
        Session()->flash('success', 'Health Activity deleted successfully.');
        return back();
    }
}
