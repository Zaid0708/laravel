<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Hotel2Controller extends Controller
{
    public function index()
    {
        // Fetch all hotels
        $hotels = Hotel::all();

        // For each hotel, find the lowest room price
        foreach ($hotels as $hotel) {
            $hotel->min_price = Room::where('hotel_id', $hotel->id)->min('price_per_night');
        }

        return view('userPage.hotels', compact('hotels'));
    }
    public function search(Request $request)
{
    // Validate the input data
    $validated = $request->validate([
        'check_in' => 'required',
        'check_out' => 'required',
        'guests' => 'required|integer|min:1',
        'location' => 'required',
    ]);

    // Retrieve the search parameters
    $checkIn = $request->input('check_in');
    $checkOut = $request->input('check_out');
    $guests = $request->input('guests');
    $location = $request->input('location');

    // Query the hotels based on the criteria
    $hotels = Hotel::where('location', $location)
        ->whereHas('rooms', function ($query) use ($checkIn, $checkOut, $guests) {
            $query->where('capacity', '>=', $guests)
                ->whereDoesntHave('availabilities', function ($subQuery) use ($checkIn, $checkOut) {
                    $subQuery->whereBetween('date', [$checkIn, $checkOut])
                        ->where('status', 'booked');
                });
        })
        ->with('rooms') // Eager load rooms to get min price later
        ->get();

    // Calculate the minimum price for each hotel
    foreach ($hotels as $hotel) {
        $hotel->min_price = $hotel->rooms->min('price_per_night');
    }

    // Pass the hotels data to the hotels.blade.php view
    return view('userPage.hotels', compact('hotels'));
}

}
