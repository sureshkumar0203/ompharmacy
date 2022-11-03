<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
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
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
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
            'title' => 'required|string|max:250|unique:blogs',
            'sort_description' => 'required|string',
            'description' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_keyword' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048',
            'author' => 'required|string'
        ]);

        //upload Image
        $blog_image = bcrypt(date('dmy').time().$request->input('title'));
        $res = preg_replace("/[^A-Za-z0-9\-]/", "", $blog_image).'.'.$request->file('image')->getClientOriginalExtension();
        //750*270 Photo Uploading
        $post_img = Image::make($request->file('image')->getRealPath())->resize(750, 270);
        $post_img->save(public_path() . '/blog/' . $res);
        //90*69 Photo Uploading
        $thumb_img = Image::make($request->file('image')->getRealPath())->resize(90, 69);
        $thumb_img->save(public_path() . '/blog/thumb/' . $res);

        $postAll = $request->all();
        $postAll['image'] = $res;
        $postAll['slug'] = str_slug($request->input('title'));
        Blog::create($postAll);
        $request->session()->flash('success', 'Blog added successfully.');
        return redirect()->route('blogs.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request,[
            'title' => 'required|string|max:250|unique:blogs,title,'.$blog->id,
            'sort_description' => 'required|string',
            'description' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_keyword' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'author' => 'required|string',
            'image' => 'image|nullable|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048'
        ]);

            if($request->file('image') != ""){
              $data = Blog::where('id','=',$blog->id)->first();
              //750*270 Unlink
              if(file_exists("public/blog/" . $data->image)){
                  if ($data->image != '') 
                  {
                    $unlink_img = "public/blog/" . $data->image;
                    unlink($unlink_img);
                  }
              }
              //90*69 Unlink
              if(file_exists("public/blog/thumb/" . $data->image)){
                  if ($data->image != '') 
                  {
                    $unlink_thumb = "public/blog/thumb/" . $data->image;
                    unlink($unlink_thumb);
                  }
              }
              //Unlink code ends here
              $blog_image = bcrypt(date('dmy').time().$request->input('title'));
              $res = preg_replace("/[^A-Za-z0-9\-]/", "", $blog_image).'.'.$request->file('image')->getClientOriginalExtension();
              //750*270 Photo Uploading
              $post_img = Image::make($request->file('image')->getRealPath())->resize(750, 270);
              $post_img->save(public_path() . '/blog/' . $res);
              //90*69 Photo Uploading
              $thumb_img = Image::make($request->file('image')->getRealPath())->resize(90, 69);
              $thumb_img->save(public_path() . '/blog/thumb/' . $res);

              $postAll = $request->all();
              $postAll['image'] = $res;
              $postAll['slug'] = str_slug($request->input('title'));
              $blog->update($postAll);
              $request->session()->flash('success', 'Blog updated successfully.');
              return back();
            }
            $postAll = $request->all();
            $postAll['slug'] = str_slug($request->input('title'));
            $blog->update($postAll);
            $request->session()->flash('success', 'Blog updated successfully.');
            return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blogComment = \App\BlogComment::where('blog_id', $blog->id)->count();
        if($blogComment > 0){
            Session()->flash('error', 'Please first delete all blog comment to delete this record.');
            return redirect()->route('blogs.index');
        }
        $data = Blog::where('id','=',$blog->id)->first();
        //750*270 Unlink
        if(file_exists("public/blog/" . $data->image)){
            if ($data->image != '') 
            {
              $unlink_img = "public/blog/" . $data->image;
              unlink($unlink_img);
            }
        }
        //90*69 Unlink
        if(file_exists("public/blog/thumb/" . $data->image)){
            if ($data->image != '') 
            {
              $unlink_thumb = "public/blog/thumb/" . $data->image;
              unlink($unlink_thumb);
            }
        }
        Blog::destroy($blog->id);
        Session()->flash('success', 'Blog deleted successfully.');
        return redirect()->route('blogs.index');
    }
}
