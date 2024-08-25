<!DOCTYPE html>
<html>
<head>
<title>Payment Details</title>

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
                                    <li><a href="./rooms">Rooms</a>
                                        <ul class="dropdown">
                                            <li><a href="./room-details">Fairmont Amman</a></li>
                                            <li><a href="./blog-details">Amman Rotana</a></li>
                                            <li><a href="#">InterContinental Jordan</a></li>
                                            <li><a href="#">The St.Regis Amman</a></li>
                                            <li><a href="#">Four Seasons Hotel Amman</a></li>
                                            <li><a href="#">Mövenpick Hotel Amman</a></li>
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


    <div class="container">
        <h1>Payment Details</h1>

        <div class="card">
            <img src="{{ asset('img/visa2.jpg') }}" alt="Description of the image" width="150" height="300" class="your-class">
        </div>


        <form class="form">
          <label for="name">Name on Card</label>
          <input type="text" id="name" value="Jack Sparrow">

          <label for="card-number">Card Number</label>
          <input type="text" id="card-number" value="1456 1298 6574 1287">

          <div style="display: flex; justify-content: space-between;">
            <div>
              <label for="valid-through">Valid Through</label>
              <input type="text" id="valid-through" value="02/22">
            </div>
            <div>
              <label for="cvv">CVV</label>
              <input type="text" id="cvv" value="201">
            </div>
          </div>
        </form>
    </div>




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

