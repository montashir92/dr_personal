<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.categories.create');
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
            'short_desc' => 'required',
            'long_desc' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        $image = $request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1026,991)->save('backend/images/categories/'.$name_gen);
        $save_url = 'backend/images/categories/'.$name_gen;

        $categories = new Category();
        $categories->name = $request->name;
        $categories->short_desc = $request->short_desc;
        $categories->long_desc = $request->long_desc;
        $categories->image = $save_url;
        $categories->save();

        $notification=array(
            'message'=>'Category Added Successfully',
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
        $category = Category::findOrFail($id);
        $category->status = 0;
        $category->save();
        
        $notification=array(
            'message'=>'Category Inactivated',
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
        $category = Category::findOrFail($id);
        $category->status = 1;
        $category->save();
        
        $notification=array(
            'message'=>'Category Activated',
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
        $category = Category::findOrFail($id);
        return view('backend.pages.categories.edit', compact('category'));
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
            'short_desc' => 'required',
            'long_desc' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif',
        ]);

        $old_img = $request->old_image;

        if($request->file('image')){
            unlink($old_img);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1026,991)->save('backend/images/categories/'.$name_gen);
            $save_url = 'backend/images/categories/'.$name_gen;

            $categories = Category::findOrFail($id);
            $categories->name = $request->name;
            $categories->short_desc = $request->short_desc;
            $categories->long_desc = $request->long_desc;
            $categories->image = $save_url;
            $categories->save();

            $notification=array(
                'message'=>'Category Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.categories')->with($notification);
        }else{
            $categories = Category::findOrFail($id);
            $categories->name = $request->name;
            $categories->short_desc = $request->short_desc;
            $categories->long_desc = $request->long_desc;
            $categories->save();
        }

        $notification=array(
            'message'=>'Category Updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.categories')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        if(!is_null($category)){
            if (file_exists($category->image) AND !empty($category->image)) {
                unlink($category->image);
            }

            $category->delete();
        }

        $notification=array(
            'message'=>'Category Deleted Succefully..',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
