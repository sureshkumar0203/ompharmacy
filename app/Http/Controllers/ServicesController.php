<?php

namespace App\Http\Controllers;

use App\Services;
use App\CmsPage;
use Illuminate\Http\Request;
use Config;
use Illuminate\Validation\Rule;

class ServicesController extends Controller
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
        $data = Services::with(array('cms_page' => function($query){
                        $query->select('id','title');
                        }))->orderBy('id', 'DESC')->get();
        //dd($data);
        return view('admin.services.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $service_ary = Config::get('constants.no_services');
        $serviceId = mt_rand(1000, 999999);
        $pages = CmsPage::where('parent_id', 0)->whereNotIn('id', $service_ary)->pluck('title', 'id')->prepend('Select service category...', '');
        return view('admin.services.create', compact('pages','serviceId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test_id = $request->test_id;
        $cms_id = $request->cms_id;
        $this->validate($request,[
            'cms_id' => 'required|numeric',
            'name' => 'required|string|max:250',
            'test_id' => ['required',Rule::unique('services')->where(function ($query) use($test_id,$cms_id) {
                                return $query->where('test_id', $test_id)->where('cms_id', $cms_id);
                            }),
                         ],
            'sale_price' => 'required|numeric|min:1',
            'hour' => 'required|numeric',
            'minute' => 'required|numeric'
        ]);

        Services::create($request->all());             
        $request->session()->flash('success', 'Services added successfully.');
        return redirect()->route('services.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $services,$id)
    {
        $service_ary = Config::get('constants.no_services');
        $pages = CmsPage::where('parent_id', 0)->whereNotIn('id', $service_ary)->pluck('title', 'id')->prepend('Select service category...', '');
        $data = Services::where('id', $id)->first();
        return view('admin.services.edit', compact('pages','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $services)
    {
        $id = $request->input('id');
        $test_id = $request->test_id;
        $cms_id = $request->cms_id;
        $this->validate($request,[
            'cms_id' => 'required|numeric',
            'name' => 'required|string|max:250',
            'test_id' => ['required',Rule::unique('services')->where(function ($query) use($test_id,$cms_id,$id) {
                                return $query->where('test_id', $test_id)->where('cms_id', $cms_id)->where('id', '!=', $id);
                            }),
                         ],
            'sale_price' => 'required|numeric|min:1',
            'hour' => 'required|numeric',
            'minute' => 'required|numeric'
        ]);
        Services::find($id)->update($request->all());
        $request->session()->flash('success', 'Services updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $services,$id)
    {
        $countBook = \App\Bookservice::where('services_id', $id)->count();
        if($countBook > 0){
            Session()->flash('error', 'This service is booked by an user.');
            return redirect()->route('services.index');
        }
        Services::destroy($id);
        Session()->flash('success', 'Services deleted successfully.');
        return redirect()->route('services.index');
    }
}
