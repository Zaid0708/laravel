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
        // Fetch the room and hotel details
        $room = Room::findOrFail($roomId);
        $hotelid = $room->hotel_id;
        $hotel = Hotel::find($hotelid);
    
        // Fetch booked dates for the room from reservations
        $reservations = Reservation::where('room_id', $roomId)->get();
    
        $bookedDates = [];
        foreach ($reservations as $reservation) {
            $bookedDates = array_merge($bookedDates, $this->generateDateRange($reservation->check_in_date, $reservation->check_out_date));
        }
    
        // Pass the room, hotel, and booked dates to the view
        return view('userPage.book-now', compact('room', 'hotel', 'bookedDates'));
    }
    
    // Helper function to generate a date range array between check-in and check-out dates
    private function generateDateRange($startDate, $endDate)
    {
        $dates = [];
        $currentDate = Carbon::parse($startDate);
    
        while ($currentDate->lessThanOrEqualTo(Carbon::parse($endDate))) {
            $dates[] = $currentDate->format('Y-m-d');
            $currentDate->addDay();
        }
    
        return $dates;
    }
    

    // Process the booking form submission
    public function processBooking(Request $request)
    {
        // Validate the input dates as strings
        $validated = $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'room_id' => 'required|exists:rooms,id'
        ]);

        // Retrieve the room and convert dates
        $roomId = $validated['room_id'];
        $checkInDate = Carbon::parse($validated['check_in']);
        $checkOutDate = Carbon::parse($validated['check_out']);

        // Check if the dates are already booked
        if ($this->isDateRangeBooked($roomId, $checkInDate->format('Y-m-d'), $checkOutDate->format('Y-m-d'))) {
            return back()->withErrors(['dates' => 'The selected dates are already booked. Please choose different dates.']);
        }

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
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to login if no user is authenticated, preserving the intended URL
            return redirect()->guest(route('login.form'))->with('message', 'Please log in to continue.');
        }
    
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
    
    // Finalize the booking and store in the database
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
        // session()->forget(['check_in', 'check_out', 'room_id']);
    
        // Set a session variable to indicate success
        
        session()->flash('booking_success', true);
    
        // Redirect to a confirmation page or another appropriate page
        return redirect()->route('userPage.info');
    }
    
    // Check if the date range is already booked
    private function isDateRangeBooked($roomId, $checkIn, $checkOut)
    {
        $reservations = Reservation::where('room_id', $roomId)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in_date', [$checkIn, $checkOut])
                      ->orWhereBetween('check_out_date', [$checkIn, $checkOut])
                      ->orWhere(function ($query) use ($checkIn, $checkOut) {
                          $query->where('check_in_date', '<=', $checkIn)
                                ->where('check_out_date', '>=', $checkOut);
                      });
            })
            ->exists();

        return $reservations;
    }
}
