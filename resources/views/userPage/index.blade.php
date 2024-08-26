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
    <link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
                  rel="stylesheet">

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
        .service-item i {
            color: #D5A373;
            transition: color 0.3s ease;
        }

        .service-item:hover i {
            color: #ffffff;
        }
        .btn-outline-primary {
            color: #f7931e;
            border-color: #dfa974;
        }

        .btn-outline-primary:hover {
            background-color: #dfa974;
            color: #fff;
            border-color: #dfa974;

        }

    .btn-primary {
            background-color: #dfa974;
            border-color: #dfa974;
            color: #fff;
        }

  .btn-primary:hover {
            background-color: #d7934f;
            border-color: #dfa974;
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
                            <a href="./index">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="./index">Home</a></li>
                                    <li><a href="./about-us">About Us</a></li>
                                    <li><a href="./hotels">Hotels</a></li>
                                    <li><a href="./pages">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./room-details">Room Details</a></li>
                                            <li><a href="./blog-details">Blog Details</a></li>
                                            <li><a href="#">Family Room</a></li>
                                            <li><a href="#">Premium Room</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./contact">Contact</a></li>
                                    <a href="#" class="btn btn-outline-primary">Login</a>
                                    <a href="#" class="btn btn-primary">Sign Up</a>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Sona A Luxury Hotel</h1>
                        <p>Here are the best hotel booking sites, including recommendations for international
                            travel and for finding low-priced hotel rooms.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Booking Your Hotel</h3>
                        <form action="{{ route('hotels.search') }}" method="POST">
                            @csrf <!-- This is important for Laravel forms -->
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" name="check_in" class="date-input" id="date-in">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" name="check_out" class="date-input" id="date-out">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest" name="guests">
                                    <option value="2">2 Adults</option>
                                    <option value="3">3 Adults</option>
                                    <option value="4">4 Adults</option>
                                    <option value="5">5 Adults</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="location">Location:</label>
                                <select id="location" name='location'>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->location }}">{{ $location->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit">Check Availability</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/1.jpg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/2.jpg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/3.jpg') }}"></div>
        </div>
    </section>
    <!-- Hero Section End -->
<!-- About Us Section Begin -->
<section id="AboutUs" class="aboutus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text">
                    <div class="section-title">
                        <br>
                        <br>
                        <br>
                        <span>About Us</span>
                        <h2>Welcome to Sona</h2>
                    </div>
                    <p class="f-para">Sona is your go-to platform for booking stays at some of the most luxurious and comfortable hotels around the world. Whether you're looking for a peaceful retreat in nature or an exciting stay in the heart of a bustling city, Sona provides you with a wide range of options to choose from.</p>
                    <p class="s-para">With a focus on convenience and personalization, Sona offers you the best in class amenities and services at our partner hotels. Explore our website to find your perfect stay and experience the difference that Sona brings to your travel planning.</p>
                    <a href="./about-us" class="primary-btn about-btn">Discover More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-pic">
                    <div class="row">
                        <div class="col-sm-12">
                            <img src="img/about/1.jpg" alt="Hotel Image 1" style="margin-bottom: 10px;">
                        </div>
                        <div class="col-sm-12">
                            <img src="img/about/2.jpg" alt="Hotel Image 2" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What We Do</span>
                        <h2>Discover Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>Travel Plan</h4>
                        <p>We tailor travel plans to suit your preferences, ensuring a seamless and enjoyable journey.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                        <h4>Catering Service</h4>
                        <p>Experience exquisite dining with our gourmet catering service, tailored to your taste.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-026-bed"></i>
                        <h4>Babysitting</h4>
                        <p>Enjoy peace of mind with our professional babysitting services, available around the clock.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-024-towel"></i>
                        <h4>24/7 Laundry Service</h4>
                    <p>Our laundry services are available 24/7, ensuring your clothes are always fresh and clean.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>Private Chauffeur</h4>
                        <p>Travel in style and comfort with our private chauffeur services, available on-demand.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="service-item" >
                        <i class="fa-light fa-dumbbell " style="color: #dfa974; font-size: 48px; margin-top : 10px"></i>
                        {{-- <i class="fas fa-dumbbell" class="fa-light fa-dumbbell" style="font-size: 48px; margin-top : 10px"></i> --}}

                        <h4 style = " margin-top : 25px">Gym</h4>
                        <p>Stay fit during your stay with our fully equipped, state-of-the-art gym facilities.</p>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- Services Section End -->


    <!-- Testimonial Section Begin -->
<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Testimonials</span>
                    <h2>What Our Guests Are Saying</h2> <!-- Updated title -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="testimonial-slider owl-carousel">
                    <div class="ts-item">
                        <p>"The service was exceptional! My family and I felt so welcome and taken care of from the moment we arrived. The amenities were top-notch, and the staff went above and beyond to ensure our stay was perfect."</p>
                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5>-Zaid banifadl</h5> <!-- Updated author name -->
                        </div>
                        <img src="img/Testimonials/zaid banifadl.png" alt="" style="width: 40%">
                    </div>
                    <div class="ts-item">
                    <p>"The hotel truly exceeded our expectations. The location was perfect, and the rooms were incredibly comfortable. The concierge was very helpful in planning our city tours. We will definitely be back!"</p>                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                            </div>
                            <h5>-Yousef Abu Khalil</h5> <!-- Updated author name -->
                        </div>
                        <img src="img/Testimonials/yousef abu khalil.png" alt="" style="width: 40%">
                    </div>
                    <div class="ts-item">
<p>"The ambiance at the hotel is second to none. Whether we were dining in the restaurant or relaxing in our room, everything was perfect. We felt pampered and at ease after our stay."</p>                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                            </div>
                            <h5>- Dania Amro</h5> <!-- Updated author name -->
                        </div>
                        <img src="img/Testimonials/Dania Amro.png" alt="" style="width: 50% ; height: 40vh;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->



    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Hotels</span>
                        <h2>Our hotels</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <a href = "./hotels"  class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="img/blog/1.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Fairmont Amman</span>
                        </div>
                    </div>
                </a>

                <a  href = "./hotels"   class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="img/blog/2.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Amman Rotana</span>
                        </div>
                    </div>
                </a>
                <a  href = "./hotels"   class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="img/blog/3.jpg">
                        <div class="bi-text">
                            <span class="b-tag">InterContinental Jordan</span>
                        </div>
                    </div>
                </a>
                 <a  href = "./hotels"   class="col-lg-4">
                    <div class="blog-item small-size set-bg" data-setbg="img/blog/4.jpg">
                        <div class="bi-text">
                            <span class="b-tag">The St.Regis Amman</span>
                        </div>
                    </div>
                </a>
                 <a  href = "./hotels"   class="col-lg-4">
                    <div class="blog-item small-size set-bg" data-setbg="img/blog/5.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Four Seasons Hotel Amman</span>
                        </div>
                    </div>
                </a>
                <a  href = "./hotels"   class="col-lg-4">
                    <div class="blog-item small-size set-bg" data-setbg="img/blog/6.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Mövenpick Hotel Amman</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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
