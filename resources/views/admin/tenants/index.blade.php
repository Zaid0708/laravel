<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tenant Management')</title>

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

    @section('title', 'Tenant Management')

    @section('content')
    <div class="container mt-4">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="mb-4">
                <i class="fas fa-users"></i> Tenant Management
            </h1>
        </div>

        <!-- Add Tenant Button -->
        <a href="{{ route('tenants.create') }}" class="btn btn-dark mb-3">
            <i class="fas fa-user-plus btn-icon"></i> Add a new tenant
        </a>

        <!-- Search Form -->
        <form method="GET" action="{{ route('tenants.index') }}" class="mb-4">
            <div class="input-group">
                <input class="form-control" type="text" name="search" placeholder="Search By tenant Name">
                <button class="btn btn-dark" type="submit">
                    <i class="fas fa-search btn-icon"></i> Search
                </button>
            </div>
        </form>

        <!-- Tenants Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                    <tr>
                        <td>{{ $tenant->name }}</td>
                        <td>{{ $tenant->email }}</td>
                        <td>{{ $tenant->phone_number }}</td>
                        
                        <td>
                            <a href="{{ route('tenants.show', $tenant->id) }}" class="btn  btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn  btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('tenants.destroy', $tenant->id) }}" style="display:inline;">
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
