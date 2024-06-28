<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="shortcut icon" type="image/png" href="{{ asset('images/'. $settingsinfo->favicon)}}" />
    <title>{{ $settingsinfo->webtitle }}</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/slider/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/slider/dist/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/media.css')}}">
  
    <style>
        .headmain {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #fff; /* Adjust background color as needed */
    z-index: 1000; /* Ensure it's above other content */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for better visibility */
}
body {
    padding-top: 50px; /* Adjust this value to match your header height */
}
    </style>
</head>

<body>
    <div class="headmain">
        <div class="header-top">
            <div class="container">
                <div class="left-content">
                    <a class="navbar-brand" href="{{ route('home') }}">{{ $settingsinfo->title }}</a>
                    <p>Book online or Call: {{ $settingsinfo->callnownumber }}</p>
                </div>
                <a href="tel:+{{ $settingsinfo->callnownumber }}" class="call-now btn btn-dark">Call Now</a>
            </div>
        </div>
    
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="">Home</a>
                        </li>
                     
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('services') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Services
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{ request()->is('hvac-installation') ? 'active' : '' }}" href="">HVAC Installation</a>
                                <a class="dropdown-item {{ request()->is('painting') ? 'active' : '' }}" href="">Painting Installation</a>
                                <a class="dropdown-item {{ request()->is('civil-work') ? 'active' : '' }}" href="">Civil Work</a>
                                <a class="dropdown-item {{ request()->is('plumbing') ? 'active' : '' }}" href="">Plumbing</a>
                                <a class="dropdown-item {{ request()->is('electrical') ? 'active' : '' }}" href="">Electrical</a>
                                <a class="dropdown-item {{ request()->is('aircon-repair') ? 'active' : '' }}" href="">Aircon Repair</a>
    
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('hvac-installation') ? 'active' : '' }}" href="">HVAC Installation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('civil-work') ? 'active' : '' }}" href="">Civil Work</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('plumbing') ? 'active' : '' }}" href="">Plumbing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('electrical') ? 'active' : '' }}" href="">Electrical</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('aircon-repair') ? 'active' : '' }}" href="">Aircon Repair</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('book-online') ? 'active' : '' }}" href="">Book Online</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('more') ? 'active' : '' }}" href="">More</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
   

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
