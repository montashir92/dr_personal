@extends('frontend.layouts.master')
@section('main_content')
@section('title') Dr. Rashed Mohammad - Blog @endsection


<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Blog View</h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('index') }}">Home /</a></li>
                    <li>Blog </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="section latest-news-area blog-list">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">

                 @foreach($blog as $item)
                <div class="single-news">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-12 pr-0">
                            <div class="image">
                                <a href="{{ route('blog.details', $item->id) }}"><img src="{{ asset($item->image) }}" alt="#"></a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-12  pl-0">
                            <div class="content">
                                <h2 class="title"><a href="{{ route('blog.details', $item->id) }}">{{ $item->title }}</a>
                                </h2>
                                <p>{!! $item->short_desc !!}</p>
                                <ul class="meta-info">
                                    <li>
                                        <a href="javascript:void(0)"><img src="{{ asset($about->image) }}" alt="#"> {{ Str::words($about->title, 2,'')}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">{{ date('F j, Y', strtotime($item->created_at)) }} </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="pagination left blog-grid-page">
                    
                    <ul class="pagination-list p-0 m-0">
                        {!! $blog->links() !!}
                    </ul>
                </div>

            </div>
            <aside class="col-lg-4 col-md-12 col-12">
                <div class="sidebar blog-grid-page">

                    <div class="widget popular-feeds">
                        <h5 class="widget-title">Popular Feeds</h5>
                        <div class="popular-feed-loop">
                            @foreach($blog_popular as $item)
                            <div class="single-popular-feed">
                                <div class="feed-desc">
                                    <a class="feed-img" href="{{ route('blog.details', $item->id) }}">
                                        <img src="{{ asset($item->image) }}" alt="#">
                                    </a>
                                    <h6 class="post-title"><a href="{{ route('blog.details', $item->id) }}">{{ $item->title }}</a></h6>
                                    <span class="time"><i class="fa-solid fa-calendar"></i> {{ date('F j, Y',strtotime($item->created_at )) }}</span>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>


                    <div class="widget categories-widget">
                        <h5 class="widget-title">Categories</h5>
                        <ul class="custom">
                            <li>
                                <a href="javascript:void(0)">Finance</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Marketing</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Operations</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Strategy</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">People</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Jobs</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </aside>
        </div>
    </div>
</section>


@endsection