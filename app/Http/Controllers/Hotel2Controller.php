<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;

class Hotel2Controller extends Controller
{
    /**
     * Display a listing of hotels based on search criteria (name and rating).
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $hotels = $this->filterHotels($request);
       
        return view('userPage.hotels', compact('hotels'));
    }

    /**
     * Search hotels based on location and guests' capacity.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function searchByLocationAndGuests(Request $request)
    {
        $validated = $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'guests' => 'required|integer|min:1',
            'location' => 'required|string',
        ]);

        $checkIn = $request->input('check_in');
        $checkOut = $request->input('check_out');
        $guests = $request->input('guests');
        $location = $request->input('location');

        $hotels = Hotel::where('location', $location)
            ->whereHas('rooms', function ($query) use ($checkIn, $checkOut, $guests) {
                $query->where('capacity', '>=', $guests)
                    ->whereDoesntHave('reservations', function ($query) use ($checkIn, $checkOut) {
                        $query->where(function ($query) use ($checkIn, $checkOut) {
                            $query->whereBetween('check_in_date', [$checkIn, $checkOut])
                                ->orWhereBetween('check_out_date', [$checkIn, $checkOut])
                                ->orWhere(function ($query) use ($checkIn, $checkOut) {
                                    $query->where('check_in_date', '<=', $checkIn)
                                        ->where('check_out_date', '>=', $checkOut);
                                });
                        });
                    });
            })
            ->with('rooms')
            ->get();
            foreach ($hotels as $hotel) {
                $hotel->min_price = $hotel->rooms->min('price_per_night');
            }

        // Pass hotels and input values to the view
        return view('userPage.hotels', compact('hotels', 'checkIn', 'checkOut', 'guests', 'location'));
    }

    /**
     * Filter hotels based on search criteria (name and rating).
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function filterHotels(Request $request)
    {
        $query = Hotel::query();

        // Search by hotel name
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by exact rating
        if ($request->has('rating') && $request->rating != '') {
            $query->where('rating', $request->rating);
        }

        $hotels = $query->with('rooms')->get();

        // Attach min price to each hotel
        foreach ($hotels as $hotel) {
            $hotel->min_price = $hotel->rooms->min('price_per_night');
        }

        return $hotels;
    }
   
    
}
