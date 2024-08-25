<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Template</title>

    <!-- Google Fonts -->
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
        .service-item i {
            color: #D5A373;
            transition: color 0.3s ease;
        }

        .service-item:hover i {
            color: #ffffff;
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

        .me-2 {
            margin-right: 1rem;
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

        .aa:hover {
            background-color: #d7934f;
            border-color: #dfa974;
            color: #fff;
        }

        .select-option select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            text-transform: uppercase; /* Capitalize the text */
        }

        /* Style the submit button */
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #dfa974;
            border: none;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Style the calendar icon */
        .icon_calendar {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #dfa974;
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
                                    <li><a href="{{asset('./index')}}">Home</a></li>
                                    <li><a href="{{asset('./about-us')}}">About Us</a></li>
                                    <li><a href="{{asset('./hotels')}}">Hotels</a></li>
                                    <li><a href="{{asset('./index')}}">Rooms</a>
                                        <ul class="dropdown">
                                            <li><a href="{{asset('./room-details')}}">Room Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{asset('./contact')}}">Contact</a></li>
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

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="room-details-section spad">
        <div class="container">
            <!-- Add some top margin -->
            <br><br>
            <div class="row">
                <!-- Left Column: Room Details -->
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img style="height: 350px; width: 100%;" src="{{ asset('storage/room_images/' . $room->images->first()->image_path) }}" alt="Room Image">
                        <div class="rd-text">
                            <div class="rd-title d-flex justify-content-between align-items-center">
                                <h3>{{ $room->room_type }}</h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < floor($room->rating))
                                                <i class="icon_star"></i>
                                            @elseif ($i < ceil($room->rating))
                                                <i class="icon_star-half_alt"></i>
                                            @else
                                                <i class="icon_star-o"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <a href="#" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                            <h2>${{ $room->price_per_night }}<span>/Per Night</span></h2>
                            <div>
                                <p><strong>Size:</strong> {{ $room->size }}</p>
                                <p><strong>Capacity:</strong> Max {{ $room->capacity }} Persons</p>
                                <p><strong>Bed:</strong> {{ $room->bed }}</p>
                                <p><strong>Services:</strong> {{ $room->services }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Section -->
                    <div class="rd-reviews mt-5">
                        <h4>Reviews</h4>
                        @foreach($reviews as $review)
                            <div class="review-item">
                                <div class="ri-pic">
                                    <img src="{{ asset('img/room/avatar/avatar-1.jpg') }}" alt="">
                                </div>
                                <div class="ri-text">
                                    <span>{{ $review->created_at->format('d M Y') }}</span>
                                    <div class="rating">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $review->rating)
                                                <i class="icon_star"></i>
                                            @else
                                                <i class="icon_star-o"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <h5>{{ $review->user->name }}</h5>
                                    <p>{{ $review->comment }}</p>
                                </div>
                            </div>
                        @endforeach
<hr>
                        <!-- Add Review Section -->
                        <div class="review-add mt-5">
                            <h4>Add Review</h4>
                            @auth
                                <form action="{{ route('reviews.store', ['room' => $room->id]) }}" method="POST" class="ra-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" name="name" placeholder="Name*" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="email" name="email" placeholder="Email*" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <div>
                                                <input type="number" name="rating" min="1" max="5" placeholder="Your rating out of 5" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="comment" placeholder="Your Review" required></textarea>
                                            <button type="submit" class="btn btn-primary">Submit Now</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <p>You must be <a href="{{ route('login') }}">logged in</a> to submit a review.</p>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Right Column: Booking Form -->
                <div class="col-lg-4">
                    <div class="room-booking">
                        <h3>Your Reservation</h3> <!-- Update the header text -->
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
                                <select id="guest" style="text-transform: uppercase;">
                                    <option value="">2 Adults</option>
                                    <option value="">3 Adults</option>
                                </select>
                            </div>
                            <button type="submit" style="background-color: #dfa974; border-color: #dfa974; color: white;">Check Availability</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->

    <!-- Footer Section Begin -->
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
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
