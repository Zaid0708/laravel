<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('title', 'Profile')

    @section('content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-header  text-dark d-flex align-items-center">
                <i class="fas fa-user-circle fa-2x me-2"></i>
                <h1 class="mb-0">My Profile</h1>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
                @endif

                <!-- Display user information -->
                <div class="row">
                    <div class="col-md-6">
                        <p><strong><i class="fas fa-user"></i> Name:</strong> {{ $user->name }}</p>
                        <p><strong><i class="fas fa-envelope"></i> Email:</strong> {{ $user->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <!-- You can add more user details or profile picture here -->
                    </div>
                </div>

                <!-- Edit Profile Link -->
                <a href="{{ route('profile.edit') }}" class="btn btn-dark">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection
</body>

</html>
