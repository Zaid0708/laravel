<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Tenant Show</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-weight: 600;
        }
        .card-text {
            font-size: 1.1rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .container {
            max-width: 800px;
        }
    </style>
</head>

<body>
@extends('layouts.app')

@section('title', 'Tenant Show')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4"><i class="fas fa-users"></i> Tenant Show</h1>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><i class="fas fa-info-circle"></i> Tenant Information:</h3>
                <p class="card-text"><i class="fas fa-user"></i> <strong>Name:</strong> {{ $tenant->name }}</p>
                <p class="card-text"><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $tenant->email }}</p>
                <p class="card-text"><i class="fas fa-phone"></i> <strong>Phone Number:</strong> {{ $tenant->phone_number }}</p>
                <a href="{{ route('tenants.index') }}" class="btn "><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional, for interactive components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
</body>

</html>
