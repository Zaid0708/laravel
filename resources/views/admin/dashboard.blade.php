<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js for Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .h5{
            color: white
        }
        .card-icon {
            font-size: 3rem;
            opacity: 0.6;
        }

        .dashboard-chart {
            max-width: 800px;
            margin: 0 auto;
        }

        .card-body {
            display: flex;
            align-items: center;
        }

        .card-body div {
            flex: 1;
        }

        .chart-container {
            position: relative;
            height: 40vh;
        }

        .badge-notification {
            position: absolute;
            top: -5px;
            right: -5px;
            font-size: 0.75rem;
            background-color: red;
            color: white;
            padding: 2px 5px;
            border-radius: 50%;
        }

        .dropdown-menu {
            max-height: 200px;
            overflow-y: auto;
        }

        .table-scroll {
            max-height: 400px;
            overflow-y: auto;
        }

        .notification-dropdown {
            width: 300px;
        }

        .notification-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .notification-item i {
            font-size: 1.25rem;
            color: #007bff;
        }

        .notification-item .small {
            font-size: 0.75rem;
        }

        .notification-dropdown .dropdown-item {
            padding: 10px;
        }

        .notification-dropdown .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .notification-dropdown .text-center {
            padding-top: 10px;
            border-top: 1px solid #e9ecef;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* Adjust the position of the dropdown menu */
        }

        .dropdown-toggle::after {
            display: none; /* Remove the caret that indicates dropdown */
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('title', 'Dashboard')

    @section('content')
    <div class="container mt-6">
        <!-- Row for Dashboard Title and Admin Name -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h3 class="mb-4"><i class="fa-solid fa-gauge"></i> Dashboard</h3>
            </div>
            <div class="col-md-6 text-md-end text-right">
                <div class="d-inline-block position-relative dropdown">
                    <a href="#" class="text-dark text-decoration-none dropdown-toggle" id="notificationsDropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge badge-notification xl">{{ $notifications }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                        <li><a class="dropdown-item" href="#">New owners: {{ $ownersCount }}</a></li>
                        <li><a class="dropdown-item" href="#">New tenants: {{ $tenantsCount }}</a></li>
                        <li><a class="dropdown-item" href="#">New reservations: {{ $reservationsCount }}</a></li>
                    </ul>
                </div>

                <a class="{{ request()->routeIs('profile.*') ? 'active' : '' }} text-dark text-decoration-none" href="{{ route('profile.index') }}">
                    <h5 class="d-inline-block ml-3"><i class="fas fa-user"></i> {{ Auth::user()->name }}</h5>
                </a>
            </div>
        </div>

        <!-- Existing Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-dark mb-3 shadow">
                    <div class="card-body">
                        <div>
                            <h5 style="color: white" class="card-title">Number of Owners</h5>
                            <p class="card-text" id="ownersCount">{{ $ownersCount }}</p>
                        </div>
                        <i class="fas fa-user-tie card-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-dark mb-3 shadow">
                    <div class="card-body">
                        <div>
                            <h5 style="color: white"  class="card-title">Number of Tenants</h5>
                            <p class="card-text" id="tenantsCount">{{ $tenantsCount }}</p>
                        </div>
                        <i class="fas fa-users card-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-dark mb-3 shadow">
                    <div class="card-body">
                        <div>
                            <h5 style="color: white"  class="card-title">Number of Reservations</h5>
                            <p class="card-text" id="reservationsCount">{{ $reservationsCount }}</p>
                        </div>
                        <i class="fas fa-calendar-alt card-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Table Row -->
        <div class="row mb-4">
            <!-- Chart Column -->
            <div class="col-md-6">
                <div class="card mb-4 shadow bg-dark text-white text-center">
                    <h5 style="color: white"  class="card-title mt-3"><i class="fas fa-hotel"></i> Rooms Available per Hotel</h5>
                    <div class="card-body bg-dark text-white">
                        <div class="chart-container">
                            <canvas id="roomsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Column -->
            <div class="col-md-6">
                <div class="card mb-4 shadow bg-dark text-white">
                    <h5  style="color: white"  class="card-title mt-6 text-center"><i class="fas fa-calendar-week"></i> Tenant Reservations</h5>
                    <div class="card-body bg-dark text-white table-scroll">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Tenant Name</th>
                                    <th>Hotel Rented</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->user ? $reservation->user->name : 'No tenant found' }}</td>
                                        <td>{{ $reservation->room && $reservation->room->hotel ? $reservation->room->hotel->name : 'No hotel found' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 shadow bg-dark text-white">
                    <h3 style="color: white"  class="card-title mt-3 text-center"><i class="fa-solid fa-comments"></i> Hotel Reviews</h3>
                    <div class="card-body">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Hotel Name</th>
                                    <th>Room Type</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->room && $review->room->hotel ? $review->room->hotel->name : 'No hotel found' }}</td>
                                        
                                        <td>{{ $review->room ? $review->room->room_type : 'No room found' }}</td> <!-- Add Room Type here -->
                                        
                                        <td>{{ $review->rating }}</td>
                                        <td>{{ $review->comment }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Custom Script for Charts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Pass data from PHP to JavaScript
            const roomsData = @json($roomsData);
            const reservationsData = @json($reservationsData);
            const hotels = @json($hotels);

            console.log('Rooms Data:', roomsData);
            console.log('Reservations Data:', reservationsData);
            console.log('Hotels:', hotels);

            // Prepare data for Rooms Available per Hotel Chart
            const roomsLabels = Object.keys(hotels).map(hotelId => hotels[hotelId]);
            const roomsDataCounts = roomsLabels.map(hotelName => {
                const hotelData = roomsData.find(room => hotels[room.hotel_id] === hotelName);
                return hotelData ? hotelData.count : 0;
            });

            // Initialize Rooms Available per Hotel Chart
            const roomsCtx = document.getElementById('roomsChart').getContext('2d');
            new Chart(roomsCtx, {
                type: 'bar',
                data: {
                    labels: roomsLabels,
                    datasets: [{
                        label: 'Rooms Available',
                        data: roomsDataCounts,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    <!-- Required Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    @endsection
</body>

</html>
