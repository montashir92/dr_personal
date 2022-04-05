<header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">

                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('index') }}">
                                <img src="{{ asset('frontend/image/logo/logo.svg') }}" alt="Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle
                                            navigation">Pages</a>
                                        <ul class="sub-menu collapse" id="submenu-1-2">
                                            <li class="nav-item"><a href="{{ route('services') }}">Service</a></li>
                                            <li class="nav-item"><a href="{{ route('blogs') }}">Blog</a></li>
                                            <li class="nav-item "><a href="{{ route('contacts') }}">Contact</a></li>
                                            <li class="nav-item "><a href="{{ route('appointments') }}">Book Appointment</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::is('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                                        
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="{{ route('blogs') }}" class="{{ Route::is('blogs') ? 'active' : '' }}">Blog</a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('contacts') }}" class="{{ Route::is('contacts') ? 'active' : '' }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="button add-list-button">
                                <a href="{{ route('appointments') }}" class="btn">Book Appointment</a>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </header>