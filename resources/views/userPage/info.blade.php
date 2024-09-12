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
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Include SweetAlert2 JS -->


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

        small,
        .small {
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
                                <img src="img/logo.png" alt="">
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
                                                <a href="{{ route('login.form') }}"
                                                    class="btn btn-outline-primary">Login</a>
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
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section mt-5" style="background-color :#f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Checkout </h2>
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


    <!-- Display check-in and check-out dates -->

    @if (session('booking_success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Good job!",
                    text: "Your booking was successful!",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then((result) => {
                    // Redirect after the user clicks "OK"
                    if (result.isConfirmed) {
                        window.location.href =
                        "{{ route('userPage.index') }}"; // Change this route to your desired route
                    }
                });
            });
        </script>
    @endif

    <div class="container">
        <div class="booking-form" style="display: flex; justify-content: space-between; padding: 18px 0;">
            <!-- Information Section -->
            <div class="info-section" style="flex: 1; padding-right: 20px;">
                <h3>Total stay duration:</h3>
                <p>Check In: {{ $checkIn }}</p>
                <p>Check Out: {{ $checkOut }}</p>
                <p>Room Type: {{ $room->room_type }}</p>
                <p>Price per Night: ${{ $room->price_per_night }}</p>
                <p>Number of Nights: {{ $numberOfNights }}</p>
                <p>Total Price: ${{ $totalPrice }}</p>
            </div>
    
            <!-- User Information Form -->
            <div class="form-section" style="flex: 1;">
                <form action="{{ route('finalize.booking') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $user->phone_number }}" required>
                    </div>
    
                    <!-- Payment Method -->
                    <label for="payment_method">Payment Method:</label>
                    <div class="form-group" style="margin-bottom: 10%;">
                        
                        <select class="form-control" name="payment_method" id="payment_method">
                            
                            <option value="">Select a payment method</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
    
                    <!-- Credit Card Form -->
                    <div id="credit_card_form" class="payment-form" style="display:none;">
                        <h4>Credit Card Details</h4>
                        <div class="form-group">
                            <label for="card_number">Card Number:</label>
                            <input type="text" class="form-control" name="card_number" id="card_number">
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Expiry Date:</label>
                            <input type="text" class="form-control" name="expiry_date" id="expiry_date">
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV:</label>
                            <input type="text" class="form-control" name="cvv" id="cvv">
                        </div>
                    </div>
    
                    <!-- PayPal Form -->
                    <div id="paypal_form" class="payment-form" style="display:none;">
                        <h4>PayPal Details</h4>
                        <div class="form-group">
                            <label for="paypal_email">PayPal Email:</label>
                            <input type="email" class="form-control" name="paypal_email" id="paypal_email">
                        </div>
                    </div>
    
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary mt-4">Book</button>
                </form>
            </div>
        </div>
    </div>
    








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
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentMethodSelect = document.getElementById('payment_method');
            const creditCardForm = document.getElementById('credit_card_form');
            const paypalForm = document.getElementById('paypal_form');
    
            // Hide all payment forms initially
            creditCardForm.style.display = 'none';
            paypalForm.style.display = 'none';
    
            paymentMethodSelect.addEventListener('change', function() {
                const selectedMethod = this.value;
    
                // Hide both forms by default
                creditCardForm.style.display = 'none';
                paypalForm.style.display = 'none';
    
                // Show the appropriate form based on the selected payment method
                if (selectedMethod === 'credit_card') {
                    creditCardForm.style.display = 'block';
                } else if (selectedMethod === 'paypal') {
                    paypalForm.style.display = 'block';
                }
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
