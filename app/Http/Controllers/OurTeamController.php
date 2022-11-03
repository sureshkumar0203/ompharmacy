<?php

namespace App\Http\Controllers;

use App\OurTeam;
use Illuminate\Http\Request;
use Image;

class OurTeamController extends Controller
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
        $getData = OurTeam::orderBy('id', 'DESC')->get();
        return view('admin.our-team.index',compact('getData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.our-team.create');
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
            'name' => 'required|string|max:250',
            'designation' => 'required|string',
            'mobile' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:our_teams',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

      $ser_image = bcrypt(date('dmy').time().$request->input('name').$request->input('mobile'));
      $res = preg_replace("/[^A-Za-z0-9\-]/", "", $ser_image).'.'.$request->file('image')->getClientOriginalExtension();
      //200*200 Photo Uploading
      $post_img = Image::make($request->file('image')->getRealPath())->resize(200, 200);
      $post_img->save(public_path() . '/images/our-team/' . $res);

      $postAll = $request->all();
      $postAll['image'] = $res;
      OurTeam::create($postAll);
      $request->session()->flash('success', 'Team added successfully.');
      return redirect()->route('our-team.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function show(OurTeam $ourTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(OurTeam $ourTeam)
    {
        $data = OurTeam::where('id', $ourTeam->id)->first();
        return view('admin.our-team.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurTeam $ourTeam)
    {
        $this->validate($request,[
             'name' => 'required|string|max:250',
             'designation' => 'required|string',
             'mobile' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:our_teams,mobile,'.$ourTeam->id,
             'image' => 'image|nullable|mimes:jpeg,jpg,png'
        ]);

        if($request->file('image') != ""){
              $data = OurTeam::where('id','=',$ourTeam->id)->first();
                //200*200 Unlink
                if(file_exists("public/images/our-team/" . $data->image)){
                    if ($data->image != '') 
                    {
                      $unlink_img = "public/images/our-team/" . $data->image;
                      unlink($unlink_img);
                    }
                }
                //Unlink code ends here
                $ser_image = bcrypt(date('dmy').time().$request->input('name').$request->input('mobile'));
                $res = preg_replace("/[^A-Za-z0-9\-]/", "", $ser_image).'.'.$request->file('image')->getClientOriginalExtension();
                //180*180 Photo Uploading
                $post_img = Image::make($request->file('image')->getRealPath())->resize(200, 200);
                $post_img->save(public_path() . '/images/our-team/' . $res);

                $postAll = $request->all();
                $postAll['image'] = $res;
                $ourTeam->update($postAll);
                $request->session()->flash('success', 'Team updated successfully.');
                return back();
            }

        $postAll = $request->all();
        $ourTeam->update($postAll);
        $request->session()->flash('success', 'Team updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OurTeam  $ourTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurTeam $ourTeam)
    {
        $data = OurTeam::where('id','=',$ourTeam->id)->first();
        if(file_exists("public/images/our-team/" . $data->image)){
            if ($data->image != '') 
            {
              $unlink_path = "public/images/our-team/" . $data->image;
              unlink($unlink_path);
            }
        }
        OurTeam::destroy($ourTeam->id);
        Session()->flash('success', 'Team deleted successfully.');
        return redirect()->route('our-team.index');
    }
}
