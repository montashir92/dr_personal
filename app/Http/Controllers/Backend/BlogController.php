<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class BlogController extends Controller
{
    
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('backend.pages.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.blogs.create');
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
            'long_desc' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        $image = $request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(770,770)->save('backend/images/blogs/'.$name_gen);
        $save_url = 'backend/images/blogs/'.$name_gen;

        $blogs = new Blog();
        $blogs->title = $request->title;
        $blogs->short_desc = $request->short_desc;
        $blogs->long_desc = $request->long_desc;
        $blogs->image = $save_url;
        $blogs->save_by = Auth::user()->id;
        $blogs->save();

        $notification=array(
            'message'=>'Blog Added Successfully',
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
        $blog = Blog::findOrFail($id);
        $blog->status = 0;
        $blog->save();
        
        $notification=array(
            'message'=>'Blog Inactivated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function active($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = 1;
        $blog->save();
        
        $notification=array(
            'message'=>'Blog Activated',
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
        $blog = Blog::findOrFail($id);
        return view('backend.pages.blogs.edit', compact('blog'));
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
            'long_desc' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif',
        ]);

        $old_img = $request->old_image;

        if($request->file('image')){
            unlink($old_img);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(770,770)->save('backend/images/blogs/'.$name_gen);
            $save_url = 'backend/images/blogs/'.$name_gen;

            $blogs = Blog::findOrFail($id);
            $blogs->title = $request->title;
            $blogs->short_desc = $request->short_desc;
            $blogs->long_desc = $request->long_desc;
            $blogs->image = $save_url;
            $blogs->updated_by = Auth::user()->id;
            $blogs->save();

            $notification=array(
                'message'=>'Blog Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.blogs')->with($notification);
        }else{
            $blogs = Blog::findOrFail($id);
            $blogs->title = $request->title;
            $blogs->short_desc = $request->short_desc;
            $blogs->long_desc = $request->long_desc;
            $blogs->updated_by = Auth::user()->id;
            $blogs->save();
        }

        $notification=array(
            'message'=>'Blog Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.blogs')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $blog = Blog::find($request->id);
        if(!is_null($blog)){
            if(file_exists('backend/images/blogs/'.$blog->image) AND !empty($blog->image)){
                unlink('backend/images/blogs/'.$blog->image);
            }
            $blog->delete();
        }

        $notification=array(
            'message'=>'Blog Deleted Succefully..',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
