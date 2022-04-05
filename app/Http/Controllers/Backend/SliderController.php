<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.pages.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.sliders.create');
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
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        $image = $request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(898,902)->save('backend/images/sliders/'.$name_gen);
        $save_url = 'backend/images/sliders/'.$name_gen;

        $sliders = new Slider();
        $sliders->title = $request->title;
        $sliders->description = $request->description;
        $sliders->book_appoint = $request->book_appoint;
        $sliders->about_us = $request->about_us;
        $sliders->image = $save_url;
        $sliders->save();

        $notification=array(
            'message'=>'Slider Added Successfully',
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
    public function inactive($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->status = 0;
        $slider->save();
        
        $notification=array(
            'message'=>'Slider Inactivated',
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
    public function active($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->status = 1;
        $slider->save();
        
        $notification=array(
            'message'=>'Slider Activated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.pages.sliders.edit', compact('slider'));
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
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif',
        ]);

        $old_img = $request->old_image;

        if($request->file('image')){
            unlink($old_img);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(898,902)->save('backend/images/sliders/'.$name_gen);
            $save_url = 'backend/images/sliders/'.$name_gen;

            $sliders = Slider::findOrFail($id);
            $sliders->title = $request->title;
            $sliders->description = $request->description;
            $sliders->book_appoint = $request->book_appoint;
            $sliders->about_us = $request->about_us;
            $sliders->image = $save_url;
            $sliders->save();

            $notification=array(
                'message'=>'Slider Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.sliders')->with($notification);
        }else{
            $sliders = Slider::findOrFail($id);
            $sliders->title = $request->title;
            $sliders->description = $request->description;
            $sliders->book_appoint = $request->book_appoint;
            $sliders->about_us = $request->about_us;
            $sliders->save();
        }

        $notification=array(
            'message'=>'Slider Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.sliders')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $slider = Slider::find($request->id);
        if(!is_null($slider)){
            if (file_exists($slider->image) AND !empty($slider->image)) {
                unlink($slider->image);
            }

            $slider->delete();
        }

        $notification=array(
            'message'=>'Slider Deleted Succefully..',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
