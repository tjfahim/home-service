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

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .left-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .left-content img {
            width: 100%;
            max-width: 200px;
            height: auto;
        }

        .left-content p {
            margin-top: 10px;
        }

        #whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: green; /* Adjust background color */
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 1000; /* Ensure it appears above other content */
            text-decoration: none; /* Remove underline from link */
            color: white; /* Icon color */
            font-size: 30px; /* Icon size */
        }

        #whatsapp-button:hover {
            background-color: darkgreen; /* Adjust hover background color */
        }

        @media (max-width: 992px) {
            #navbarSupportedContent {
                background-color: #fff; /* Add white background for mobile menu */
            }
        }
    </style>
</head>

<body>
    <div class="headmain">
        <div class="header-top ">
            <div class="container">
                <div class="left-content">
                    <div>
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img style="height: 60px;margin-top:6px" src="{{ asset($settingsinfo->logo) }}" alt="">
                        </a>
                    </div>
                    <p>Book online or Call: {{ $settingsinfo->callnownumber }}</p>
                </div>
                <a href="tel:{{ $settingsinfo->callnownumber }}" class="call-now btn btn-dark">Call Now</a>
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
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                        </li>
                     
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('services') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Services
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($categories as $category)
                                <a class="dropdown-item {{ request()->is('category-details/' . $category->id) ? 'active' : '' }}" href="{{ route('category.details', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('hvac-installation') ? 'active' : '' }}" href="{{ route('hvacpage') }}">HVAC Installation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('civil-work') ? 'active' : '' }}" href="{{ route('civilpage') }}">Civil Work</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('plumbing') ? 'active' : '' }}" href="{{ route('plumbingpage') }}">Plumbing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('electrical') ? 'active' : '' }}" href="{{ route('electricalpage') }}">Electrical</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('painting') ? 'active' : '' }}" href="{{ route('paintingpage') }}">Painting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('book-online') ? 'active' : '' }}" href="{{ route('allservice') }}">Book Online</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
   
    <a href="https://wa.me/{{ $settingsinfo->callnownumber }}" target="_blank" id="whatsapp-button">
        <i class="fab fa-whatsapp"></i> <!-- Font Awesome WhatsApp icon -->
    </a>

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.navbar-toggler').click(function() {
                $('#navbarSupportedContent').collapse('toggle');
            });
        });
    </script>
</body>

</html>
