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
                                    <li class="active"><a href="{{ route('owner.index') }}">Home</a></li>
                                    <li><a href="./rooms">Hotels</a></li>
                                    <li><a href="./contact">Rooms</a></li>
                                </ul>
                            </nav>

                            <!-- Icons aligned to the right -->
                            <div class="header-icons" style="display: flex; align-items: center;">
                                <i class="fa-solid fa-bell" style="margin-right: 15px;"></i>
                                <div class="dropdown" style="position: relative;">
                                    <i class="fa-solid fa-user" style="cursor: pointer;" data-bs-toggle="dropdown"
                                        aria-expanded="false"></i>
                                    <ul class="dropdown-menu"
                                        style="position: absolute; top: 100%; right: 0; z-index: 1000;">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li>
                                            <!-- Changed <a> to <button> to ensure form submission -->
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
                <div  class="text-center my-4">
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
                        <div  class="col-lg-4 col-md-6 mb-4">
                            <div class="room-item">
                                <!-- Display the first hotel image if available -->
                                <div  class="ri-text">
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
                                    <a style="margin-right: 10%" class="primary-btn" href="{{ route('rooms.edit', $room->id) }}">Edit Room</a>
                                    <!-- In your hotel details view -->
                                    <a class="btn btn-danger" href="#"
                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this room?')) document.getElementById('delete-form-{{ $room->id }}').submit();">Delete Room</a>
                                

                                    <!-- Include this form for the delete request -->
                                    <form id="delete-form-{{ $room->id }}" action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display: none;">
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
    <!-- Foote

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
