@extends('frontend.layouts.master')
@section('main_content')
@section('title') Dr. Rashed Mohammad - Home @endsection

@include('frontend.partials.slider')


<section class="appointment">
    <div class="container">

        <div class="appointment-form">
            <div class="row ">
                <div class="col-lg-6 col-12">
                    <div class="appointment-title">
                        <span>Appointment</span>
                        <h2>Book An Appointment</h2>
                        <p>Please feel welcome to contact our friendly reception staff with any general or medical enquiry. Our doctors will receive or return any urgent calls.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 custom-padding">
                    <a href="{{ route('appointments') }}">
                    <div class="appointment-btn button">
                        <button class="btn">Get Appointment</button>
                    </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="about-us section">
    <div class="container ">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="content-left wow fadeInLeft" data-wow-delay=".3s ">
                    <img src="{{ asset($about->image) }}" alt="#">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">

                <div class="content-right wow fadeInRight" data-wow-delay=".5s">
                    <span class="sub-heading ">About</span>
                    <h2>{{ $about->title }}</h2>
                    <p>{!! $about->description !!}</p>
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <ul class="list ">
                                <li class="about-iconn">
                                    <!-- <i class="fa-solid fa-square-check pe-3 text-success"></i> -->
                                    {!! $about->short_desc !!}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="button">
                        <a href="about-us.html" class="btn">More About Us</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>


<section class="departments section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Departments</h3>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Specialities available at MediGrids</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach($categories as $key => $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $key == 0 ? 'active' : '' }}" id="tab_{{$category->id}}" data-bs-toggle="tab" data-bs-target="#category_{{$category->id}}" type="button" role="tab" aria-controls="cardiology" aria-selected="true">
                            <!-- <i class="lni lni-heart"></i>  -->
                            {{ $category->name }}
                        </button>
                    </li>
                    @endforeach
                </ul>

                <div class="tab-content" id="myTabContent">

                    @foreach($categories as $key => $category)
                    <div class="tab-pane fade {{ $key == 0 ? 'active show' : '' }} " id="category_{{$category->id}}" role="tabpanel" aria-labelledby="">
                        <div class="department-content">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="image">
                                        <img src="{{ asset($category->image) }}" class="w-100" alt="#">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="text">
                                        <h3>{{ $category->name }}</h3>
                                        <ul class="list">
                                            <li>
                                                <!--<i class="lni lni-checkbox"></i>-->
                                                {!! $category->short_desc !!}
                                            </li>
                                        </ul>
                                        <p>{!! $category->long_desc !!}</p>
                                        <div class="button">
                                            <a href="" class="btn">View Speciality</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>


<section class="our-achievement section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-12">
                <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                    <i class="fa-solid fa-newspaper" style="height: 70px;width: 50px;line-height: 30px;text-align: center;display: inline-block;border-radius: 0%;background-color: #fff;font-size: 5px;color: #006838;margin-bottom: 25px;padding:
                                        5px 15px;"></i>
                    <h3 class="counter"><span id="count1" class="countup">0</span></h3>
                    <p>Hospital Rooms</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                    <i class="fa-solid fa-stethoscope" style="height: 70px;width: 50px;line-height: 30px;text-align: center;display: inline-block;border-radius: 0%;background-color: #fff;font-size: 5px;color: #006838;margin-bottom: 25px;padding:
                                        5px 15px;"></i>
                    <h3 class="counter"><span id="count2" class="countup">0</span></h3>
                    <p>Specialist Doctors</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                    <i class="fa-solid fa-face-smile" style="height: 70px;width: 50px;line-height: 30px;text-align: center;display: inline-block;border-radius: 0%;background-color: #fff;font-size: 5px;color: #006838;margin-bottom: 25px;padding:
                                        5px 15px;"></i>
                    <h3 class="counter"><span id="count3" class="countup">0</span></h3>
                    <p>Happy Patients</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                    <i class="fa-solid fa-certificate" style="height: 70px;width: 50px;line-height: 30px;text-align: center;display: inline-block;border-radius: 0%;background-color: #fff;font-size: 5px;color: #006838;margin-bottom: 25px;padding:
                                        5px 15px;"></i>
                    <h3 class="counter"><span id="count4" class="countup">0</span></h3>
                    <p>Years of Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="services section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Services</h3>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Services Provided By MediGrids</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="services-content">
                    <div class="row">
                        @foreach($services as $service)
                        <div class="col-lg-4 col-md-6 col-12 custom-padding-right mb-3">

                            <div class="single-list custom-border-right custom-border-bottom wow fadeInUp" data-wow-delay=".2s">
                                <img class="shape1" src="{{ asset('frontend/image/service/shape1.svg') }}" alt="#">
                                <img class="shape2" src="{{ asset('frontend/image/service/shape2.svg') }}" alt="#">
                                <i class="{{ $service->icon }}" style="color: #88c250;font-size: 25px;display: inline-block;margin-bottom: 30px;height: 50px;width: 50px;line-height: 50px;text-align: center;border-radius: 0;-webkit-transition:
                                        all .4s ease;transition: all .4s ease;background-color: #006838;color: #fff;padding: 10px;"></i>
                                <h4><a href="{{ route('service.show', $service->id) }}">{{ $service->title }}</a></h4>
                                <p>{!! $service->short_desc !!}</p>
                            </div>

                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="portfolio-section section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Projects</h3>
                    <h2 class="wow fadeInU" data-wow-delay=".4s">Here is Some of our <br>Latest Cases</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>

        
        <ul class="nav nav-tabs nav-tabs-bordered navextra">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#caseAll">Show All</button>
            </li>
            @foreach($casecat as $item)           
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#case{{ $item->id }}">{{ $item->name }}</button>
            </li>
            @endforeach

        </ul>

        <div class="tab-content pt-2">     
            
                <div class="tab-pane fade profile-overview active show" id="caseAll">  
                    <div class="row row-cols-md-3 row-cols-1 mt-4">
                        @if($latestcase->count()>0)
                            @foreach($latestcase as $itemtwo)
                            <div class="col">
                                <div class="portfolio-item-wrapper">
                                    <div class="portfolio-img">
                                        <img src="{{ asset($itemtwo->image) }}" alt="#">
                                    </div>
                                    <div class="pf-content">
                                        <a href="{{ route('latestcase.details', $itemtwo->id) }}" class="detail-btn"><i class="fa-solid fa-link"></i></a>
                                        <span class="category">Cloud Services</span>
                                        <h4><a href="{{ route('latestcase.details', $itemtwo->id) }}">{{ $itemtwo->name }}</a></h4>
                                    </div>
                                </div>
                            </div>  
                            @endforeach
                        @endif                
                    </div>
                </div> 


                @foreach($casecat as $key=>$item)  
                <div class="tab-pane fade profile-overview" id="case{{$item->id}}">  
                    <div class="row row-cols-md-3 row-cols-1 mt-4">
                        @if($item->latestcase->count() > 0)
                            @foreach($item->latestcase as $itemtwo)
                            <div class="col">
                                <div class="portfolio-item-wrapper">
                                    <div class="portfolio-img">
                                        <img src="{{ asset($itemtwo->image) }}" alt="#">
                                    </div>
                                    <div class="pf-content">
                                        <a href="{{ route('latestcase.details', $itemtwo->id) }}" class="detail-btn"><i class="fa-solid fa-link"></i></a>
                                        <span class="category">Cloud Services</span>
                                        <h4><a href="{{ route('latestcase.details', $itemtwo->id) }}">{{ $itemtwo->name }}</a></h4>
                                    </div>
                                </div>
                            </div>  
                            @endforeach
                        @endif                
                    </div>
                </div> 
                @endforeach 
            
        </div>
    </div>
