<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/flaticon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Css Styles -->
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
        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table td, .table th {
            border: none; /* Remove borders around cells */
            padding: 10px 0; /* Adjust padding as needed */
        }

        .table tr {
            border-bottom: 1px solid transparent; /* Optional: Keeps spacing consistent */
        }
        .ps-2 {
            padding-left: .5rem !important;
        }
        .pe-3 {
            padding-right: 1rem !important;
        }
        .me-3 {
            margin-right: 1rem !important;
        }
        .me-2{
            margin-right: 1rem ;
        }

        .border-end {
            border-right: 1px solid #dee2e6 !important;
        }
        small, .small {
            font-size: .875em;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }
        .price-text {
            font-size: 20px;
            font-weight: bold;
            color: #dfa974;
            margin-bottom: 15px; /* Add some spacing below the price */
        }
        .btn-outline-primary {
            color: #df9a53 !important;
            border-color: #df9a53 !important;
            background-color: transparent !important;
            padding: 10px 20px !important;
            border-radius: 25px !important;
            font-size: 14px !important;
            font-weight: bold !important;
            margin-right: 5px !important;
            text-decoration: none !important;
        }

        .btn-outline-primary:hover {
            background-color: #df9a53 !important;
            color: white !important;
            text-decoration: none !important;
        }

        .btn-primary {
            background-color: #df9a53 !important;
            border-color: #df9a53 !important;
            color: white !important;
            padding: 10px 20px !important;
            border-radius: 25px !important;
            font-size: 14px !important;
            font-weight: bold !important;
        }

        .btn-primary:hover {
            background-color: #c97b41 !important;
            border-color: #c97b41 !important;
        }
        .aa:hover
        {
            background-color: #d7934f;
            border-color: #dfa974;
            color: #fff;

        }
            </style>
</head>

<body>
    <header class="header-section header-normal">
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
               


                                 <div class="logo">
                            <a href="{{asset('./index')}}">
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
                                    <li>
                                        <div class="d-inline-block">
                                            <a href="{{ route('login.form') }}" class="btn btn-outline-primary">Login</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-inline-block">
                                            <a href="{{ route('register.form') }}" class="btn btn-primary">Sign Up</a>
                                        </div>
                                    </li>
                                    @else
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Logout</button>
                                            </form>
                                        </li>
                                    @endguest
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->


    <section class="hotel-name-section" style="background-color: #f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mt-5">
                    <h2>{{ $hotel->name }}</h2> <!-- Assuming $hotel contains the hotel data -->
                </div>
            </div>
        </div>
    </section>

    <section class="hotels-section spad" style="background-color: #f6f6f6">
        <div class="container">
            <div class="row g-4">
                @foreach ($rooms as $room)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            @if($room->images->isNotEmpty())
                            <img style="height: 250px"
                            src="{{ asset('storage/room_images/' . $room->images->first()->image_path) }}"
                            alt="Room Image">
                            @else
                                <img src="{{ asset('images/default-room.jpg') }}" alt="Default Room Image">
                            @endif
                        </div>
                        <div class="p-4 mt-2">
                            <!-- Move the price element here, just below the image -->
                            <p class="price-text">${{ $room->price_per_night }}    <span style="color:#212529;">/Night</span>
                            </p>
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{ $room->room_type }}</h5>
                                <div class="ps-2">
                                    @for ($i = 0; $i < 5; $i++)
                                        <small style="color: #dfa974" class="fa fa-star"></small>
                                    @endfor
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i style="color: #dfa974" class="fa fa-bed me-2"></i>{{ $room->bed }} Bed</small>
                                <small class="border-end me-3 pe-3"><i style="color: #dfa974" class="fa fa-bath me-2"></i>{{ $room->bathroom }} Bath</small>
                                <small><i style="color: #dfa974" class="fa fa-wifi me-2"></i>Wifi</small>
                            </div>
                            <p class="text-body mb-3">{{ Str::limit($room->description, 100) }}</p>
                            <div class="d-flex justify-content-between">
                                <a style="background-color:#dfa974;color:#fff" href="{{ route('room.details', ['roomId' => $room->id]) }}" class="ab">View Details</a>
                                <form action="{{ route('book.now', ['roomId' => $room->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="ab" style="background-color:#dfa974;color:#fff">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>



    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="{{asset('img/footer-logo.png')}}" alt="Sona Logo"> <!-- Ensure logo is relevant -->
                                </a>
                            </div>
                            <p>Your gateway to luxurious stays around the globe. With our presence in over 90 countries, we bring the world to your doorstep.</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <!-- Update links to actual social media pages -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Contact Us</h6>
                            <ul>
                                <li>(+962) 780000000</li>
                                <li>info@sonahotel.com</li> <!-- Updated email -->
                                <li>123 Luxury St, Suite 789, Amman, Jordan</li> <!-- Updated address -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>Stay Updated</h6> <!-- Updated title -->
                            <p>Sign up to receive exclusive offers and the latest news on our properties.</p> <!-- Updated description -->
                            <form action="#" class="fn-form">
                                <input type="email" placeholder="Your Email"> <!-- Updated placeholder and input type -->
                                <button type="submit" style="width: 20%"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->


    <!-- Js Plugins -->
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






















