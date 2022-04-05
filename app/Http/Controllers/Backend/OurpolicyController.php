<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OurPolicy;
use Illuminate\Http\Request;

class OurpolicyController extends Controller
{
    
    public function index()
    {
        $ourpolicy = OurPolicy::latest()->get();
        return view('backend.pages.policy.index', compact('ourpolicy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.policy.create');
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
            'icon' => 'required|max:100',
        ]);

        try {
            $ourpolicy = new OurPolicy();
            $ourpolicy->title = $request->title;
            $ourpolicy->description = $request->description;
            $ourpolicy->icon = $request->icon;
            $ourpolicy->save();

            $notification=array(
                'message'=>'Data Added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            $notification=array(
                'message'=>'Data Not Added Successfully',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
        
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
        $ourpolicy = OurPolicy::findOrFail($id);
        return view('backend.pages.policy.edit', compact('ourpolicy'));
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
            'icon' => 'required|max:100',
        ]);

        try {
            $ourpolicy = OurPolicy::findOrFail($id);
            $ourpolicy->title = $request->title;
            $ourpolicy->description = $request->description;
            $ourpolicy->icon = $request->icon;
            $ourpolicy->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.policy')->with($notification);
        } catch (\Throwable $th) {
            $notification=array(
                'message'=>'Data Not Updated',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $policy = OurPolicy::find($request->id);
        if(!is_null($policy)){
            $policy->delete();
        }

        $notification=array(
            'message'=>'Policy Deleted Succefully..',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
