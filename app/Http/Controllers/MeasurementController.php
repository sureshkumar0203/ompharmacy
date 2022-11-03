<?php

namespace App\Http\Controllers;

use App\measurement;
use Illuminate\Http\Request;

class MeasurementController extends Controller
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
        $measurement_types = \App\measurement::with('user_det', 'measurement_types')->where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.customer.measurement.index', compact('userDet','measurement_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = \App\measurement_type::orderBy('id', 'DESC')->pluck('types', 'id')->prepend('Select Measurement types...', '');
        return view('admin.customer.measurement.create', compact('data', 'id'));
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
        'measurements_type_id' => 'required',
        'measurements_value' => 'required',
        ]);

        measurement::create($request->all());      
        $request->session()->flash('success', 'Measurement added successfully.');
        return redirect('administrator/measurement/create/'.$request->user_id);
        //return redirect()->route('measurement.create/'.$request->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function show(measurement $measurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function edit(measurement $measurement)
    {
        $data = \App\measurement_type::orderBy('id', 'DESC')->pluck('types', 'id')->prepend('Select Measurement types...', '');
        return view('admin.customer.measurement.edit',compact('measurement','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, measurement $measurement)
    {
        $this->validate($request,[
            'measurements_type_id' => 'required',
            'measurements_value' => 'required',
        ]);
        measurement::find($measurement->id)->update($request->all());
        $request->session()->flash('success', 'Measurement updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(measurement $measurement)
    {
        measurement::destroy($measurement->id);
        Session()->flash('success', 'Measurement deleted successfully.');
        return back();
    }
}
