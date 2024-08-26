<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Room</title>
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
                    <h3>Create a New Room</h3>
                    <form method="POST" action="{{ route('rooms.store', ['hotelId' => $hotelId]) }}"
                        enctype="multipart/form-data">
                        @csrf <!-- Include CSRF token for security -->

                        <!-- Hidden input for hotelId -->
                        <input type="hidden" name="hotel_id" value="{{ $hotelId }}">

                        <div class="form-group">
                            <label for="room_type">Room Type:</label>
                            <input type="text" class="form-control" id="room_type" name="room_type"
                                placeholder="Enter room type" required>
                        </div>

                        <div class="form-group">
                            <label for="price_per_night">Price Per Night:</label>
                            <input type="number" step="0.01" class="form-control" id="price_per_night"
                                name="price_per_night" placeholder="Enter price per night" required>
                        </div>

                        <div class="form-group">
                            <label for="capacity">Capacity:</label>
                            <input type="number" class="form-control" id="capacity" name="capacity"
                                placeholder="Enter room capacity" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter room description"
                                required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="availability_status">Availability Status:</label>
                            <select class="form-control" id="availability_status" name="availability_status" required>
                                <option value="available">Available</option>
                                <option value="not_available">Not Available</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="features">Features:</label>
                            <textarea class="form-control" id="features" name="features" rows="3" placeholder="Enter room features" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="capacity">bed:</label>
                            <input type="number" class="form-control" id="bed" name="bed"
                                placeholder="Enter room bed" required>
                        </div>

                        <div class="form-group">
                            <label for="capacity">bathroom:</label>
                            <input type="number" class="form-control" id="bathroom" name="bathroom"
                                placeholder="Enter room bathroom" required>
                        </div>

                        <div class="form-group">
                            <label for="services">services:</label>
                            <textarea class="form-control" id="services" name="services" rows="3" placeholder="Enter room services" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="capacity">size:</label>
                            <input type="text" class="form-control" id="size" name="size"
                                placeholder="Enter room size" required>
                        </div>


                        <!-- Optional File Input for Room Picture -->


                        <div class="form-group">
                            <label for="picture">Room Picture:</label>
                            <input type="file" class="form-control-file" id="picture" name="picture"
                                accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="ch" href="javascript:history.back()">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
