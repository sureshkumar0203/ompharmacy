<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $videos = Video::orderBy('id', 'DESC')->get();
        return view('admin.video.index',compact('videos'));
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(Request $request)
    {
        $ext = strtolower($request->file('video')->getClientOriginalExtension());
        $size = round($request->file('video')->getClientSize()/1024/1024);
		
        if ($request->file('video') != "" && $ext != "mp4" && $ext != "mov") {
            $request->session()->flash('error', 'Please upload correct file format.');
            return back();
        }
        if($size > 10){
            $request->session()->flash('error', 'Maximum upload file size should be less than 10MB.');
            return back();
        }
        $data = Video::where('id', 1)->first();
        $video = $request->file('video');
        $path = bcrypt(date('dmy').time());
        $name = preg_replace("/[^A-Za-z0-9\-]/", "", $path).'.'.$video->getClientOriginalExtension();
        $destinationPath = public_path('/video');
        $video->move($destinationPath, $name);
        $video_data = $request->all();
        $video_data['video'] = $name;
        Video::create($video_data);
        $request->session()->flash('success', 'Video Added successfully!');
        return back();
    }

    public function edit(Video $video){
        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $id = $video->id;
       /* $this->validate($request,[
        'video' => 'required|mimes:mp4,mov,MOV'
        ]);*/
		
            $ext = strtolower($request->file('video')->getClientOriginalExtension());
            $size = round($request->file('video')->getClientSize()/1024/1024);
            if ($request->file('video') != "" && $ext != "mp4" && $ext != "mov") {
                $request->session()->flash('error', 'Please upload correct file format.');
                return view('admin.video');
            }
            if($size > 10){
                $request->session()->flash('error', 'Maximum upload file size should be less than 10MB.');
                return view('admin.video');
            }
			
            $data = Video::where('id', $video->id)->first();
            if(file_exists("public/video/" . $data->video)){
                if ($data->video != '') 
                {
                  $unlink_path = public_path('/video/'.$data->video);
                  unlink($unlink_path);
                }
            }
			
            $video = $request->file('video');
            $path = bcrypt(date('dmy').time());
            $name = preg_replace("/[^A-Za-z0-9\-]/", "", $path).'.'.$video->getClientOriginalExtension();
            $destinationPath = public_path('/video');
            $video->move($destinationPath, $name);
            $video_data = $request->all();
            $video_data['video'] = $name;
            Video::find($id)->update($video_data);
            $request->session()->flash('success', 'Video Updated successfully!');
            return back();
    }

    public function destroy(Video $video)
    {
        $id = $video->id;
        if(file_exists("public/video/" . $video->video)){
            if ($video->video != '') 
            {
              $unlink_path = "public/video/" . $video->video;
              unlink($unlink_path);
            }
        }
        Video::destroy($id);
        Session()->flash('success', 'Video deleted successfully.');
        return redirect()->route('video.index');
    }

}
