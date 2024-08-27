<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Review;


class HotelAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
               // Fetch hotels owned by the authenticated user
        // Fetch all hotels owned by the logged-in user
        $hotels = Hotel::all();

        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);

        // Calculate various counts
        $reservationsCount = Reservation::where('hotel_id', $hotel->id)->count();
        $peopleBookedCount = Reservation::where('hotel_id', $hotel->id)->distinct('user_id')->count('user_id');
        $availableRoomsCount = Room::where('hotel_id', $hotel->id)->where('availability_status', 'available')->count();
        $comments = Review::where('hotel_id', $hotel->id)->get();

        return view('hotels.show', compact('hotel', 'reservationsCount', 'peopleBookedCount', 'availableRoomsCount', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
