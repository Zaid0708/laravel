<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\Review;

class AdminController extends Controller
{
    public function index()
    {
        // Define the date range for the reservations data
        $startDate = now()->subWeeks(4);
        $endDate = now();

        // Fetch reservations with user and hotel details where user role_id is 3
        $reservations = Reservation::with('user', 'room.hotel')->take(4)->get();

        // Get the number of reservations per week for each room
        $reservationsData = DB::table('reservations')
            ->select(
                DB::raw('WEEK(check_in_date) as week'),
                DB::raw('YEAR(check_in_date) as year'),
                'room_id',
                DB::raw('COUNT(*) as count')
            )
            ->whereBetween('check_in_date', [$startDate, $endDate])
            ->groupBy('week', 'year', 'room_id')
            ->orderBy('year')
            ->orderBy('week')
            ->get()
            ->groupBy('room_id');

        // Fetch room data for available rooms
        $rooms = Room::select('hotel_id', DB::raw('count(*) as count'))
                     ->where('availability_status', 'available')
                     ->groupBy('hotel_id')
                     ->get();

        // Fetch hotel names
        $hotels = Hotel::pluck('name', 'id');

        // Get count of owners, tenants, and total reservations
        $ownersCount = User::where('role_id', 2)->count();
        $tenantsCount = User::where('role_id', 3)->count();
        $reservationsCount = Reservation::count();
        $notifications = $ownersCount + $tenantsCount + $reservationsCount;

        // Get hotel data for rooms available chart
        $hotelData = Hotel::withCount(['rooms' => function($query) {
            $query->where('availability_status', 'available');
        }])->get();
        $hotelNames = $hotelData->pluck('name', 'id');
        $roomsAvailable = $hotelData->pluck('rooms_count', 'id');

        // Fetch reviews with related hotel names
        $reviews = Review::with('room')->get();

        // Return the view with all the data
        return view('admin.dashboard', [
            'reservations' => $reservations,
            'reservationsData' => $reservationsData,
            'roomsData' => $rooms,
            'hotels' => $hotels,
            'ownersCount' => $ownersCount,
            'tenantsCount' => $tenantsCount,
            'reservationsCount' => $reservationsCount,
            'roomsAvailable' => $roomsAvailable,
            'reviews' => $reviews,
            'notifications' => $notifications
        ]);
    }
}
