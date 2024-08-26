<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
class BookingController extends Controller
{
    // Show the booking form for a specific room
    public function showBookingForm($roomId)
    {
        $room = Room::findOrFail($roomId);
        $hotelid=$room->hotel_id;
        $hotel = Hotel::find($hotelid);
        return view('userPage.book-now', compact('room','hotel'));
    }

    // Process the booking form submission
    public function processBooking(Request $request)
    {
        // Validate the input dates as strings
        $validated = $request->validate([
            'check_in' => 'required', // Validate as a required string
            'check_out' => 'required', // Validate as a required string
            'room_id' => 'required|exists:rooms,id' // Ensure room_id is valid
        ]);

        // Store the check-in and check-out dates in the session
        session([
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'room_id' => $validated['room_id'], // Store room_id
        ]);

        // Redirect to the user information and payment page
        return redirect()->route('user.info.payment');
    }

    // Show the user information and payment page
    public function showUserInfoPayment()
    {
        $checkIn = session('check_in');
        $checkOut = session('check_out');
        $roomId = session('room_id');
    
        $checkInDate = Carbon::parse($checkIn);
        $checkOutDate = Carbon::parse($checkOut);
        $numberOfNights = $checkInDate->diffInDays($checkOutDate);
    
        $room = Room::findOrFail($roomId);
        $totalPrice = $numberOfNights * $room->price_per_night;
    
        // Fetch authenticated user's information
        $user = Auth::user();
    
        return view('userPage.info', compact('checkIn', 'checkOut', 'room', 'totalPrice', 'numberOfNights', 'user'));
    }
    public function finalizeBooking(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone_number' => 'required|string',
        'payment_method' => 'required|string',
    ]);

    // Retrieve session data
    $checkIn = session('check_in');
    $checkOut = session('check_out');
    $roomId = session('room_id');
    $userId = Auth::id(); // Get the authenticated user's ID

    // Parse dates and calculate total price
    $checkInDate = Carbon::parse($checkIn);
    $checkOutDate = Carbon::parse($checkOut);
    $numberOfNights = $checkInDate->diffInDays($checkOutDate);
    
    $room = Room::findOrFail($roomId);
    $totalPrice = $numberOfNights * $room->price_per_night;

    // Create a new reservation
    Reservation::create([
        'user_id' => $userId,
        'room_id' => $roomId,
        'check_in_date' => $checkInDate->format('Y-m-d'),
        'check_out_date' => $checkOutDate->format('Y-m-d'),
        'total_price' => $totalPrice,
    ]);

    // Clear session data after booking is processed
    session()->forget(['check_in', 'check_out', 'room_id']);

    // Redirect to a confirmation page or another appropriate page
    return redirect()->route('userPage.index');
}
}
