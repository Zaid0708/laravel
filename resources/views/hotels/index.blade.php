<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .hotel-card {
            transition: transform 0.2s;
        }
        .hotel-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
@extends('layouts.app')

@section('title', 'Hotels')

@section('content')
<div class="container mt-4">
    <h1 class="mb-5"><i class="fas fa-hotel"></i> Hotels</h1>
    <div class="row">
        @foreach($hotels as $hotel)
        <div class="col-md-4 mb-4">
            <div class="card hotel-card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-hotel"></i> {{ $hotel->name }}</h5>
                    <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $hotel->location }}</p>
                    <p class="card-text"><i class="fa-solid fa-star"></i>{{ $hotel->description }}</p>
                    <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-dark">
                        <i class="fas fa-info-circle"></i> View Details
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
