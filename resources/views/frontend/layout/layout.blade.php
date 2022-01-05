<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Groove - Music</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
    <meta content="Bootstrap News Template - Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/site.webmanifest') }}">

    <!-- CSS Libraries -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('frontend/lib/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/slick/slick-theme.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Top Bar Start -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="tb-contact">
                        <p><i class="fas fa-envelope"></i>groovemusic@gmail.com </p>
                        <p><i class="fas fa-phone-alt"></i> +233 556 705 099</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tb-menu">
                        <a href="">About</a>
                        <a href="">Privacy</a>
                        <a href="">Terms</a>
                        <a href="">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar Start -->

    <!-- Brand Start -->
    <div class="brand-bar my-3">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center text-md-left justify-content-md-between">
                <div class="col-lg-3 col-md-4">
                    <div class="b-logo">
                        <a href="{{ url("/") }}">
                            <img src="{{ asset("frontend/android-chrome-192x192.png") }}" class="site-logo" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 my-3 my-md-0">
                    <div class="b-search">
                        <form method="post" action="{{ url('song/search') }}">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" id="name" placeholder="Enter track..." aria-label="">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger shadow" type="submit" aria-label=""><i class="fas fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <!-- Nav Bar Start -->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="{{ url('/') }}" class="navbar-brand">Groove</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ url('all/songs') }}" class="nav-item nav-link active">All Songs</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                            <div class="dropdown-menu">
                                <a href="{{ url('category/top_songs') }}" class="dropdown-item">Top Songs</a>
                                <a href="{{ url('category/popular') }}" class="dropdown-item">Popular Songs</a>
                                <a href="{{ url('category/trending') }}" class="dropdown-item">Trending Songs</a>
                                <a href="{{ url('category/new_artist') }}" class="dropdown-item">New Artist</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Genre</a>
                            <div class="dropdown-menu">
                                @foreach ($genres as $genre )
                                <a href="{{ url("genres/$genre->name") }}" class="dropdown-item">{{ $genre->title }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Artist</a>
                            <div class="dropdown-menu">
                                <a href="{{ url("artists/top_artist") }}" class="dropdown-item">Top Artist</a>
                                <a href="{{ url("artists/new_artist") }}" class="dropdown-item">New Artist</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                    </div>
                    <div class="social ml-auto">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->


    @yield('content')

    <!-- Footer Start -->
    <div class="footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Get in Touch</h3>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>399 East Legon</p>
                            <p><i class="fa fa-envelope"></i>groovemusic@gmail.com</p>
                            <p><i class="fa fa-phone"></i>0556705099</p>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Categories</h3>
                        <ul>
                            <li><a href="{{ url('category/top_songs') }}">Top Songs</a></li>
                            <li><a href="{{ url('category/popular') }}">Popular Songs</a></li>
                            <li><a href="{{ url('category/trending') }}">Trending Songs</a></li>
                            <li><a href="{{ url('category/new_artist') }}">New Artist</a></li>
                        </ul>
                    </div>
                </div>



                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3 class="title">Newsletter</h3>
                        <div class="newsletter">
                            <p>
                                Subscribe to our newsletter to get notifications immediately when new songs are added
                            </p>
                            <form>
                                <input class="form-control" type="email" placeholder="Your email here">
                                <button class="btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Footer Menu Start -->
    <div class="footer-menu">
        <div class="container">
            <div class="f-menu">
                <a href="">Terms of use</a>
                <a href="">Privacy policy</a>
                <a href="">Cookies</a>
                <a href="">Accessibility help</a>
                <a href="">Advertise with us</a>
                <a href="">Contact us</a>
            </div>
        </div>
    </div>
    <!-- Footer Menu End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4 copyright">
                    <p>Copyright &copy; <span class="text-danger">Groove Music </span> All Rights Reserved</p>
                </div>
                <div class="col-md-4 copyright text-center">
                    <p>Developed by <span class="text-danger">Oppong Junior </span></p>
                </div>

                <div class="col-md-4 template-by">
                    <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/myjs.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>
</html>
