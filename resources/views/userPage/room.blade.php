<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

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

    </style>
</head>
<body>

    <header class="header-section header-normal">
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="./index">Home</a></li>
                                    <li><a href="./about-us">About Us</a></li>
                                    <li class="active"><a href="./hotels">Hotels</a></li>
                                    <li><a href="./rooms">Rooms</a>
                                        <ul class="dropdown">
                                            <li><a href="./room-details">Fairmont Amman</a></li>
                                            <li><a href="./blog-details">Amman Rotana</a></li>
                                            <li><a href="#">InterContinental Jordan</a></li>
                                            <li><a href="#">The St.Regis Amman</a></li>
                                            <li><a href="#">Four Seasons Hotel Amman</a></li>
                                            <li><a href="#">MÃ¶venpick Hotel Amman</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./pages">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./room-details">Room Details</a></li>
                                            <li><a href="./blog-details">Blog Details</a></li>
                                            <li><a href="#">Family Room</a></li>
                                            <li><a href="#">Premium Room</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->



    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-color :#f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>{{ $hotel->name }}</h2>
                        <div class="bt-option">
                            <a href="./home.html">Room</a>
                            <span>Hotels</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->



    <!-- Rooms Section Begin -->
    <section class="hotels-section spad" style="background-color: #f6f6f6">
        <div class="container">
            <div class="row g-4">
                @foreach ($rooms as $room)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            @if($room->images->isNotEmpty())
                                <img src="{{ asset('storage/room_images/' . $room->images->first()->image_path) }}" alt="Room Image">
                            @else
                                <img src="{{ asset('images/default-room.jpg') }}" alt="Default Room Image">
                            @endif
                            <p class="position-absolute start-0 top-100 ">${{ $room->price_per_night }}/Night</p>
                        </div>
                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{ $room->room_type }}</h5>
                                <div class="ps-2">
                                    @for ($i = 0; $i < 5; $i++)
                                        <small style="color: #dfa974" class="fa fa-star "></small>
                                    @endfor
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i style="color: #dfa974" class="fa fa-bed  me-2"></i>{{ $room->bed }} Bed</small>
                                <small class="border-end me-3 pe-3"><i style="color: #dfa974" class="fa fa-bath me-2"></i>{{ $room->bathroom }} Bath</small>
                                <small><i style="color: #dfa974" class="fa fa-wifi  me-2"></i>Wifi</small>
                            </div>
                            <p class="text-body mb-3">{{ Str::limit($room->description, 100) }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="#"  class="btn aa">Veiw Detales</a>
                                <a href="#"  class="btn ab">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Rooms Section End -->






     <!-- Footer Section Begin -->
     <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="img/footer-logo.png" alt="Sona Logo"> <!-- Ensure logo is relevant -->
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
                                <button type="submit"><i class="fa fa-send"></i></button>
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
