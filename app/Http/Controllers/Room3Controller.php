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


}
