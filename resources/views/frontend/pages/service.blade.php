@extends('frontend.layouts.master')
@section('main_content')

@section('title') Dr. Rashed Mohammad - Service @endsection

<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Services</h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('index') }}">Home /</a></li> 
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </div>
</div>


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
                        <div class="col-lg-4 col-md-6 col-12 custom-padding-right">

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


@endsection