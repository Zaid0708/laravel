<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Image; // Ensure this is correctly imported
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($hotelId)
    {
        $rooms = Room::with('images')->where('hotel_id', $hotelId)->get();
       // Fetch the hotel for further use in the view

        return view('owner_page.room', compact('rooms', 'hotelId')); // Pass the hotel object to the view


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($hotelId)
    {
        return view('owner_page.createroom', compact('hotelId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $hotelId)
    {
        $request->validate([
            'room_type' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'required|string',
            'availability_status' => 'required|string',
            'features' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rule for image
        ]);

        // Create the room
        $room = Room::create([
            'hotel_id' => $hotelId,
            'room_type' => $request->room_type,
            'price_per_night' => $request->price_per_night,
            'capacity' => $request->capacity,
            'description' => $request->description,
            'availability_status' => $request->availability_status,
            'features' => $request->features,
        ]);

        // Handle the file upload and save to the images table
        $imageName = null;

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');

            // Generate a unique image name using the current timestamp and the original filename
            $imageName = time() . '_' . $file->getClientOriginalName();

            // Store the file in the 'public/room_images' directory with the unique image name
            $file->storeAs('public/room_images', $imageName);
        }

        // Save the image details in the images table
        if ($imageName) {
            Image::create([
                'hotel_id' => $hotelId,
                'room_id' => $room->id, // Use the ID of the newly created room
                'image_path' => $imageName, // Save the image name
            ]);
        }

        return redirect()->route('rooms.index', $hotelId)->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
