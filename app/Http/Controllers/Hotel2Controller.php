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
}
