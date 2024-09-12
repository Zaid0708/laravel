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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- Css Styles -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
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
    <header class="header-section">
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="/owner">
                                <img style="margin-left: 10%" src="{{ asset('img/logo.png') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu"
                            style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                            <!-- Centered Navigation Menu -->
                            <nav class="mainmenu" style="flex: 1; display: flex; justify-content: center;">
                                <ul style="display: flex; align-items: center; margin: 0;">
                                    <li class="active"><a href="{{ route('owner.index') }}"></a></li>
                                    <li><a href="./rooms"></a></li>
                                    <li><a href="./contact"></a></li>
                                </ul>
                            </nav>

                            <!-- Icons aligned to the right -->
                            <!-- Icons aligned to the right -->
                            <!-- Icons aligned to the right -->
                            <div class="header-icons" style="display: flex; align-items: center;">
                                <div class="dropdown" style="position: relative;">
                                    <i class="fa-solid fa-bell" style="cursor: pointer; margin-right: 0px;"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- Badge for notifications -->
                                        <span class="notification-badge"
                                            style="position: absolute; top: -5px; right: -5px; background-color: red; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px; font-weight: bold;">{{ $notificationCount }}</span>
                                    </i>
                                    <ul class="dropdown-menu"
                                        style="position: absolute; top: 100%; right: 0; z-index: 1000;">
                                        <!-- Check if there are any reservations -->
                                        @forelse ($reservations as $reservation)
                                            @php
                                                $room = $reservation->room;
                                                $hotel = $room->hotel;
                                            @endphp
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    Room: {{ $room->room_type }}<br>
                                                    Hotel: {{ $hotel->name }}<br>
                                                    Total Price: ${{ number_format($reservation->total_price, 2) }}
                                                    <hr>
                                                </a>
                                            </li>
                                        @empty
                                            <li><a class="dropdown-item" href="#">No Reservations</a></li>
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="dropdown" style="position: relative;">
                                    <i class="fa-solid fa-user" style="cursor: pointer;margin-left:20px"
                                        data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu"
                                        style="position: absolute; top: 100%; right: 0; z-index: 1000;">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="dropdown-item"
                                                    style="background: none; border: none; cursor: pointer;">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>







                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <hr>
    <div class="ri mt-5">

        <div class="container mt-5">

            <div class="row">
                @forelse($hotels as $hotel)
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <!-- Display the hotel image -->
                            <img style="height: 250px"
                                src="{{ asset('storage/hotel_images/' . $hotel->hotel_image) }}"
                                alt="{{ $hotel->name }}">
                            <div class="ri-text">
                                <h4>{{ $hotel->name }}</h4>
                                <h3>${{ $hotel->min_price_per_night }}<span>/Per Night</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Location:</td>
                                            <td>{{ $hotel->location }}</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Hotel-Rating:</td>
                                            <td>{{ $hotel->rating }}</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Description:</td>
                                            <td>{{ $hotel->description }}</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Contact:</td>
                                            <td>{{ $hotel->contact_info }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a class="primary-btn"
                                    href="{{ route('rooms.index', ['hotelId' => $hotel->id]) }}">View Rooms</a>
                                <a style="margin-left: 3%" class="btn btn-warning"
                                    href="{{ route('hotels.edit', ['hotelId' => $hotel->id]) }}">Edit</a>
                                <!-- In your hotel details view -->
                                <a style="margin-left:3%" class="btn btn-danger"
                                    href="{{ route('owner.destroy', ['owner' => $hotel->id]) }}"
                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this hotel?')) document.getElementById('delete-form').submit();">
                                    Delete Hotel
                                </a>

                                <!-- Include this form for the delete request -->
                                <form id="delete-form" action="{{ route('owner.destroy', ['owner' => $hotel->id]) }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </div>
                        </div>
                    </div>
                @empty
                    <div style="margin-bottom: 10%;justifiy-self:center">
                        <p>No hotels found for this user.</p>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="mt-5" style="margin-right: 4%">
            <a href="{{ route('owner.create') }}" class="ch">Create a Hotel</a>
        </div>
    </div>
    <br>
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
    <!-- Foote-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
