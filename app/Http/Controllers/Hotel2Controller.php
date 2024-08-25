<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Hotel2Controller extends Controller
{
    public function index(Request $request)
    {
            $query = Hotel::query();

            if ($request->has('search') && !empty($request->search)) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

            if ($request->has('rating') && $request->rating != '') {
                $query->where('rating', $request->rating);
            }

            $hotels = $query->get();

            foreach ($hotels as $hotel) {
                $hotel->min_price = Room::where('hotel_id', $hotel->id)->min('price_per_night');
            }

            return view('userPage.hotels', compact('hotels'));
        }



    public function search(Request $request)
{
    $validated = $request->validate([
        'check_in' => 'required|date',
        'check_out' => 'required|date|after:check_in',
        'guests' => 'required|integer|min:1',
        'location' => 'required|string',
    ]);


    $checkIn = $request->input('check_in');
    $checkOut = $request->input('check_out');
    $guests = $request->input('guests');
    $location = $request->input('location');


    $hotels = Hotel::where('location', $location)
        ->whereHas('rooms', function ($query) use ($checkIn, $checkOut, $guests) {
            $query->where('capacity', '>=', $guests)
                ->whereDoesntHave('availabilities', function ($subQuery) use ($checkIn, $checkOut) {
                    $subQuery->whereBetween('date', [$checkIn, $checkOut])
                        ->where('status', 'booked');
                });
        })
        ->with('rooms')
        ->get();

    foreach ($hotels as $hotel) {
        $hotel->min_price = $hotel->rooms->min('price_per_night');
    }


    return view('userPage.hotels', compact('hotels'));
}


}
