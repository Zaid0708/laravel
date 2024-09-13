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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

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

        small,
        .small {
            font-size: .875em;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .price-text {
            font-size: 20px;
            font-weight: bold;
            color: #dfa974;
            margin-bottom: 15px;
            /* Add some spacing below the price */
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
            text-transform: uppercase;
            /* Capitalize the text */
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
        /* Slider Container */
.slider-container {
    width: 100%; /* Changed from 120% to 100% */
    position: relative;
    overflow: hidden;
    max-width: 600px; /* Optional: Set a max-width for better control */
    margin: auto; /* Center the slider */
}

/* Slider Wrapper */
.slider-wrapper {
    display: flex;
    transition: transform 0.5s ease-in-out;
    width: 100%;
}

/* Slider Items */
.slider-item {
    min-width: 100%;
    box-sizing: border-box;
}

.slider-item img {
    width: 100%;
    height: 350px;
    object-fit: cover; /* Ensures the image covers the container without distortion */
}

/* Slider Buttons */
.slider-prev,
.slider-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 15px;
    cursor: pointer;
    border-radius: 50%;
    font-size: 18px;
    z-index: 1000; /* Ensures buttons are above other elements */
    transition: background 0.3s;
}

.slider-prev:hover,
.slider-next:hover {
    background: rgba(0, 0, 0, 0.8);
}

.slider-prev {
    left: 10px; /* Adjusted from `left: 0` to add padding */
}

.slider-next {
    right: 10px; /* Adjusted from `right: 0` to add padding */
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
                                <img src="{{ asset('img/logo.png') }}" alt="Logo">

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
                                    <li>
                                        <div class="d-inline-block">
                                            <a href="{{ route('oregister') }}" class="btn btn-primary">Hotel owner?</a>
                                        </div>
                                    </li>
                                    @else
                                        <li>
                                            <form action="{{ route('userlogout') }}" method="POST" style="display:inline;">
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
    <div class="breadcrumb-section mt-5">
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
        <br>
        <br>
        <div class="container">
            <div class="row">
                <!-- Room Image -->
                <div class="col-lg-6">
                    <!-- Custom Image Slider -->
                    <div id="customRoomImageSlider" class="slider-container" style="width: 120%; position: relative; overflow: hidden;">
                        <div class="slider-wrapper" style="display: flex; transition: transform 0.5s ease-in-out;">
                            @foreach ($room->images as $image)
                                <div class="slider-item" style="min-width: 100%;">
                                    <img src="{{ asset('storage/room_images/' . $image->image_path) }}" style="width: 100%; height: 350px;" alt="Room Image">
                                </div>
                            @endforeach
                        </div>
                        <button class="slider-prev">&#10094;</button>
                        <button class="slider-next">&#10095;</button>
                    </div>
                </div>
                

                <!-- Room Details -->
                <div class="col-lg-6">
                    <div class="rd-text" style="margin-left : 140px">
                        <br>
                        <div class="rd-title d-flex justify-content-between align-items-center">
                            <p style="font-size : 30px"> room type : {{ $room->room_type }}</p>
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
                            </div>
                        </div>
                        <p style="color: #f7931e ; font-size : 30px">${{ $room->price_per_night }}/<span
                                style="color: #6b6b6b"> Per Night</span></p>
                        <div>
                            <p><strong>Size:</strong> {{ $room->size }}</p>
                            <p><strong>Capacity:</strong> Max {{ $room->capacity }} Persons</p>
                            <p><strong>Bed:</strong> {{ $room->bed }}</p>
                            <p><strong>Services:</strong> {{ $room->services }}</p>
                            <form action="{{ route('book.now', ['roomId' => $room->id]) }}" method="GET">
                                @csrf
                                <button type="submit" class="ab"
                                    style="background-color:#dfa974;color:#fff">Book Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="reviews-section">
                        <h4>Reviews</h4>
                        <br>
                        @forelse ($room->reviews as $review)
                            <div class="review">
                                <p>name : {{ $review->user->name }}</p>
                                <p>
                                    rating :
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            <span style="color: #df9a53;" class="fa fa-star"></span>
                                        @else
                                            <span style="color: #df9a53;" class="fa fa-star-o"></span>
                                        @endif
                                    @endfor
                                </p>
                                <p> comment : {{ $review->comment }}</p>
                                <p> data : {{ date('d M Y', strtotime($review->review_date)) }}</p>
                                <hr>
                            </div>
                        @empty
                            <p>No reviews yet. Be the first to review!</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Add Review Section -->
            <div class="review-add mt-5">
                <h4>Add Review</h4>
                @auth
                    <form action="{{ route('reviews.store', ['room' => $room->id]) }}" method="POST" class="ra-form">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <input type="number" name="rating" min="1" max="5"
                                        placeholder="Your rating out of 5" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <textarea name="comment" placeholder="Your Review" required></textarea>
                                <button type="submit" class="btn btn-primary" style="width: 20%">Submit Now</button>
                            </div>
                        </div>
                    </form>
                @else
                    <p>You must be logged in to submit a review.</p>
                @endauth
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
                                    <img src="{{ asset('img/footer-logo.png') }}" alt="Sona Logo">
                                    <!-- Ensure logo is relevant -->
                                </a>
                            </div>
                            <p>Your gateway to luxurious stays around the globe. With our presence in over 90 countries,
                                we bring the world to your doorstep.</p>
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
                            <p>Sign up to receive exclusive offers and the latest news on our properties.</p>
                            <!-- Updated description -->
                            <form action="#" class="fn-form">
                                <input type="email" placeholder="Your Email">
                                <!-- Updated placeholder and input type -->
                                <button type="submit" style="width: 20%"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sliderWrapper = document.querySelector('.slider-wrapper');
            const sliderItems = document.querySelectorAll('.slider-item');
            const prevButton = document.querySelector('.slider-prev');
            const nextButton = document.querySelector('.slider-next');
            let currentIndex = 0;
    
            function updateSliderPosition() {
                const offset = -currentIndex * 100;
                sliderWrapper.style.transform = `translateX(${offset}%)`;
            }
    
            nextButton.addEventListener('click', function () {
                currentIndex = (currentIndex + 1) % sliderItems.length;
                updateSliderPosition();
            });
    
            prevButton.addEventListener('click', function () {
                currentIndex = (currentIndex - 1 + sliderItems.length) % sliderItems.length;
                updateSliderPosition();
            });
        });
    </script>
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
