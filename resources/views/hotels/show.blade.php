<!-- resources/views/hotels/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotel->name }} - Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<!-- resources/views/hotels/show.blade.php -->
@extends('layouts.app')

@section('title', '{{ $hotel->name }} - Details')

@section('content')
<div class="container mt-6">
    <!-- Hotel Details Card -->
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="card-title">{{ $hotel->name }}</h1>
            <p class="card-text">
                <i class="fas fa-map-marker-alt"></i> <strong>Location:</strong> {{ $hotel->location }}
            </p>
            <p class="card-text">
                <i class="fas fa-info-circle"></i> <strong>Description:</strong> {{ $hotel->description }}
            </p>
            <p class="card-text">
                <i class="fas fa-star"></i> <strong>Rating:</strong> {{ $hotel->rating ?? 'N/A' }}
            </p>
        </div>
    </div>

    <!-- Hotel Stats Card -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">Hotel Statistics :-</h2>
            <p class="card-text">
                <i class="fas fa-bookmark"></i> <strong>Number of Reservations:</strong> {{ $reservationsCount }}
            </p>
            <p class="card-text">
                <i class="fas fa-users"></i> <strong>Number of People Booked:</strong> {{ $peopleBookedCount }}
            </p>
            <p class="card-text">
                <i class="fas fa-bed"></i> <strong>Number of Available Rooms:</strong> {{ $availableRoomsCount }}
            </p>
        </div>
    </div>

    <!-- Comments Card -->
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Comments :-</h2>
            <ul class="list-unstyled">
                @foreach($comments as $comment)
                    <li class="mb-3">
                        <i class="fas fa-comment-dots"></i> {{ $comment->comment }} 
                        <br>
                        <small><i class="fas fa-star"></i> Rating: {{ $comment->rating }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="{{ route('hotels.index') }}" class="btn  mt-4">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
</div>

<!-- Bootstrap JS and Font Awesome -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
@endsection

</body>
</html>
