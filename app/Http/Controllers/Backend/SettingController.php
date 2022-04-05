<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    
    public function index()
    {
        $setting = Setting::first();
        return view('backend.pages.settings.index', compact('setting'));
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
        
        $setting = Setting::find($id);
        $setting->email = $request->email;
        $setting->address = $request->address;
        $setting->medical_address = $request->medical_address;
        $setting->opening_hour = $request->opening_hour;
        $setting->phone = $request->phone;
        $setting->logo_title = $request->logo_title;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->linkedin = $request->linkedin;
        $setting->youtube = $request->youtube;
        $setting->map = $request->map;

        $img = $request->file('logo');
        if($img){
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('backend/images/logo/', $imgName);
            if(file_exists('backend/images/logo/'.$setting->logo) AND !empty($setting->logo)){
                unlink('backend/images/logo/'.$setting->logo);
            }
            $setting['logo'] = $imgName;
        }
        $setting->save();

        $notification=array(
            'message'=>'Setting Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }

    
}
