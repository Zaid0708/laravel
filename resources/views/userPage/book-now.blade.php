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
        .me-2 {
            margin-right: 1rem;
        }
        .border-end {
            border-right: 1px solid #dee2e6 !important;
        }
        small, .small {
            font-size: .875em;
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

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-color :#f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>{{$hotel->name}} </h2>
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
    <div style="display: flex; background-color: #f6f6f6; padding-bottom: 20px;">
        <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1" style="padding-top: 20px;">
            <div class="booking-form" style="padding-bottom: 18px; padding-top: 18px;">
                @if ($errors->has('dates'))
                <div class="alert alert-danger">
                    {{ $errors->first('dates') }}
                </div>
            @endif
            
                <h3>Pick your stay Date</h3>
                <form action="{{ route('process.booking') }}" method="POST">
                    @csrf <!-- Laravel CSRF token for form security -->
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <div class="check-date">
                        <label for="check-in-date">Check In:</label>
                        <input type="text" class="date-picker-input" name="check_in" id="check-in-date" required>
                       <i class="icon_calendar"></i>
                    </div>
                    <div class="check-date">
                        <label for="check-out-date">Check Out:</label>
                        <input type="text" class="date-picker-input" name="check_out" id="check-out-date" required>
                        <i class="icon_calendar"></i>
                    </div>
                    <button type="submit" class="ab">Booking</button>
                </form>
                
            </div>
        </div>
    
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp; padding-top: 20px;">
            <div class="room-item shadow rounded overflow-hidden">
                <div class="position-relative">
                    <!-- Dynamically display room image -->
                    @if($room->images->isNotEmpty())
                        <img style="height: 250px" src="{{ asset('storage/room_images/' . $room->images->first()->image_path) }}" alt="Room Image">
                    @else
                        <img src="{{ asset('images/default-room.jpg') }}" alt="Default Room Image">
                    @endif
                </div>
                <div class="p-4">
                    <p class="price-text">${{ $room->price_per_night }}/Night</p>
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
                    <p class="text-body mb-3">{{ $room->description }}</p>
                </div>
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
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Custom Script to Initialize Datepicker -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var bookedDates = @json($bookedDates); // Pass the booked dates array from PHP to JavaScript
    
            // Initialize the datepicker for check-in
            $("#check-in-date").datepicker({
                minDate: 0,
                dateFormat: 'yy-mm-dd',
                beforeShowDay: function(date) {
                    var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);
                    return [bookedDates.indexOf(formattedDate) === -1]; // Return true if date is not booked
                },
                onSelect: function(selectedDate) {
                    var checkInDate = new Date(selectedDate);
                    checkInDate.setDate(checkInDate.getDate() + 1); // Ensure check-out date is at least one day after check-in
                    $("#check-out-date").datepicker("option", "minDate", checkInDate);
                }
            });
    
            // Initialize the datepicker for check-out
            $("#check-out-date").datepicker({
                minDate: 1,
                dateFormat: 'yy-mm-dd',
                beforeShowDay: function(date) {
                    var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);
                    return [bookedDates.indexOf(formattedDate) === -1]; // Return true if date is not booked
                }
            });
        });
    </script>
    
    
    
    

</body>
</html>
