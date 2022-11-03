<?php

namespace App\Http\Controllers;

use App\measurement_type;
use Illuminate\Http\Request;

class MeasurementTypeController extends Controller
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

    public function index()
    {
        $data = measurement_type::orderBy('id', 'DESC')->get();
        return view('admin.measurement-types.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.measurement-types.create');
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
        'types' => 'required|string',
        'type_unit' => 'required|string',
        ]);
        $allData = $request->all();
        $allData['type_slug'] = str_slug($request->input('types'));
        measurement_type::create($allData);      
        $request->session()->flash('success', 'Measurement type added successfully.');
        return redirect()->route('measurement-types.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\measurement_type  $measurement_type
     * @return \Illuminate\Http\Response
     */
    public function show(measurement_type $measurement_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\measurement_type  $measurement_type
     * @return \Illuminate\Http\Response
     */
    public function edit(measurement_type $measurement_type)
    {
        return view('admin.measurement-types.edit', compact('measurement_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\measurement_type  $measurement_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, measurement_type $measurement_type)
    {
        $id = $request->input('id');
        $this->validate($request,[
            'types' => 'required|string|unique:measurement_types,types,'.$id,
            'type_unit' => 'required|string',
        ]);
        $allData = $request->all();
        $allData['slug'] = str_slug($request->input('types'));
        $measurement_type->update($allData);
        $request->session()->flash('success', 'Measurement type updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\measurement_type  $measurement_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(measurement_type $measurement_type)
    {
        $countMeasurement = \App\measurement::where('measurements_type_id', $measurement_type->id)->count();
        if($countMeasurement > 0){
            Session()->flash('error', 'Please first delete all customer measurement to delete this record.');
            return redirect()->route('measurement-types.index');
        }
        measurement_type::destroy($measurement_type->id);
        Session()->flash('success', 'Measurement type deleted successfully.');
        return redirect()->route('measurement-types.index');
    }
}
