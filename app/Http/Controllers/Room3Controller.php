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
    // Get the room along with its images
    $room = Room::with(['images'])->findOrFail($roomId);

    // Get the reviews associated with the specific room
    $reviews = Review::where('room_id', $roomId)->get();

    return view('userPage.room-details', compact('room', 'reviews'));
}




public function storeReview(Request $request, $roomId)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to submit a review.');
    }

    $validatedData = $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string',
    ]);

    // Check if validation passed and data is correct
    logger($validatedData);

    $room = Room::findOrFail($roomId);

    // Store the review in the database
    $review = Review::create([
        'room_id' => $room,
        'user_id' => auth()->id(),
        'rating' => $validatedData['rating'],
        'comment' => $validatedData['comment'],
    ]);

    // Check if the review was successfully stored
    if ($review) {
        return redirect()->back()->with('success', 'Review added successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to add the review.');
    }
}
}
