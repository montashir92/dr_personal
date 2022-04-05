@extends('frontend.layouts.master')
@section('main_content')
@section('title') Dr. Rashed Mohammad - Latest Case Details @endsection



    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Latest Case Details</h1>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('index') }}">Home /</a></li>
                        <li>Latest Case Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="portfolio-details">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="details-content">
                            <div class="thumb">
                                <img src="{{ asset($latestdetail->image) }}" alt="#">
                            </div>
                            <h3 class="title">{{ $latestdetail->name }}</h3>
                            <p>{!! $latestdetail->description !!}</p>
                            
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="portfolio-sidebar">
                            
                            <div class="single-widget">
                                <h3>Research Details</h3>
                                <ul class="list-info">
                                    <li>
                                        <i class="fa-solid fa-file me-2"></i>
                                        <span>Researcher Name :</span> Dr.Alice Williams
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-user me-2"></i>
                                        <span>Client :</span> Mononucleosis Test
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-square-pen me-2"></i>
                                        <span>Category : </span> Vulputate Cursus
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-calendar-days me-2"></i>
                                        <span>Research Year :</span> 2023
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-location-dot me-2"></i>
                                        <span>Location : </span> Bulls Stadium, Califorina
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-circle-check me-2"></i>
                                        <span>Delivery Mode : </span> Stipulated Price
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection