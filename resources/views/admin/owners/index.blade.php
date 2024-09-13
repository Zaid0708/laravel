<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Owner Management')</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        .page-header {
            margin-bottom: 20px;
        }
        .btn-icon {
            font-size: 1.2rem;
            margin-right: 5px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('title', 'owner Management')

    @section('content')
    <div class="container mt-4">
        <!-- Page Header -->
        <div class="page-header">
            <h3 class="mb-4">
                <i class="fas fa-user"></i> Owner Management
            </h3>
        </div>

        <!-- Add owner Button -->
        <a href="{{ route('owners.create') }}" class="btn btn-dark mb-3">
            <i class="fas fa-user-plus btn-icon"></i> Add a new Owner
        </a>

        <!-- Search Form -->
        <form method="GET" action="{{ route('owners.index') }}" class="mb-4">
            <div class="input-group">
                <input class="form-control" type="text" name="search" placeholder="Search By Name">
                <button class="btn btn-dark" type="submit">
                    <i class="fas fa-search btn-icon"></i> Search
                </button>
            </div>
        </form>

        <!-- owners Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Hotel Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($owners as $owner)
                    <tr>
                        <td>{{ $owner->name }}</td>
                        <td>{{ $owner->email }}</td>
                        <td>{{ $owner->phone_number }}</td>
                        <td>{{ $owner->hotel ? $owner->hotel->name : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('owners.show', $owner->id) }}" class="btn  btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('owners.edit', $owner->id) }}" class="btn  btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('owners.destroy', $owner->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn  btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    @endsection
</body>

</html>
