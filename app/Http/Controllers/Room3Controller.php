<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Review;
use Illuminate\Http\Request;

class Room3Controller extends Controller
{
    public function index($roomId)
    {
        $room = Room::with('images')->findOrFail($roomId);
        $hotel = Hotel::findOrFail($room->hotel_id);
        $reviews = Review::where('hotel_id', $hotel->id)->get(); // Fetch reviews for the hotel

        return view('userPage.room-details', compact('room', 'hotel', 'reviews'));
    }




    public function storeReview(Request $request, $roomId)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to submit a review.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $room = Room::findOrFail($roomId);

        Review::create([
            'room_id' => $roomId,
            'hotel_id' => $room->hotel_id,
            'user_id' => auth()->id(),
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
            'review_date' => now()
        ]);

        return redirect()->back()->with('success', 'Review added successfully.');
    }
}
