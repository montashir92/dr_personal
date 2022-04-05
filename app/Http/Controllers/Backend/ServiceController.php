<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class ServiceController extends Controller
{
    
    public function index()
    {
        $services = Service::latest()->get();
        return view('backend.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.services.create');
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
            'short_desc' => 'required',
            'description' => 'required',
            'icon' => 'required|max:100',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        $image = $request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(770,450)->save('backend/images/service/'.$name_gen);
        $save_url = 'backend/images/service/'.$name_gen;

        $services = new Service();
        $services->title = $request->title;
        $services->short_desc = $request->short_desc;
        $services->description = $request->description;
        $services->icon = $request->icon;
        $services->image = $save_url;
        $services->saved_by = Auth::user()->id;
        $services->save();

        $notification=array(
            'message'=>'Service Added Successfully',
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
        $service = Service::findOrFail($id);
        return view('backend.pages.services.edit', compact('service'));
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
            'short_desc' => 'required',
            'description' => 'required',
            'icon' => 'required|max:100',
            'image' => 'image|mimes:jpeg,jpg,png,gif',
        ]);

        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(770,450)->save('backend/images/service/'.$name_gen);
            $save_url = 'backend/images/service/'.$name_gen;

            $services = Service::findOrFail($id);
            $services->title = $request->title;
            $services->short_desc = $request->short_desc;
            $services->description = $request->description;
            $services->icon = $request->icon;
            $services->image = $save_url;
            $services->update_by = Auth::user()->id;
            $services->save();

            $notification=array(
                'message'=>'Service Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.services')->with($notification);
        } else {

            $services = Service::findOrFail($id);
            $services->title = $request->title;
            $services->short_desc = $request->short_desc;
            $services->description = $request->description;
            $services->icon = $request->icon;
            $services->update_by = Auth::user()->id;
            $services->save();
        }

        $notification=array(
            'message'=>'Service Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.services')->with($notification);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $service = Service::find($request->id);
        if(!is_null($service)){
            if (file_exists($service->image) AND !empty($service->image)) {
                unlink($service->image);
            }

            $service->delete();
        }

        $notification=array(
            'message'=>'Service Deleted Succefully..',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
