<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    
    public function index()
    {
        $about_count = About::count();
        $abouts = About::latest()->get();
        return view('backend.pages.about.index', compact('abouts', 'about_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.about.create');
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
            'title' => 'required|max:100',
            'description' => 'required',
            'short_desc' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        $image = $request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(808,768)->save('backend/images/about/'.$name_gen);
        $save_url = 'backend/images/about/'.$name_gen;

        $abouts = new About();
        $abouts->title = $request->title;
        $abouts->description = $request->description;
        $abouts->short_desc = $request->short_desc;
        $abouts->image = $save_url;
        $abouts->save();

        $notification=array(
            'message'=>'About Added Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::findOrfail($id);
        return view('backend.pages.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:100',
            'description' => 'required',
            'short_desc' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif',
        ]);

        $old_img = $request->old_image;

        if($request->file('image')){
            unlink($old_img);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(808,768)->save('backend/images/about/'.$name_gen);
            $save_url = 'backend/images/about/'.$name_gen;

            $abouts = About::findOrFail($id);
            $abouts->title = $request->title;
            $abouts->description = $request->description;
            $abouts->short_desc = $request->short_desc;
            $abouts->image = $save_url;
            $abouts->save();

            $notification=array(
                'message'=>'About Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.abouts')->with($notification);
        }else{
            $abouts = About::findOrFail($id);
            $abouts->title = $request->title;
            $abouts->description = $request->description;
            $abouts->short_desc = $request->short_desc;
            $abouts->save();
        }

        $notification=array(
            'message'=>'About Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.abouts')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $about = About::find($request->id);
        if(!is_null($about)){
            if (file_exists($about->image) AND !empty($about->image)) {
                unlink($about->image);
            }

            $about->delete();
        }

        $notification=array(
            'message'=>'About Deleted Succefully..',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
