<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Hotel2Controller extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('userPage.hotels', compact('hotels'));
    }

}
