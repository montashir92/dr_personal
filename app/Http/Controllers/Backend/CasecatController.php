<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CaseCat;
use Illuminate\Http\Request;

class CasecatController extends Controller
{
    
    public function index()
    {
        $casecats = CaseCat::latest()->get();
        return view('backend.pages.casecats.index', compact('casecats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.casecats.create');
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
        ]);


        try {
            $casecat = new CaseCat();
            $casecat->name = $request->name;
            $casecat->save();

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
        $casecat = CaseCat::findOrFail($id);
        return view('backend.pages.casecats.edit', compact('casecat'));
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
        ]);

        try {
            $casecat = CaseCat::findOrFail($id);
            $casecat->name = $request->name;
            $casecat->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.casecats')->with($notification);
        } catch (\Throwable $th) {
            $notification=array(
                'message'=>'Data Not Updated',
                'alert-type'=>'success'
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
        $casecat = CaseCat::find($request->id);
        if(!is_null($casecat)){
            $casecat->delete();
        }

        $notification=array(
            'message'=>'Datas Deleted Succefully..',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
