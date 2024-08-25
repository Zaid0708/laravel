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

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-radius: 15px 15px 0 0;
            height: 400px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: #333;
        }

        .rating {
            margin-bottom: 10px;
        }

        .rating .fa {
            color: #f7931e;
        }

        .card-text {
            color: #555;
        }

        .price-badge-footer {
            padding: 10px 0;
            text-align: center;
            background-color: #f8f8f8;
            border-top: 1px solid #ddd;
            border-bottom: none;
        }

        .price-badge {
            background-color: #f7931e;
            color: #fff;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            display: inline-block;
        }

        .card-footer {
            text-align: center;
            padding: 10px 15px;
            background-color: #f8f8f8;
            border-top: none;
            border-radius: 0 0 15px 15px;
        }

        .card-footer .btn {
            width: 100%;
            background-color: #dfa974;
            border: none;
            padding: 10px 0;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .card-footer .btn:hover {
            background-color: #dfa974;
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



    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-color :#f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Hotels</h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Hotels</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <section class="hotels-section spad" style="background-color: #f6f6f6">
        <div class="container">
            <div class="row">
                @forelse($hotels as $hotel)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset('storage/hotel_images/' . $hotel->hotel_image) }}" alt="{{ $hotel->name }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $hotel->name }}</h4>
                            <div class="rating">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < floor($hotel->rating))
                                        <i class="fa fa-star"></i>
                                    @elseif ($i < ceil($hotel->rating))
                                        <i class="fa fa-star-half-alt"></i>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                @endfor
                            </div>
                            <p class="card-text">{{ $hotel->description }}</p>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('rooms.index', $hotel->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                @empty
                    <p>No hotels available.</p>
                @endforelse
            </div>
        </div>
    </section>


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
