<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmation</h1>
    <p>Dear {{ $bookingDetails['name'] }},</p>
    <p>Thank you for booking with us! Here are your booking details:</p>

    <ul>
        <li><strong>Check-In:</strong> {{ $bookingDetails['checkIn'] }}</li>
        <li><strong>Check-Out:</strong> {{ $bookingDetails['checkOut'] }}</li>
        <li><strong>Room Type:</strong> {{ $bookingDetails['room_type'] }}</li>
        <li><strong>Price per Night:</strong> ${{ $bookingDetails['price_per_night'] }}</li>
        <li><strong>Number of Nights:</strong> {{ $bookingDetails['numberOfNights'] }}</li>
        <li><strong>Total Price:</strong> ${{ $bookingDetails['totalPrice'] }}</li>
    </ul>

    <p>We look forward to welcoming you!</p>

    <p>Best Regards,<br>
    The Hotel Team</p>
</body>
</html>
