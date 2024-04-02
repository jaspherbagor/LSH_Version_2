<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function index()
    {
        return view('front.accommodation');
    }

    public function hotel()
    {
        return view('front.accommodation_hotel');
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
