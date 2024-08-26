<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Room;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        // Find the room by ID

        // Create a new review
        $review = new Review();
        $review->user_id = Auth::id();  // Store the currently authenticated user's ID
        $review->room_id = $request->room_id;  // Store the room ID
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->review_date = Carbon::now();  // Set the current date and time
        $review->save();

        return back()->with('success', 'Review submitted successfully.');
    }
}
