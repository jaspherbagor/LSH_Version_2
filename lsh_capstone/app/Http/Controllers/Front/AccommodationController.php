<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function index()
    {
        return view('front.accommodation');
    }

    public function hotel()
    {
        $hotels = Room::where('accommodation_name', 'like', '%hotel%')->get();
        return view('front.accommodation_hotel', compact('hotels'));
    }

    public function boarding_house()
    {
        return view('front.accommodation_boarding_house');
    }

    public function apartment()
    {
        return view('front.accommodation_apartment');
    }
}
