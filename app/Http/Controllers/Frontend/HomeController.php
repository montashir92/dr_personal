<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\About;
use App\Models\Slider;
use App\Models\CaseCat;
use App\Models\Contact;
use App\Models\OurTeam;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Category;
use App\Models\OurPolicy;
use App\Models\Latestcase;
use App\Models\Appointment;
use function Ramsey\Uuid\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        $categories = Category::limit(5)->get();
        $about = About::first();
        $services = Service::limit(6)->get();
        $ourteams = OurTeam::orderBy('id', 'DESC')->limit(4)->get();
        $ourpolicy = OurPolicy::orderBy('id', 'ASC')->limit(3)->get();
        $blog_first = Blog::latest()->first();
        $latest_news = Blog::latest()->take(4)->get();
        $casecat = CaseCat::with('latestcase')->orderBy('name', 'ASC')->get();
        // $latestcase = Latestcase::with(['casecat'])->orderBy('id', 'DESC')->get();
       $latestcase = Latestcase::with('casecat')->get();

        return view('frontend.pages.index', compact('sliders', 'categories', 'about', 'services', 'ourteams', 'ourpolicy', 'blog_first', 'latest_news', 'casecat', 'latestcase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function service()
    {
        $services = Service::limit(6)->get();
        return view('frontend.pages.service', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        $about = About::first();
        $blog = Blog::latest()->paginate(5);
        $blog_popular = Blog::inRandomOrder()->limit(4)->get();
        return view('frontend.pages.blog', compact('blog', 'about', 'blog_popular'));
    }

    public function blogDetail($id)
    {
        $about = About::first();
        $blogdetail = Blog::findOrFail($id);
        $blog_popular = Blog::inRandomOrder()->limit(4)->get();
        return view('frontend.pages.blog_details', compact('blogdetail', 'about', 'blog_popular'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contactSend(Request $request)
    {
        $this->validate($request,[
            'fname' => 'required|max:50',
            'email' => 'required|max:100',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        // try {
            $contact = new Contact();
            $contact->fname = $request->fname;
            $contact->lname = $request->lname;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->save();
            return Redirect()->back()->with('success','message send successfully');
            
        // } catch (\Throwable $th) {
        //     $notification=array(
        //         'message'=>'Message Not Send',
        //         'alert-type'=>'error'
        //     );
        //     return Redirect()->back()->with($notification);
        // }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function appointment()
    {
        return view('frontend.pages.appointment_page');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendAppointment(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:60',
            'email' => 'required|max:100',
            'phone' => 'required|numeric',
            'date' => 'required',
        ]);

        try {
            $appointment = new Appointment();
            $appointment->name = $request->name;
            $appointment->email = $request->email;
            $appointment->phone = $request->phone;
            $appointment->date = $request->date;
            $appointment->message = $request->message;
            $appointment->save();

            $notification=array(
                'message'=>'Message Send Successfully',
                'alert-type'=>'success'
              );
            return Redirect()->back()->with($notification);

        } catch (\Throwable $th) {
            $notification=array(
                'message'=>'Message Not Send',
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
    public function detailService($id)
    {
        $service = Service::find($id);
        return view('frontend.pages.service_details', compact('service'));
    }

    // Latest Case Detail Method
    public function viewLatest($id)
    {
        $latestdetail = Latestcase::findOrFail($id);
        return view('frontend.pages.latest_detail', compact('latestdetail'));
    }
}
