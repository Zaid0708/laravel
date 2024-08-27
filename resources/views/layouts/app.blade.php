<!DOCTYPE html>
<<<<<<< Updated upstream
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
=======
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>@yield('title', 'Dashboard')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            overflow-y: auto;
        }

        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            display: block;
            font-size: 18px;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .sidebar .active {
            background-color: #007bff;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="{{ url('admin/dashboard') }}" class="navbar-brand text-center my-4">
            <h4 class="text-white"><i class="fa-duotone fa-solid fa-gauge"></i> Dashboard</h4>
        </a>
        <a class="{{ request()->routeIs('tenants.*') ? 'active' : '' }}" href="{{ route('tenants.index') }}">
            <i class="fas fa-users"></i> Tenants
        </a>
        <a class="{{ request()->routeIs('owners.*') ? 'active' : '' }}" href="{{ route('owners.index') }}">
            <i class="fas fa-user-tie"></i> Owners
        </a>
        <a class="{{ request()->routeIs('hotels.*') ? 'active' : '' }}" href="{{ route('hotels.index') }}">
            <i class="fas fa-hotel"></i> Hotels
        </a>
        <a class="{{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.index') }}">
            <i class="fas fa-user"></i> Profile
        </a>
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-link text-white">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

>>>>>>> Stashed changes
