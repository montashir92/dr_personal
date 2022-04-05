<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use Illuminate\Http\Request;
use Image;

class OurteamController extends Controller
{
    
    public function index()
    {
        $ourteams = OurTeam::latest()->get();
        return view('backend.pages.ourteams.index', compact('ourteams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.ourteams.create');
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
            'name' => 'required|max:60',
            'designation' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        $image = $request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(770,880)->save('backend/images/ourteam/'.$name_gen);
        $save_url = 'backend/images/ourteam/'.$name_gen;

        $ourteams = new OurTeam();
        $ourteams->name = $request->name;
        $ourteams->designation = $request->designation;
        $ourteams->facebook = $request->facebook;
        $ourteams->twitter = $request->twitter;
        $ourteams->instagrm = $request->instagrm;
        $ourteams->youtube = $request->youtube;
        $ourteams->image = $save_url;
        $ourteams->save();

        $notification=array(
            'message'=>'Data Added Successfully',
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
        $ourteam = OurTeam::findOrFail($id);
        return view('backend.pages.ourteams.edit', compact('ourteam'));
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
            'name' => 'required|max:60',
            'designation' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif',
        ]);

        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(770,880)->save('backend/images/ourteam/'.$name_gen);
            $save_url = 'backend/images/ourteam/'.$name_gen;

            $ourteams = OurTeam::findOrFail($id);
            $ourteams->name = $request->name;
            $ourteams->designation = $request->designation;
            $ourteams->facebook = $request->facebook;
            $ourteams->twitter = $request->twitter;
            $ourteams->instagrm = $request->instagrm;
            $ourteams->youtube = $request->youtube;
            $ourteams->image = $save_url;
            $ourteams->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.ourteams')->with($notification);
        } else {

            $ourteams = OurTeam::findOrFail($id);
            $ourteams->name = $request->name;
            $ourteams->designation = $request->designation;
            $ourteams->facebook = $request->facebook;
            $ourteams->twitter = $request->twitter;
            $ourteams->instagrm = $request->instagrm;
            $ourteams->youtube = $request->youtube;
            $ourteams->save();

        
        }

        $notification=array(
            'message'=>'Data Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.ourteams')->with($notification);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $ourteam = OurTeam::find($request->id);
        if(!is_null($ourteam)){
            if (file_exists($ourteam->image) AND !empty($ourteam->image)) {
                unlink($ourteam->image);
            }

            $ourteam->delete();
        }

        $notification=array(
            'message'=>'Data Deleted Succefully..',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
