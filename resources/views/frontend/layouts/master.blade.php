<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/image/favicon.svg') }}" />


    <link href="{{ asset('frontend/css/css2.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/css3.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <link href="{{ asset('frontend/css/toastr.min.css') }}" rel="stylesheet" id="galio-skin">
    
</head>

<body>
    

    @include('frontend.partials.header')

    @yield('main_content')


    @include('frontend.partials.footer')


    <a href="#" class="scroll-top">
        <i class="fa-solid fa-chevron-up"></i>
    </a>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script data-cfasync="false" src="{{ asset('frontend/js/email-decode.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/all.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('frontend/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/toastr.min.js') }}"></script>
    
    
    <script type="text/javascript">
        //======== Hero Slider
        var slider = new tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: [
                '<i class="fa-solid fa-chevron-left"></i>',
                '<i class="fa-solid fa-chevron-right"></i>'
            ],
            responsive: {
                1200: {
                    items: 1,
                },
                992: {
                    items: 1,
                },
                0: {
                    items: 1,
                }

            }
        });
        //========= testimonial 
        tns({
            container: '.testimonial-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1170: {
                    items: 3,
                }
            }
        });

        //====== counter up 
        var cu = new counterUp({
            start: 0,
            duration: 2000,
            intvalues: true,
            interval: 100,
            append: "",
        });
        cu.start();
        //========= glightbox
        GLightbox({
            'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
            'type': 'video',
            'source': 'youtube',
            'width': 900,
            'autoplayVideos': true,
        });
        //============== isotope masonry js with imagesloaded
        imagesLoaded('#container', function() {
            var elem = document.querySelector('.grid');
            var iso = new Isotope(elem, {
                // options
                itemSelector: '.grid-item',
                masonry: {
                    columnWidth: '.grid-item'
                }
            });

            let filterButtons = document.querySelectorAll('.portfolio-btn-wrapper button');
            filterButtons.forEach(e =>
                e.addEventListener('click', () => {

                    let filterValue = event.target.getAttribute('data-filter');
                    iso.arrange({
                        filter: filterValue
                    });
                })
            );
        });
    </script>
<script>
    
    @if(Session::has('update'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('update') }}");
    @endif

    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('success') }}");
    @endif
  
    
    
    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
</script>

</body>

</html>