<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Hotel</title>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
    <!-- CSS Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="booking-form">
                    <h3>Edit Room</h3>
                    <hr>
                    <form method="POST" action="{{ route('rooms.update', $room->id) }}" enctype="multipart/form-data">
                        @csrf <!-- Include CSRF token for security -->
                        @method('PUT') <!-- Use PUT method for updating -->
    
                        <!-- Existing Room Picture Preview (Optional) -->
                        @if ($room->images->isNotEmpty())
                            <div class="form-group">
                                <label>Current Room Picture:</label>
                                <div>
                                    <img style="height: 275px" src="{{ asset('storage/room_images/' . $room->images->first()->image_path) }}" alt="Room Picture" style="max-width: 100%; height: auto;">
                                </div>
                            </div>
                        @endif
    
                        <!-- File Input for Room Picture -->
                        <div class="form-group">
                            <label for="picture">Update Room Picture:</label>
                            <input type="file" class="form-control-file" id="picture" name="picture" accept="image/*">
                        </div>
    
                        <!-- Room Type -->
                        <div class="form-group">
                            <label for="room_type">Room Type:</label>
                            <input type="text" class="form-control" id="room_type" name="room_type" value="{{ $room->room_type }}" placeholder="Enter room type" required>
                        </div>
    
                        <!-- Price per Night -->
                        <div class="form-group">
                            <label for="price_per_night">Price per Night:</label>
                            <input type="number" class="form-control" id="price_per_night" name="price_per_night" value="{{ $room->price_per_night }}" placeholder="Enter price per night" min="0" required>
                        </div>
    
                        <!-- Capacity -->
                        <div class="form-group">
                            <label for="capacity">Capacity:</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $room->capacity }}" placeholder="Enter room capacity" min="1" required>
                        </div>
    
                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required>{{ $room->description }}</textarea>
                        </div>
    
                        <!-- Availability Status -->
                        <div class="form-group">
                            <label for="availability_status">Availability Status:</label>
                            <input type="text" class="form-control" id="availability_status" name="availability_status" value="{{ $room->availability_status }}" placeholder="Enter availability status" required>
                        </div>
    
                        <!-- Features -->
                        <div class="form-group">
                            <label for="features">Features:</label>
                            <textarea class="form-control" id="features" name="features" rows="2" placeholder="Enter features">{{ $room->features }}</textarea>
                        </div>
    
                        <!-- Bed -->
                        <div class="form-group">
                            <label for="bed">Bed:</label>
                            <input type="number" class="form-control" id="bed" name="bed" value="{{ $room->bed }}" placeholder="Enter number of beds" min="1" required>
                        </div>
    
                        <!-- Bathroom -->
                        <div class="form-group">
                            <label for="bathroom">Bathroom:</label>
                            <input type="number" class="form-control" id="bathroom" name="bathroom" value="{{ $room->bathroom }}" placeholder="Enter number of bathrooms" min="1" required>
                        </div>
    
                        <!-- Services -->
                        <div class="form-group">
                            <label for="services">Services:</label>
                            <textarea class="form-control" id="services" name="services" rows="2" placeholder="Enter services">{{ $room->services }}</textarea>
                        </div>
    
                        <!-- Size -->
                        <div class="form-group">
                            <label for="size">Size:</label>
                            <input type="text" class="form-control" id="size" name="size" value="{{ $room->size }}" placeholder="Enter room size" required>
                        </div>
    
                        <!-- Submit and Back Buttons -->
                        <button type="submit" class="ab">Update</button>
                        <a href="javascript:history.back()" class="ab">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
