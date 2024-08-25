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
                        <h2>booking </h2>
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

    <!-- Start Section -->
<div style="display: flex">
    <div class="booking" style="padding: 80px 200px; max-width: 100%;">
        <form action="#" class="contact-form">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" placeholder="Your Name">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" placeholder="Your Email">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" placeholder="Phone Number">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" placeholder="Name Hotel">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" placeholder="Type Room">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <input type="text" placeholder="Price">
                </div>
                <div class="col-lg-12">
                    <button type="submit">Book Now</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
        <div class="booking-form">
            <h3>Booking Your Hotel</h3>
            <form action="#">
                <div class="check-date">
                    <label for="date-in">Check In:</label>
                    <input type="text" class="date-input" id="date-in">
                    <i class="icon_calendar"></i>
                </div>
                <div class="check-date">
                    <label for="date-out">Check Out:</label>
                    <input type="text" class="date-input" id="date-out">
                    <i class="icon_calendar"></i>
                </div>
                <div class="select-option">
                    <label for="guest">Guests:</label>
                    <select id="guest">
                        <option value="">2 Adults</option>
                        <option value="">3 Adults</option>
                    </select>
                </div>
                <div class="select-option">
                    <label for="room">location:</label>
                    <select id="room">
                        <option value="">amman</option>
                        <option value="">aqaba</option>
                    </select>
                </div>
                <button type="submit">Check Availability</button>
            </form>
        </div>
    </div>
</div>





    <!-- Section End -->





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
