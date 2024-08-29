<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $ownersCount = User::where('role_id', 2)->count(); // Assuming role_id for owners is 2
        $tenantsCount = User::where('role_id', 3)->count(); // Assuming role_id for tenants is 3
        $reservationsCount = Reservation::count();

        

        return view('admin.dashboard', compact('ownersCount', 'tenantsCount', 'reservationsCount'));
    }
    public function getCounts()
{
    $ownersCount = User::where('role_id', 2)->count();
    $tenantsCount = User::where('role_id', 3)->count();
    $reservationsCount = Reservation::count();

    return response()->json([
        'ownersCount' => $ownersCount,
        'tenantsCount' => $tenantsCount,
        'reservationsCount' => $reservationsCount,
    ]);
}

}

