<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class HotelController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        // Fetch hotels associated with the authenticated user ID
        $hotels = Hotel::where('owner_id', $userId)->get();

        foreach($hotels as $hotel){
            $hotel->min_price_per_night=Room::where('hotel_id',$hotel->id)->min('price_per_night');
        }

        return view('owner_page.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owner_page.createhotel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'contact_info' => 'required|string|max:255',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        $filename = null;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . $file->getClientOriginalName(); // Create a unique filename
            $filePath = $file->storeAs('public/hotel_images', $filename); // Store the file in 'storage/app/public/hotel_images'
        }

        // Save the hotel data along with the file path to the database
        // Assuming you have a Hotel model and 'hotels' table with an 'owner_id' column
        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->location = $request->location;
        $hotel->description = $request->description;
        $hotel->rating = $request->rating;
        $hotel->contact_info = $request->contact_info;
        $hotel->hotel_image = $filename; // Save the filename in the database
        $hotel->owner_id = Auth::id(); // Set the owner_id to the ID of the currently authenticated user
        $hotel->save();

        return redirect()->route('owner.index')->with('success', 'Hotel created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }


    public function showRooms($hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        $rooms = Room::where('hotel_id', $hotelId)->get();

        return view('hotel.rooms', compact('hotel', 'rooms'));
    }



    public function destroy($id)
    {
        // Find the hotel by ID
        $hotel = Hotel::findOrFail($id);

        // Get all rooms associated with this hotel
        $rooms = Room::where('hotel_id', $hotel->id)->get();

        // Iterate through each room to delete its related images and reviews first
        foreach ($rooms as $room) {
            // Delete related images
            if ($room->images) {
                foreach ($room->images as $image) {
                    // Delete the image file from storage
                    Storage::delete('public/room_images/' . $image->image_path);
                    // Delete the image record from the database
                    $image->delete();
                }
            }
            // Delete related reviews
            if ($room->reviews) {
                foreach ($room->reviews as $review) {
                    $review->delete();
                }
            }
            // Delete the room after deleting its images and reviews
            $room->delete();
        }

        // Delete related hotel reviews
        if ($hotel->reviews) {
            foreach ($hotel->reviews as $review) {
                $review->delete();
            }
        }

        // Now delete the hotel
        $hotel->delete();

        return redirect()->route('owner.index')->with('success', 'Hotel, associated rooms, images, and reviews deleted successfully.');
    }




}
