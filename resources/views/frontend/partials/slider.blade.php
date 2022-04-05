<section class="hero-area">
    <div class="shapes">
        <img src="{{ asset('frontend/image/hero/05.svg') }}" class="shape1" alt="#">
        <img src="{{ asset('frontend/image/hero/01.svg') }}" class="shape2" alt="#">
    </div>
    <div class="hero-slider">
        @foreach($sliders as $slider)
        <div class="single-slider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="hero-text">

                            <div class="section-heading">
                                <h2 class="wow fadeInLeft" data-wow-delay=".3s">{{ $slider->title }}
                                </h2>
                                <p class="wow fadeInLeft" data-wow-delay=".5s">{{ $slider->description }}</p>
                                <div class="button wow fadeInLeft" data-wow-delay=".7s">
                                    <a href="{{ $slider->book_appoint }}" class="btn">Book Appointment</a>
                                    <a href="{{ $slider->about_us }}" class="btn">About Us</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="hero-image wow fadeInRight" data-wow-delay=".5s">
                            <img src="{{ asset($slider->image) }}" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


      

    </div>
</section>