</section>



<section class="doctors section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Doctors</h3>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Outstanding Team Is Active To Help You!</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($ourteams as $ourteam)
            <div class="col-lg-3 col-md-6 col-12">

                <div class="single-doctor wow fadeInUp" data-wow-delay=".2s">
                    <div class="image">
                        <img src="{{ asset($ourteam->image) }}" alt="#">
                        <ul class="social">
                            <li><a href="{{ $ourteam->facebook }}"><i class="fa-brands fa-facebook-f text-white"></i></a></li>
                            <li><a href="{{ $ourteam->twitter }}"><i class="fa-brands fa-twitter text-white"></i></a></li>
                            <li><a href="{{ $ourteam->instagrm }}"><i class="fa-brands fa-instagram text-white"></i></a></li>
                            <li><a href="{{ $ourteam->youtube }}"><i class="fa-brands fa-youtube text-white"></i></a></li>
                        </ul>
                    </div>
                    <div class="content">
                        <h5>{{ $ourteam->designation }}</h5>
                        <h3><a href="doctor-details.html">{{ $ourteam->name }}</a></h3>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="how-works">
    <div class="container-fluid">
        <div class="row">
            @foreach($ourpolicy as $key => $policy)
            <div class="col-lg-4 col-md-4 col-12 p-0">

                <div class="single-work {{ $key == 0 ? 'first' : ''}} {{ $key == 1 ? 'middle' : ''}} {{ $key == 2 ? 'last' : ''}}">
                    <div class="main-icon">
                        <i class="{{ $policy->icon }}"></i>
                    </div>
                    <h3>{{ $policy->title }}</h3>
                    <p>{{ $policy->description }}</p>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>


<div class="latest-news-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Blogs</h3>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">latest news</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($latest_news as $item)
            <div class="col-lg-6 col-md-12 col-12">

                <div class="single-news wow fadeInUp" data-wow-delay=".2s">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 pr-0">
                            <div class="image">
                                <a href="{{ route('blog.details', $item->id) }}"><img src="{{ asset($item->image) }}" alt="#"></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 pl-0">
                            <div class="content">
                                <h2 class="title"><a href="{{ route('blog.details', $item->id) }}">{{ $item->title }}</a></h2>
                                <p>{!! Str::words($item->short_desc, 13, '...') !!}</p>
                                <ul class="meta-info">
                                    <li>
                                        <a href=""><img src="{{ asset($about->image) }}" alt="#"> {{ Str::words($about->title, 2,'')}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" style="font-size: 10px;">{{ date('F j, Y',strtotime($item->created_at )) }} </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

            <!-- <div class="col-lg-6 col-md-12 col-12">

                <div class="single-news style2 wow fadeInUp" data-wow-delay=".4s">
                    <div class="row">
                        <div class="col-12">
                            <div class="image1">
                                <a href="{{ route('blog.details', $blog_first->id) }}"><img src="{{ asset($blog_first->image) }}" alt="#"></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="content">
                                <h2 class="title"><a href="{{ route('blog.details', $blog_first->id) }}">{{ $blog_first->title }}</a></h2>
                                <p>{!! $blog_first->short_desc !!}</p>
                                <ul class="meta-info">
                                    <li>
                                        <a href="{{ route('blog.details', $blog_first->id) }}"><img src="{{ asset($about->image) }}" alt="#"> {{ Str::words($about->title, 2,'')}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">{{ date('F j, Y',strtotime($blog_first->created_at )) }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div> -->
        </div>
    </div>
</div>
@endsection