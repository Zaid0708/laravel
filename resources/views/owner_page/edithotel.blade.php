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
                    <h3>Edit Hotel</h3>
                    <form method="POST" action="{{ route('hotels.update', $hotel->id) }}" enctype="multipart/form-data">
                        @csrf <!-- Include CSRF token for security -->
                        @method('PUT') <!-- Use PUT method for updating -->
                        @if ($hotel->hotel_image)
                        <div class="form-group">
                            <label>Current Hotel Picture:</label>
                            <div>
                                <img style="height: 275px" src="{{ asset('storage/hotel_images/' . $hotel->hotel_image) }}" alt="Hotel Picture" style="max-width: 100%; height: auto;">
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="picture">Update Hotel Picture:</label>
                        <input type="file" class="form-control-file" id="picture" name="picture" accept="image/*">
                    </div>

                        <div class="form-group">
                            <label for="name">Hotel Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" placeholder="Enter hotel name" required>
                        </div>
    
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ $hotel->location }}" placeholder="Enter hotel location" required>
                        </div>
    
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required>{{ $hotel->description }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <input type="number" class="form-control" id="rating" name="rating" value="{{ $hotel->rating }}" placeholder="Enter rating (1-5)" min="1" max="5" required>
                        </div>
    
                        <div class="form-group">
                            <label for="contact_info">Contact Information:</label>
                            <input type="text" class="form-control" id="contact_info" name="contact_info" value="{{ $hotel->contact_info }}" placeholder="Enter contact information" required>
                        </div>
    
                        <!-- Existing Hotel Picture Preview (Optional) -->
                       
                        <!-- New File Input for Hotel Picture -->
                      
    
                        <button type="submit" class="ab">Update</button>
                        <a href="javascript:history.back()" class="ab">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
