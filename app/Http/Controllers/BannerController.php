<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
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
        $banners = Banner::orderBy('id', 'DESC')->get();
        return view('admin.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
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
        'image' => 'required|image|mimes:jpeg,jpg,png,JPG,PNG,JPEG',
        'title' => 'required|string|max:255|unique:banners',
        'description' => 'required|string|max:255',
        'link' => 'url|nullable'
        ]);

      //upload Image
      $ser_image = bcrypt($request->input('title').date('dmy').time());
      $res = preg_replace("/[^a-zA-Z0-9\-]/", "", $ser_image).'.'.$request->file('image')->getClientOriginalExtension();
      //750*270 Photo Uploading
      $post_img = Image::make($request->file('image')->getRealPath())->resize(1920, 594);
      $post_img->save(public_path() . '/images/banner/' . $res);
      $banner = $request->all();
      $banner['image'] = $res;
      Banner::create($banner);
      $request->session()->flash('success', 'Banner added successfully.');
      return redirect()->route('banners.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $this->validate($request,[
        'image' => 'image|nullable|mimes:jpeg,jpg,png,JPG,PNG,JPEG',
        'title' => 'required|string|max:255|unique:banners,title,'.$banner->id,
        'description' => 'required|string|max:255',
        'link' => 'url|nullable'
        ]);

        if($request->file('image') != ""){
          $data = Banner::where('id','=',$banner->id)->first();
          $ext_cat_icon = strtolower($request->file('image')->getClientOriginalExtension());
          if ($request->file('image')->getClientOriginalName() != "" && $ext_cat_icon == "png" || $ext_cat_icon == "jpg" || $ext_cat_icon == "jpeg"){
            if(file_exists("public/images/banner/" . $data->image)){
                if ($data->image != '') 
                {
                  $unlink_path = "public/images/banner/" . $data->image;
                  unlink($unlink_path);
                }
            }
            //Unlink code ends here
            $ser_image = bcrypt($request->input('title').date('dmy').time());
            $res = preg_replace("/[^A-Za-z0-9\-]/", "", $ser_image).'.'.$request->file('image')->getClientOriginalExtension();
            //1920*594 Photo Uploading
            $post_img = Image::make($request->file('image')->getRealPath())->resize(1920, 594);
            $post_img->save(public_path() . '/images/banner/' . $res);

            $banner_data = $request->all();
            $banner_data['image'] = $res;
            $banner->update($banner_data);
            $request->session()->flash('success', 'Banner updated successfully.');
            return back();
            }
        }
        $banner->update($request->all());
        $request->session()->flash('success', 'Banner updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $data = Banner::where('id','=',$banner->id)->first();
        if(file_exists("public/images/banner/" . $data->image)){
            if ($data->image != '') 
            {
              $unlink_path = "public/images/banner/" . $data->image;
              unlink($unlink_path);
            }
        }
        Banner::destroy($banner->id);
        Session()->flash('success', 'Banner deleted successfully.');
        return redirect()->route('banners.index');
    }
}
