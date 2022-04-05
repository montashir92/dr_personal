<footer class="footer overlay">

        <!-- <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="cta">
                            <h3>Need Help?</h3>
                            <p>Please feel free to contact our friendly reception staff with any medical enquiry, or call <a href="">{{ $content->phone }}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form">
                            <h3>Subscribe Newsletter</h3>
                            <form action="#" method="get" target="_blank" class="newsletter-form">
                                <input name="EMAIL" placeholder="Your email address" type="email">
                                <div class="button">
                                    <button class="btn">Subscribe<span class="dir-part"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer f-about">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="{{ asset('backend/images/logo/'.$content->logo) }}" alt="#">
                                </a>
                            </div>
                            <p class="text-black bg-none">{!! Str::words($abouts->description, 20, '...') !!}</p>
                            <ul class="social">
                                <li><a href="{{ $content->facebook }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="{{ $content->twitter }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="{{ $content->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="{{ $content->linkedin }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a href="{{ $content->youtube }}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer f-link">
                            <h3>Useful Links</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        <li><a href="">About</a></li>
                                        <li><a href="">Team</a></li>
                                        <li><a href="">Before After</a></li>
                                        <li><a href="">Cost Calculator</a></li>
                                        <li><a href="">Working Hours</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        <li><a href="">Appointment</a></li>
                                        <li><a href="">Gallery</a></li>
                                        <li><a href="">Timetable</a></li>
                                        <li><a href="">Departments</a></li>
                                        <li><a href="">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer opening-hours">
                            <h3>Opening Hours</h3>
                            <p>{!! $content->opening_hour !!}</p>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer last f-contact">
                            <h3>Contact</h3>
                            <ul>
                                <li><i class="fa-solid fa-location-pin" style="color: #fff;position: absolute;left: 0;top: 5px;font-size: 14px;"></i> {{ $content->address }}
                                </li>
                                <li><i class="fa-solid fa-phone" style="color: #fff;position: absolute;left: 0;top: 5px;font-size: 14px;"></i> Tel. {{ $content->phone }} </li>
                                <li><i class="fa-solid fa-envelope" style="color: #fff;position: absolute;left: 0;top: 5px;font-size: 14px;"></i> Mail. {{ $content->email }}</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col d-flex justify-content-center">
                            <div class="content">
                                <p class="copyright-text">Designed and Developed by <a href="http://linktechbd.com/" rel="nofollow " target="_blank">Link-up Technology</a>
                                </p>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-6 col-12">
                            <ul class="extra-link">
                                <li><a href="javascript:void(0)">Terms & Conditions</a></li>
                                <li><a href="javascript:void(0)">FAQ</a></li>
                                <li><a href="javascript:void(0)">Privacy Policy</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

    </footer>