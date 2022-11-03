<?php

namespace App\Http\Controllers;

use App\Testimonials;
use Illuminate\Http\Request;
use Image;

class TestimonialsController extends Controller
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
        $testimonials = Testimonials::orderBy('id', 'DESC')->get();
        return view('admin.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
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
        'name' => 'required|string',
        'description' => 'required|string',
        'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048'
        ]);

        //upload Image 
        if($request->file('image') != "") {
            $image_path = bcrypt(date('dmy').time().$request->input('name'));
            $testimonial_image = preg_replace("/[^A-Za-z0-9\-]/", "", $image_path).'.'.$request->file('image')->getClientOriginalExtension();
            //Thumb Photo Uploading
            $post_img = Image::make($request->file('image')->getRealPath())->resize(91, 91);
            $post_img->save(public_path() . '/images/testimonials/' . $testimonial_image);

            $testimonial_img = $request->all();
            $testimonial_img['image'] = $testimonial_image;
            Testimonials::create($testimonial_img);              
            $request->session()->flash('success', 'Testimonials added successfully.');
            return redirect()->route('testimonials.create');
        }
            Testimonials::create($request->all());             
            $request->session()->flash('success', 'Testimonials added successfully.');
            return redirect()->route('testimonials.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonials $testimonials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonials $testimonials,$id)
    {
        $testimonials = Testimonials::where('id', $id)->first();
        return view('admin.testimonials.edit',compact('testimonials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonials $testimonials,$id)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG|max:2048'
            ]);

            if($request->file('image') != ""){
                $data = Testimonials::where('id', $id)->first();
                if(file_exists("public/images/testimonials/" . $data->image)){
                    if ($data->image != '') 
                    {
                      $unlink_path = "public/images/testimonials/" . $data->image;
                      unlink($unlink_path);
                    }
                }
                //Unlink code ends here
                $image_path = bcrypt(date('dmy').time().$request->input('name'));
                $testimonial_image = preg_replace("/[^A-Za-z0-9\-]/", "", $image_path).'.'.$request->file('image')->getClientOriginalExtension();
                //Photo Uploading
                $post_img = Image::make($request->file('image')->getRealPath())->resize(91, 91);
                $post_img->save(public_path() . '/images/testimonials/' . $testimonial_image);

                $testimonial_img = $request->all();
                $testimonial_img['image'] = $testimonial_image;
                Testimonials::find($id)->update($testimonial_img);
                $request->session()->flash('success', 'Testimonials updated successfully.');
                return back();
            }
            Testimonials::find($id)->update($request->all());
            $request->session()->flash('success', 'Testimonials updated successfully.');
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonials  $testimonials
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonials $testimonials,$id)
    {
        $data = Testimonials::where('id','=',$id)->first();
        if(file_exists("public/images/testimonials/" . $data->image)){
            if ($data->image != '') 
            {
              $unlink_path = "public/images/testimonials/" . $data->image;
              unlink($unlink_path);
            }
        }
        Testimonials::destroy($id);
        Session()->flash('success', 'Testimonials deleted successfully.');
        return redirect()->route('testimonials.index');
    }
}
