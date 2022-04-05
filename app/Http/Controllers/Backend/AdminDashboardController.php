<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use PhpParser\Node\Stmt\TryCatch;

class AdminDashboardController extends Controller
{
    
    public function index()
    {
        return view('backend.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('backend.pages.profiles.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|numeric',
            'image' => 'image|mimes:jpg,png,gif',
        ]);

        try {
            $user = User::findOrFail(Auth::id());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $image = $request->file('image');
            if($image){
                $imgName = date('YmdHi').$image->getClientOriginalName();
                $image->move('backend/images/users', $imgName);
                if(file_exists('backend/images/users'.$user->image) AND !empty($user->image)){
                    unlink('backend/images/users'.$user->image);
                }
                $user->image = $imgName;
            }
            $user->save();

            $notification=array(
                'message'=>'Your Profile Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            $notification=array(
                'message'=>'Your Profile Not Updated',
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
    public function editPassword()
    {
        return view('backend.pages.profiles.edit_password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ]);
        // if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->old_password])){
        if(Hash::check($request->old_password, Auth::user()->password)){
            $user = User::findOrFail(Auth::id());
            $user->password = Hash::make($request->new_password);
            $user->save();
            
            // Auth::logout();
            // Auth::logout();
            
            $notification=array(
              'message'=>'Your Password Change Success. Now Login With New Password',
              'alert-type'=>'success'
            );
            return Redirect()->route('login')->with($notification);
        }else{
            $notification=array(
                'message'=>'Old Password Not Match',
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
    public function destroy($id)
    {
        //
    }
}
