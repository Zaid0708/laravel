<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Tenant</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('title', 'Add a New Tenant')

    @section('content')
    <div class="container mt-7">

                <h3 class="card-title"><i class="fas fa-user-plus"></i> Add a New Tenant</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('tenants.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number"><i class="fas fa-phone"></i> Phone Number:</label>
                        <input type="number" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation"><i class="fas fa-key icon"></i> Confirm Password:</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    <a href="{{ route('tenants.index') }}" class="btn  mt-3"><i class="fas fa-arrow-left icon"></i> Back</a>

                    <button type="submit" class="btn btn-dark mt-3"><i class="fas fa-save icon"></i> Save</button>
                </form>
            </div>
  

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection
</body>

</html>
