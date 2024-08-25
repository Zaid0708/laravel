<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;

class Room2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($hotelId)
    {
        // Fetch the rooms along with their images for the specified hotel
        $rooms = Room::with('images')->where('hotel_id', $hotelId)->get();

        // Fetch the hotel details based on the hotel ID
        $hotel = Hotel::findOrFail($hotelId);

        // Pass both rooms and hotel to the view
        return view('userPage.room', compact('rooms', 'hotel'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}











