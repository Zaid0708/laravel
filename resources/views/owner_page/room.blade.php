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
                            <a href="./index">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div style="width: 100%" class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="./index">Home</a></li>
                                    <li><a href="./rooms">Hotels</a></li>
                                    <li><a href="./contact">Rooms</a></li>
                                    <!-- Dropdown Menu for User Icon -->
                                    <i class="fa-solid fa-bell"></i>
                                    <li class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-user"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">profile</a></li>
                                            <li><a class="dropdown-item" href="#">logout</a></li>
                                        </ul>
                                    </li>
                                    <li><i class="icon_search"></i></li>
                                </ul>
                            </nav>

                            <!-- Search Icon Outside of Nav -->





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Your Rooms</h2>
                        <div class="bt-option">
                            <a href="{{ route('owner.index') }}">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <main>
            {{-- Check if rooms are empty --}}
            @if ($rooms->isEmpty())
                <div class="text-center my-4">
                    <p>No rooms available for this hotel.</p>
                    {{-- Create button for adding a new room --}}
                    <a href="{{ route('rooms.create', ['hotelId' => $hotelId]) }}" class="ch">Add New Room</a>
                </div>
            @else
                <div class="text-right my-4">
                    <a href="{{ route('rooms.create', ['hotelId' => $hotelId]) }}" class="ch">Add New Room</a>
                </div>

                <div class="row">
                    @forelse($rooms as $room)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="room-item">
                                <!-- Display the first hotel image if available -->
                                <div class="ri-text">
                                    @if ($room->images->isNotEmpty())
                                        <img style="height: 250px"
                                            src="{{ asset('storage/room_images/' . $room->images->first()->image_path) }}"
                                            alt="Room Image">
                                    @else
                                        <!-- Optional: Display a default image if no images are available -->
                                        <img src="{{ asset('storage/default-room-image.jpg') }}"
                                            alt="Default Room Image">
                                    @endif

                                    <h4>{{ $room->room_type }}</h4>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Description:</td>
                                                <td>{{ $room->description }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Room Feature:</td>
                                                <td>{{ $room->features }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Room Capacity:</td>
                                                <td>{{ $room->capacity }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a style="margin-right: 10%" class="primary-btn" href="">Edit Room</a>
                                    <!-- In your hotel details view -->
                                    <a class="btn btn-danger" href="#"
                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this room?')) document.getElementById('delete-form-{{ $room->id }}').submit();">Delete
                                        Room</a>

                                    <!-- Include this form for the delete request -->
                                    <form id="delete-form-{{ $room->id }}" action="" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No rooms found for this hotel.</p>
                    @endforelse
                </div>
            @endif
        </main>
    </div>

    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="img/footer-logo.png" alt="Footer Logo">
                                </a>
                            </div>
                            <p>We inspire and reach millions of travelers<br /> across 90 local websites</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Contact Us</h6>
                            <ul>
                                <li>(12) 345 67890</li>
                                <li>info.colorlib@gmail.com</li>
                                <li>856 Cordia Extension Apt. 356, Lake, United State</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>New latest</h6>
                            <p>Get the latest updates and offers.</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5 text-lg-right">
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Sona. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Js Plugins -->
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
