<?php

namespace App\Http\Controllers;

use App\CmsPage;
use Illuminate\Http\Request;
use Image;
use DB;
use Illuminate\Validation\Rule;

class CmsPageController extends Controller
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
        return view('admin.cms-page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$data = CmsPage::orderBy('id', 'DESC')->pluck('title', 'id')->prepend('Select Parent Menu...', '0');
        return view('admin.cms-page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $title = $request->title;
        $parent_id = $request->parent_id;
        $this->validate($request,[
            'title' => ['required',Rule::unique('cms_pages')->where(function ($query) use($title,$parent_id) {
                                return $query->where('title', $title)->where('parent_id', $parent_id);
                            }),
                         ],
            'description' => 'required|string'
        ]);

        if($request->input('from_time') != null && $request->input('to_time') != null){
            $from_time = date("H:i", strtotime($request->from_time));
            $to_time = date("H:i", strtotime($request->to_time));

            if(strtotime($from_time) >= strtotime($to_time)){
                Session()->flash('error', 'Please check the booking time.');
                return back();
            }
        }
        
        if($request->input('parent_id') == 0){
            if($request->file('image') != ''){
                $ext = strtolower($request->file('image')->getClientOriginalExtension());
                if ($request->file('image')->getClientOriginalName() != "" && $ext == "png" || $ext == "jpg" || $ext == "jpeg") {
                    $ser_image = bcrypt(date('dmy').time().$request->input('title'));
                    $res = preg_replace("/[^A-Za-z0-9\-]/", "", $ser_image).'.'.$request->file('image')->getClientOriginalExtension();
                    //180*180 Photo Uploading
                    $post_img = Image::make($request->file('image')->getRealPath())->resize(180, 180);
                    $post_img->save(public_path() . '/images/services/' . $res);
                }else{
                    $request->session()->flash('error', 'Invalid Image format Please uploaded only .png/.jpg/.jpeg extension Image.');
                    return Redirect()->route('cms-page.create');
                }
            }else{
                $res = '';
            }

            if($request->file('banner_img') != ''){
                $ext = strtolower($request->file('banner_img')->getClientOriginalExtension());
                if ($request->file('banner_img')->getClientOriginalName() != "" && $ext == "png" || $ext == "jpg" || $ext == "jpeg") {
                    $ban_img = bcrypt(date('dmy').time().$request->input('title'));
                    $ban_res = preg_replace("/[^A-Za-z0-9\-]/", "", $ban_img).'.'.$request->file('banner_img')->getClientOriginalExtension();
                    //1920*400 Photo Uploading
                    $post_img = Image::make($request->file('banner_img')->getRealPath())->resize(1920, 400);
                    $post_img->save(public_path() . '/images/services/banner/' . $ban_res);
                }else{
                    $request->session()->flash('error', 'Invalid Banner Image format Please uploaded only .png /.jpg /.jpeg extension Banner Image.');
                    return Redirect()->route('cms-page.create');
                }
            }else{
                $request->session()->flash('error', 'Banner Image mandatory field.');
                return Redirect()->route('cms-page.create');
            }

            if($request->file('adv_img') != ''){
                $ext = strtolower($request->file('adv_img')->getClientOriginalExtension());
                if ($request->file('adv_img')->getClientOriginalName() != "" && $ext == "png" || $ext == "jpg" || $ext == "jpeg") {
                    $ser_image = bcrypt(date('dmy').time().$request->input('title'));
                    $adv_res = preg_replace("/[^A-Za-z0-9\-]/", "", $ser_image).'.'.$request->file('adv_img')->getClientOriginalExtension();
                    //1110*250 Photo Uploading
                    $post_img = Image::make($request->file('adv_img')->getRealPath())->resize(1110, 250);
                    $post_img->save(public_path() . '/images/services/advertisement/' . $adv_res);
                }else{
                    $request->session()->flash('error', 'Invalid Image format Please uploaded only .png/.jpg/.jpeg extension Advertisement Image.');
                    return Redirect()->route('cms-page.create');
                }
            }else{
                $adv_res = '';
            }

            $btn_name = $request->input('btn_name');
            $ser = $request->input('service_request');
            if($ser == null){
                $service = 0;
                $from_time = NULL;
                $to_time = NULL;
            }else{
                $service = 1;
                $from_time = date("H:i", strtotime($request->input('from_time')));
                $to_time = date("H:i", strtotime($request->input('to_time')));
            }
            
        }else{
            $res = NULL;
            $ban_res = NULL;
            $adv_res = NULL;
            $btn_name = NULL;
            $service = 0;
            $from_time = NULL;
            $to_time = NULL;
        }
        $postAll = $request->all();
        //dd($postAll); exit;
        $postAll['image'] = $res;
        $postAll['banner_img'] = $ban_res;
        $postAll['adv_img'] = $adv_res;
        $postAll['slug'] = str_slug($request->input('title'));
        $postAll['btn_name'] = $btn_name;
        $postAll['service_request'] = $service;
        $postAll['from_time'] = ($request->input('from_time'))?$request->input('from_time'):NULL;
        $postAll['to_time'] = ($request->input('to_time'))?$request->input('to_time'):NULL;
        // dd($postAll);
        CmsPage::create($postAll);

        $request->session()->flash('success', 'CMS page added successfully.');
        return redirect()->route('cms-page.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function show(CmsPage $cmsPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function edit(CmsPage $cmsPage)
    {
        //$data = CmsPage::orderBy('id', 'DESC')->pluck('title', 'id')->prepend('Select Parent Menu...', '0');
        return view('admin.cms-page.edit',compact('cmsPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsPage $cmsPage)
    {
        //dd($cmsPage);
        $id = $cmsPage->id;
        $title = $request->title;
        $parent_id = $request->parent_id;
        $this->validate($request,[
            'title' => ['required',Rule::unique('cms_pages')->where(function ($query) use($title,$parent_id,$id) {
                                return $query->where('title', $title)->where('parent_id', $parent_id)->where('id', '!=', $id);
                            }),
                         ],
            'description' => 'required|string',
        ]);

        if($request->input('time24_status')==1 && $request->input('from_time') != null && $request->input('to_time') != null){
            $from_time = date("H:i", strtotime($request->from_time));
            $to_time = date("H:i", strtotime($request->to_time));

            if(strtotime($from_time) >= strtotime($to_time)){
                Session()->flash('error', 'Please check the booking time.');
                return back();
            }
        }
    if($request->input('parent_id') == 0){
        if($request->file('image') != ""){
            $data = CmsPage::where('id','=',$cmsPage->id)->first();
            //180*180 Unlink
            if(file_exists("public/images/services/" . $data->image)){
                if ($data->image != '') {
                  $unlink_img = "public/images/services/" . $data->image;
                  unlink($unlink_img);
                }
            }
            //Unlink code ends here
            $ser_image = bcrypt(date('dmy').time().$request->input('title'));
            $res = preg_replace("/[^A-Za-z0-9\-]/", "", $ser_image).'.'.$request->file('image')->getClientOriginalExtension();
            //180*180 Photo Uploading
            $post_img = Image::make($request->file('image')->getRealPath())->resize(180, 180);
            $post_img->save(public_path() . '/images/services/' . $res);
        }else{
            $res = $request->input('old_image');
        }

        if($request->file('banner_img') != ""){
            $data = CmsPage::where('id','=',$cmsPage->id)->first();
            //1920*400 Unlink
            if(file_exists("public/images/services/banner/" . $data->banner_img)){
                if ($data->banner_img != '') {
                  $unlink_bimg = "public/images/services/banner/" . $data->banner_img;
                  unlink($unlink_bimg);
                }
            }
            //Unlink code ends here
            $ban_img = bcrypt(date('dmy').time().$request->input('title'));
            $ban_res = preg_replace("/[^A-Za-z0-9\-]/", "", $ban_img).'.'.$request->file('banner_img')->getClientOriginalExtension();
            //1920*400 Photo Uploading
            $post_img = Image::make($request->file('banner_img')->getRealPath())->resize(1920, 400);
            $post_img->save(public_path() . '/images/services/banner/' . $ban_res);
        }else{
            $ban_res = $request->input('old_banner_img');
        }

        if($request->file('adv_img') != ""){
            $data = CmsPage::where('id','=',$cmsPage->id)->first();
            //1110*250 Unlink
            if(file_exists("public/images/services/advertisement/" . $data->adv_img)){
                if ($data->adv_img != '') {
                  $unlink_img = "public/images/services/advertisement/" . $data->adv_img;
                  unlink($unlink_img);
                }
            }
            //Unlink code ends here
            $ser_image = bcrypt(date('dmy').time().$request->input('title'));
            $adv_res = preg_replace("/[^A-Za-z0-9\-]/", "", $ser_image).'.'.$request->file('adv_img')->getClientOriginalExtension();
            //1110*250 Photo Uploading
            $post_img = Image::make($request->file('adv_img')->getRealPath())->resize(1110, 250);
            $post_img->save(public_path() . '/images/services/advertisement/' . $adv_res);
        }else{
            $adv_res = $request->input('old_adv_image');
        }

        $btn_name = $request->input('btn_name');
        $ser = $request->input('service_request');
        if($ser == null){
            $service = 0;
        }else{
            $service = 1;
        }
        //$time24_status = $request->input('time24_status');
		$time24_status = ($request->input('time24_status'))?$request->input('time24_status'):0;
        if($time24_status == 0){
            $from_time = NULL;
            $to_time = NULL;
        }else{
            $from_time = date("H:i", strtotime($request->input('from_time')));
            $to_time = date("H:i", strtotime($request->input('to_time')));
        }
    }else{
        $data = CmsPage::where('id','=',$cmsPage->id)->first();
        if($data->parent_id == 0){
            //180*180 Unlink
            if(file_exists("public/images/services/" . $data->image)){
                if ($data->image != '') {
                  $unlink_img = "public/images/services/" . $data->image;
                  unlink($unlink_img);
                }
            }
            //1920*400 Unlink
            if(file_exists("public/images/services/banner/" . $data->banner_img)){
                if ($data->banner_img != '') {
                  $unlink_bimg = "public/images/services/banner/" . $data->banner_img;
                  unlink($unlink_bimg);
                }
            }
             //1110*250 Unlink
            if(file_exists("public/images/services/advertisement/" . $data->adv_img)){
                if ($data->adv_img != '') {
                  $unlink_img = "public/images/services/advertisement/" . $data->adv_img;
                  unlink($unlink_img);
                }
            }
        }
        $res = NULL;
        $ban_res = NULL;
        $adv_res = NULL;
        $btn_name = NULL;
        $service = 0;
        $from_time = NULL;
        $to_time = NULL;
        $time24_status = 0;
    }

        $postAll = $request->all();
        $postAll['image'] = $res;
        $postAll['banner_img'] = $ban_res;
        $postAll['adv_img'] = $adv_res;
        $postAll['slug'] = str_slug($request->input('title'));
        $postAll['btn_name'] = $btn_name;
        $postAll['service_request'] = $service;
        $postAll['from_time'] = $from_time;
        $postAll['to_time'] = $to_time;
        $postAll['time24_status'] = $time24_status;
        //dd($postAll);
        $cmsPage->update($postAll);
        $request->session()->flash('success', 'CMS page updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkSer = \App\Services::where('cms_id', $id)->count();
        if($checkSer > 0){
            Session()->flash('error', 'Please first delete all services to delete this record.');
            return redirect()->route('cms-page.index');
        }

        $deleteCms = deleteCategoryTreeList($id);
        // $data = CmsPage::where('id','=',$id)->first();
        // if(file_exists("public/images/services/" . $data->image)){
        //     if ($data->image != '') 
        //     {
        //       $unlink_path = "public/images/services/" . $data->image;
        //       unlink($unlink_path);
        //     }
        // }

        // if(file_exists("public/images/services/banner/" . $data->banner_img)){
        //     if ($data->banner_img != '') 
        //     {
        //       $banner_unlink = "public/images/services/banner/" . $data->banner_img;
        //       unlink($banner_unlink);
        //     }
        // }

        // if(file_exists("public/images/services/advertisement/" . $data->adv_img)){
        //     if ($data->adv_img != '') 
        //     {
        //       $adv_unlink = "public/images/services/advertisement/" . $data->adv_img;
        //       unlink($adv_unlink);
        //     }
        // }
        // CmsPage::destroy($id);
        Session()->flash('success', 'CMS page deleted successfully.');
        return redirect()->route('cms-page.index');
    }
    
}
