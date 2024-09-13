<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tenant</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            color: #495057;
            background-color: #e2e6ea;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #dae0e5;
        }
        .icon {
            font-size: 1.2rem;
            margin-right: 8px;
        }
    </style>
</head>
<body>
@extends('layouts.app')

@section('title', 'Edit Tenant')

@section('content')
    <div class="container mt-7">

        <h1 class="mb-4"><i class="fas fa-user-edit icon"></i>Edit Tenant</h1>
        <form method="POST" action="{{ route('tenants.update', $tenant->id) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name"><i class="fas fa-user icon"></i>Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $tenant->name }}" required>
            </div>
            
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope icon"></i>Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $tenant->email }}" required>
            </div>
            
            <div class="form-group">
                <label for="password"><i class="fas fa-lock icon"></i>Password:</label>
                <input type="password" name="password" id="password" class="form-control" >
            </div>
            
            <div class="form-group">
                <label for="password_confirmation"><i class="fas fa-key icon"></i>Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
            </div>

            <a href="{{ route('tenants.index') }}" class="btn  mt-3"><i class="fas fa-arrow-left icon"></i>Back</a>
                    <button type="submit" class="btn btn-dark mt-3"><i class="fas fa-save icon"></i>Edit</button>

        
        </form>

    </div>
  
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection
</body>
</html>
