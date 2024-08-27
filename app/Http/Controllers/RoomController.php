<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Image; // Ensure this is correctly imported
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'bed' => 'required|integer|min:1',
            'bathroom' => 'required|integer|min:1',
            'services' => 'nullable|string',
            'size' => 'required|string|max:255',
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
            'bed' => $request->bed,
            'bathroom' => $request->bathroom,
            'services' => $request->services,
            'size' => $request->size,
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
        // Pass the room object to the edit view
        return view('owner_page.editroom', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        // Validate the incoming request data
        $request->validate([
            'room_type' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'required|string',
            'availability_status' => 'required|string',
            'features' => 'nullable|string',
            'bed' => 'required|integer|min:1',
            'bathroom' => 'required|integer|min:1',
            'services' => 'nullable|string',
            'size' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rule for image
        ]);

        // Update the room details
        $room->update([
            'room_type' => $request->room_type,
            'price_per_night' => $request->price_per_night,
            'capacity' => $request->capacity,
            'description' => $request->description,
            'availability_status' => $request->availability_status,
            'features' => $request->features,
            'bed' => $request->bed,
            'bathroom' => $request->bathroom,
            'services' => $request->services,
            'size' => $request->size,
        ]);

        // Handle the file upload if a new image is provided
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/room_images', $imageName);

            // Update the image details in the images table
            $image = $room->images->first(); // Assuming a room can have only one image for simplicity
            if ($image) {
                // Delete the old image file
                Storage::delete('public/room_images/' . $image->image_path);

                // Update the image record with the new image name
                $image->image_path = $imageName;
                $image->save();
            } else {
                // Create a new image record if none exists
                Image::create([
                    'hotel_id' => $room->hotel_id,
                    'room_id' => $room->id,
                    'image_path' => $imageName,
                ]);
            }
        }

        // Redirect back to the rooms list with success message
        return redirect()->route('rooms.index', ['hotelId' => $room->hotel_id])
                         ->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the room by its ID
        $room = Room::findOrFail($id);
        
        // Get the hotel ID associated with this room
        $hotelId = $room->hotel_id;
    
        // Perform the deletion
        $room->delete();
    
        // Redirect to the rooms index route with the hotelId parameter
        return redirect()->route('rooms.index', ['hotelId' => $hotelId])
                         ->with('success', 'Room deleted successfully.');
    }
}
