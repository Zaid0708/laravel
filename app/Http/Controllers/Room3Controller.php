<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class Room3Controller extends Controller
{
    public function index()
    {
        // Fetch all rooms with their related images
        $rooms = Room::with('images')->get();  // 'images' should be the correct relationship name
        return view('userPage.room-details', compact('rooms'));
    }
}
