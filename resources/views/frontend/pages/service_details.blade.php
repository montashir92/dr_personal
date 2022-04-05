@extends('frontend.layouts.master')
@section('main_content')
@section('title') Dr. Rashed Mohammad - Service Details @endsection




<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Service Details</h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('index') }}">Home /</a></li>
                    <li>Service Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="service-details">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="service-sidebar">
                        
                        <div class="single-widget service-category">
                            <h3>Service Category</h3>
                            <ul>
                                <li>
                                    <a href="javascript:void(0)">All Services <i class="fa-solid fa-arrow-right-long float-end"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        Cardiyiology <i class="fa-solid fa-arrow-right-long float-end"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        Urology <i class="fa-solid fa-arrow-right-long float-end"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        Neurology <i class="fa-solid fa-arrow-right-long float-end"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        Gastrology <i class="fa-solid fa-arrow-right-long float-end"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        Dentist <i class="fa-solid fa-arrow-right-long float-end"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        Orthopedic <i class="fa-solid fa-arrow-right-long float-end"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="single-widget address">
                            <h3>Department Address</h3>
                            <ul>
                                <li><i class="fa-solid fa-location-dot" style="font-size: 24px;color: #006838;position: absolute;left: 0;
                                        top: 4px;"></i> {{ $content->medical_address }}
                                </li>
                                <li><i class="fa-solid fa-phone" style="font-size: 24px;color: #006838;position: absolute;left: 0;
                                        top: 4px;"></i> Coll Us Now!
                                    <a href="tel:+898 68679 575">{{ $content->phone }}</a>
                                </li>
                                <li><i class="fa-solid fa-envelope" style="font-size: 24px;color: #006838;position: absolute;left: 0;
                                        top: 4px;"></i> Do you have a Question?
                                    <a href="/cdn-cgi/l/email-protection#bbd2d5ddd4fbdcd6dad2d795d8d4d6">{{ $content->email }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="details-content">
                        <div class="thumb">
                            <img src="{{ asset($service->image) }}" width="770" height="450" alt="#">
                        </div>
                        <!-- <h3 class="title">Introduction to Neurology</h3> -->
                        <p>{!! $service->description !!}</p>
                        
                        
                        <!-- <ul class="list">
                            <li><i class="fa-solid fa-check" style="position: absolute;left: 0;top: 1px;color: #fff;font-size: 5px;height: 10px;width: 10px;background: #006838;text-align: center;line-height: 18px;border-radius: 0;padding: 4px;"></i> Cerebrovascular
                                disease, such as stroke</li>
                        </ul>
                        <blockquote>
                            <div class="icon">
                                <i class="fa-solid fa-quote-right fa-2x"></i>
                            </div>
                            <h4>"Perspiciatis undeomnis iste natus error sit voluptatem accusantium dolore Totam rem aperiam with a long list of products and never ending customer support."</h4>
                            <span>- Dr.Alice Williams</span>
                        </blockquote> -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection