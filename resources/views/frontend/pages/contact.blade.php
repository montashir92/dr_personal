@extends('frontend.layouts.master')
@section('main_content')


<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Contact Us</h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('index') }}">Home /</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head wow fadeInUp" data-wow-delay=".4s">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h3>Contact</h3>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">We’re connected all time to help our patients
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="form-main">
                        <div class="form-title">
                            <h2>Feel free to contact us for any query.</h2>
                        </div>
                        <form class="form" method="post" action="{{ route('contact.message') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <input name="fname" type="text" placeholder="Your First Name">
                                        @error('fname')<span style="color: red;">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <input name="lname" type="text" placeholder="Your Last Name">
                                        @error('lname')<span style="color: red;">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <input name="email" type="email" placeholder="Your Email">
                                        @error('email')<span style="color: red;">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <input name="phone" type="text" placeholder="Your Phone">
                                        @error('phone')<span style="color: red;">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <textarea name="message" placeholder="Your Message"></textarea>
                                        @error('message')<span style="color: red;">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="btn ">Submit Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="single-head">
                        <h2 class="main-title">Contact Information</h2>
                        <div class="single-info">
                            <div class="info-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <h3>Medical Address</h3>
                            <p>{{ $content->medical_address }}</p>
                        </div>
                        <div class="single-info">
                            <div class="info-icon">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <h3>Opening hours</h3>
                            <p>{!! $content->opening_hour !!}</p>
                            
                            
                        </div>
                        <div class="single-info">
                            <div class="info-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <h3>Email Support</h3>
                            <ul>
                                <li><a href="">{{ $content->email }}</a></li>
                            </ul>
                        </div>
                        <div class="single-info contact-social">
                            <h3>Social contact</h3>
                            <div class="info-icon">
                                <i class="fa-solid fa-mobile"></i>
                            </div>
                            <ul>
                                <li><a href="{{ $content->facebook }}" target="_blank"><i class="fa-brands fa-facebook-square"></i></a></li>
                                <li><a href="{{ $content->twitter }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="{{ $content->instagram }}" target="_blank"><i class="fa-brands fa-linkedin"></i></a></li>
                                <li><a href="{{ $content->linkedin }}" target="_blank"><i class="fa-brands fa-pinterest"></i></a></li>
                                <li><a href="{{ $content->youtube }}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="map-section">
    <div class="map-container">
        <div class="mapouter">
        <iframe src="{{ $content->map }}" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            
        </div>
    </div>
</div>


@endsection