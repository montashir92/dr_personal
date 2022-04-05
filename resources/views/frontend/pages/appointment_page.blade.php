@extends('frontend.layouts.master')
@section('main_content')

<div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Appointment</h1>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('index') }}">Home /</a></li>
                    <li>appointment</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="appointment page section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">

                <div class="appointment-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="appointment-title">
                                <h2>Book An Appointment</h2>
                                <p>Please feel welcome to contact our friendly reception staff with any general or medical enquiry. Our doctors will receive or return any urgent calls.</p>
                            </div>
                        </div>
                    </div>
                    <form class="row" action="{{ route('send.appointment') }}" method="post">
                        @csrf

                        <div class="col-lg-6 col-md-6 col-12 p-0">
                            <div class="appointment-input">
                                <label for="name"><i class="fa-solid fa-user"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name">
                                @error('name')<span style="color: red;">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 p-0">
                            <div class="appointment-input">
                                <label for="email"><i class="fa-solid fa-envelope"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email">
                                @error('email')<span style="color: red;">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 p-0">
                            <div class="appointment-input">
                                <label for="number"><i class="fa-solid fa-phone"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone Number">
                                @error('phone')<span style="color: red;">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-12 p-0">
                            <div class="appointment-input">
                                <label for="date"><i class="fa-solid fa-user"></i></label>
                                <input type="date" name="date" id="date">
                                @error('date')<span style="color: red;">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 p-0">
                            <div class="appointment-input">
                                <textarea name="message" placeholder="Write Your Message Here....."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 p-0">
                            <div class="appointment-btn button">
                                <button class="btn" type="submit">Get Appointment</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection