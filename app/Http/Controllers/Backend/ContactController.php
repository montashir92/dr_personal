<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index()
    {
        $conatct = Contact::latest()->get();
        return view('backend.pages.contacts.index', compact('conatct'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $conatct = Contact::find($request->id);
        if(!is_null($conatct)){
            $conatct->delete();
        }

        $notification=array(
            'message'=>'Contact Deleted Succefully..',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
