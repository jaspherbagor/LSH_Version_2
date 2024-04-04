<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AccommodationType;
use App\Models\Room;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodation_types = AccommodationType::get();
        return view('front.accommodation', compact('accommodation_types'));
    }

    public function accommodation_detail($accomtype_id)
    {
        
    }
}
