@extends('frontend.layouts.master')
@section('main_content')
@section('title') Dr. Rashed Mohammad - Blog Details @endsection


<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Blog Details</h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('index') }}">Home /</a></li>
                    <li>Blog Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="section blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-thumbnils">
                        <img src="{{ asset($blogdetail->image) }}" height="500" alt="#">
                    </div>
                    <div class="post-details">
                        <div class="detail-inner">
                            <h2 class="post-title">
                                <a href="blog-single.html">{{ $blogdetail->title }}</a>
                            </h2>

                            <ul class="meta-info">
                                <li>
                                    <a href="javascript:void(0)"><img src="{{ asset($about->image) }}" alt="#"> {{ Str::words($about->title, 2,'')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><i class="fa-solid fa-calendar"></i> {{ date('F j, Y', strtotime($blogdetail->created_at)) }} </a>
                                </li>
                            </ul>
                            <p>
                            {!! $blogdetail->long_desc !!}
                            </p>


                        </div>

                        <div class="post-comments">
                            <h3 class="comment-title"><span>Post comments</span></h3>
                            <ul class="comments-list">
                            <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="10"></div>
                                
                            </ul>
                        </div>
                        
                    </div>
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

                    <div class="widget help-call">
                        <h5 class="widget-title">Need Help?</h5>
                        <div class="inner">
                            <h3>
                                Online Help!
                                <span>{{ $content->phone }}</span>
                            </h3>
                        </div>
                    </div>

                </div>
            </aside>
        </div>
    </div>
</section>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0" nonce="rT6vtLWV"></script>
@endsection