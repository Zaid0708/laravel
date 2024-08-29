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
                <h1 class="mb-4"><i class="fa-solid fa-gauge"></i> Dashboard</h1>
            </div>
            <div class="col-md-6 text-md-end text-right">
                <!-- Admin Greeting -->
                <a class="{{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.index') }}" style="text-decoration: none;">
                    <h5 class="text-dark"><i class="fas fa-user"></i> {{ Auth::user()->name }} </h5>
                </a>
            </div>
        </div>

        <!-- Existing Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-dark mb-3 shadow">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Number of Owners</h5>
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
                            <h5 class="card-title">Number of Tenants</h5>
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
                            <h5 class="card-title">Number of Reservations</h5>
                            <p class="card-text" id="reservationsCount">{{ $reservationsCount }}</p>
                        </div>
                        <i class="fas fa-calendar-alt card-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- First Chart: Reservations per Week for Each Hotel -->
            <div class="col-md-6">
                <div class="card mb-4 shadow bg-dark text-white text-center"><br>
                <h5 class="card-title"><i class="fas fa-chart-line"></i> Reservations per Week</h5>
                    <div class="card-body bg-dark text-white">
                        <div class="chart-container">
                            <canvas id="reservationsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Chart: Number of Rooms Available for Each Hotel -->
            <div class="col-md-6">
                <div class="card mb-4 shadow bg-dark text-white text-center"><br>
                <h5 class="card-title"><i class="fas fa-hotel"></i> Rooms Available per Hotel</h5>
                    <div class="card-body bg-dark text-white">
                        
                        <div class="chart-container">
                            <canvas id="roomsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    <!-- Custom Script for Charts -->
    <script>
        // Function to initialize charts (this won't run until data is fetched)
        function initializeCharts() {
            // Example data, replace with dynamic data from backend
            const reservationsData = [12, 19, 3, 5, 2, 3];
            const roomsData = [10, 20, 30, 40, 50, 60];
            const labels = ['Hotel 1', 'Hotel 2', 'Hotel 3', 'Hotel 4', 'Hotel 5', 'Hotel 6'];

            const reservationsCtx = document.getElementById('reservationsChart').getContext('2d');
            const roomsCtx = document.getElementById('roomsChart').getContext('2d');

            // Reservations Chart
            new Chart(reservationsCtx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Reservations per Week',
                        data: reservationsData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
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

            // Rooms Available Chart
            new Chart(roomsCtx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Rooms Available',
                        data: roomsData,
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
        }

        // Placeholder for initializing charts - replace this with actual data fetching logic
        document.addEventListener('DOMContentLoaded', function () {
            initializeCharts();
        });
    </script>

    @endsection
</body>

</html>
