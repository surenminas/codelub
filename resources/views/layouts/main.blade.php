<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') - Codelub</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/logo_icon.png') }}" sizes="180x180">

    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- lightgallery -->
    <link rel="stylesheet" href="{{ asset('dist/css/lightgallery.css') }}">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css"
        integrity="sha512-kwJUhJJaTDzGp6VTPBbMQWBFUof6+pv0SM3s8fo+E6XnPmVmtfwENK0vHYup3tsYnqHgRDoBDTJWoq7rnQw2+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}



    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}


</head>

<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.svg') }}"
                        alt="Edica"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.index') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('album.index') }}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                        </li>
                    </ul>

                    <form action="{{ route('search.index') }}" method="GET" class="d-flex input-group w-auto">
                        <input type="search" name="s" class="form-control rounded border border-dark"
                            placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button class="input-group-text border-0 ml-1" type="submit" id="search-addon"><i
                                class="fas fa-search"></i></button>
                    </form>


                    <ul class="navbar-nav mt-2 mt-lg-0">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}<i class="ml-2 fas fa-user"></i>
                                </a>



                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" id="activity" href="{{ route('personal.main.index') }}"
                                        onclick="document.getElementById('activity').submit();">
                                        My Activity
                                    </a>
                                    @can('view', auth()->user())
                                        <a class="dropdown-item" id="admin" href="{{ route('admin.main.index') }}"
                                            onclick="document.getElementById('admin').submit();">
                                            Admin Panel
                                        </a>
                                    @endcan
                                    <a class="dropdown-item" id="profile" href="{{ route('profile.edit') }}"
                                        onclick="document.getElementById('profile').submit();">
                                        Account Settings
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="blog">
        <div class="container">
            @yield('content')
        </div>

    </main>
    {{-- 
    <section class="edica-footer-banner-section">
        <div class="container">
            <div class="footer-banner" data-aos="fade-up">
                <h1 class="banner-title">Download it now.</h1>
                <div class="banner-btns-wrapper">
                    <button class="btn btn-success"> <img src="{{ asset('assets/images/apple@1x.svg') }}"
                            alt="ios" class="mr-2"> App Store</button>
                    <button class="btn btn-success"> <img src="{{ asset('assets/images/android@1x.svg') }}"
                            alt="android" class="mr-2"> Google Play</button>
                </div>
                <p class="banner-text">Add some helper text here to explain the finer details of your <br> product or
                    service.</p>
            </div>
        </div>
    </section> --}}

    <footer class="edica-footer mt-5" data-aos="fade-up">
        <div class="container">
            <div class="row footer-widget-area">
                <div class="col-lg-4">
                    <a href="index.html" class="footer-brand-wrapper">
                        <img src="{{ asset('assets/images/logo.svg') }}" alt="edica logo">
                    </a>
                    <p class="contact-details">codelub@gmail.com</p>
                    <p class="contact-details">+374 92 12 34 56</p>
                    <nav class="footer-social-links">
                        <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.youtube.com/" target="_blank"><i
                                class="fab fa-youtube"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram" target="_blank"></i></a>
                    </nav>
                </div>

                <div class="col-lg-4">
                    <nav class="footer-nav">
                        <a href="{{ route('post.index') }}" class="nav-link">Blog</a>
                        <a href="#!" class="nav-link">API</a>
                        <a href="{{ route('about.index') }}" class="nav-link">About</a>
                        <a href="{{ route('contact.index') }}" class="nav-link">Contact</a>
                        {{-- <a href="#!" class="nav-link">Tools & Integrations</a>
                        <a href="#!" class="nav-link">Pricing</a> --}}
                    </nav>
                </div>
                <div class="col-lg-4">
                    <div class="dropdown footer-country-dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="footerCountryDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="flag-icon flag-icon-us flag-icon-squared"></span> United States <i
                                class="fas fa-chevron-down ml-2"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="footerCountryDropdown">
                            <button class="dropdown-item" href="#">
                                <span class="flag-icon flag-icon-am flag-icon-squared"></span> Armenia
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-content">
                <p class="mb-0">© Codelub 2023 All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Theme style -->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>

    <script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script> {{-- bootstrap 4.4.1 --}}
    <script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- lightgallery -->
    <script src="{{ asset('dist/lightgallery.min.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"
        integrity="sha512-b4rL1m5b76KrUhDkj2Vf14Y0l1NtbiNXwV+SzOzLGv6Tz1roJHa70yr8RmTUswrauu2Wgb/xBJPR8v80pQYKtQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
