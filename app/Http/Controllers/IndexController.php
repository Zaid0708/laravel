<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class IndexController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        $locations = Hotel::select('location')->distinct()->get();
        return view('userPage.index', compact('hotels', 'locations'));
    }
}
