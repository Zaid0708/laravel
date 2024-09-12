<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <style>
      
    </style>

</head>
<body>
    <header class="header-section header-normal">
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index">
                                <img src="{{asset('img/logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="{{ url('./index') }}">Home</a></li>
                                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                                    <li><a href="{{ url('/hotels') }}">Hotels</a></li>
                                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                                    @guest
                                  
                                 
                                    @else
                                     
                                    @endguest
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section style="height: 100%" class="hero-section mt-5">
        <div class="container">
            <div class="row">
                <!-- Column for the form -->

             

                   <div class="col-xl-6 col-lg-6 offset-xl-3 offset-lg-3">
                    <div class="booking-form">
                        <h3>Login to Your Account</h3>
                        <form method="POST" action="{{ route('login') }}" class="contact-form">
                            @csrf <!-- Include CSRF token for security -->
    
                            <!-- Display validation errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
    
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}">
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                                <div class="col-lg-12">
                                    <button class="subb" type="submit">Login Now</button>
                                    <p>Don't have an account? <a href="{{ route('register') }}" style="text-decoration: none; color: blue;">Register here</a></p>

                                </div>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Slider section -->
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-1.jpg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-2.jpg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-3.jpg') }}"></div>
        </div>
    </section>
    
    <!-- JavaScript files -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
