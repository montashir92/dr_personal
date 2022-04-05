<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CaseCat;
use App\Models\Latestcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class LatestcaseController extends Controller
{
    
    public function index()
    {
        $lastests = Latestcase::latest()->get();
        return view('backend.pages.latestcase.index', compact('lastests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $casecats = CaseCat::all();
        return view('backend.pages.latestcase.create', compact('casecats'));
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
            'casecat_id' => 'required',
            'name' => 'required|max:60',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        try {
            $image = $request->file('image');
            $name_gen='case_'.uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(980,800)->save('backend/images/case/'.$name_gen);
            $save_url = 'backend/images/case/'.$name_gen;

            $latestcase = new Latestcase();
            $latestcase->casecat_id = $request->casecat_id;
            $latestcase->name = $request->name;
            $latestcase->description = $request->description;
            $latestcase->image = $save_url;
            $latestcase->save_by = Auth::user()->id;
            $latestcase->save();

            $notification=array(
                'message'=>'Data Added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            $notification=array(
                'message'=>'Data Not Added',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lastest = Latestcase::findOrFail($id);
        $casecats = CaseCat::all();
        return view('backend.pages.latestcase.edit', compact('lastest', 'casecats'));
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
            'casecat_id' => 'required|max:60',
            'name' => 'required|max:60',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif',
        ]);
        $old_img = $request->old_image;
        if($request->file('image')){
            unlink($old_img);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(980,800)->save('backend/images/case/'.$name_gen);
            $save_url = 'backend/images/case/'.$name_gen;
    
            $latestcase = Latestcase::findOrFail($id);
            $latestcase->casecat_id = $request->casecat_id;
            $latestcase->name = $request->name;
            $latestcase->description = $request->description;
            $latestcase->image = $save_url;
            $latestcase->updated_by = Auth::user()->id;
            $latestcase->save();
    
            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.lastestcases')->with($notification);
        }else{
            $latestcase = Latestcase::findOrFail($id);
            $latestcase->casecat_id = $request->casecat_id;
            $latestcase->name = $request->name;
            $latestcase->description = $request->description;
            $latestcase->updated_by = Auth::user()->id;
            $latestcase->save();
        }

        $notification=array(
            'message'=>'Data Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.lastestcases')->with($notification);
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $latestcase = Latestcase::find($request->id);
        if(!is_null($latestcase)){
            if (file_exists($latestcase->image) AND !empty($latestcase->image)) {
                unlink($latestcase->image);
            }

            $latestcase->delete();
        }

        $notification=array(
            'message'=>'Data Deleted Succefully..',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
