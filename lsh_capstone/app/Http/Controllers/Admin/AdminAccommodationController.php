<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationType;
use Illuminate\Http\Request;

class AdminAccommodationController extends Controller
{
    public function index($accomtype_id)
    {
        $accommodation_type = AccommodationType::where('id', $accomtype_id)->first();
        $accommodations = Accommodation::where('accommodation_type_id', $accomtype_id)->get();
        return view('admin.accommodation_view', compact('accommodations', 'accommodation_type'));
    }

    public function add($accomtype_id)
    {
        $accommodation_type = AccommodationType::where('id', $accomtype_id)->first();
        return view('admin.accommodation_add', compact('accommodation_type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg,webp,gif|max:5120',
            'name' => 'required'
        ]);

        

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;

        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj = new Accommodation();
        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Accommodation type is added successfully!');
    }

    public function edit($id)
    {
        $accommodation_data = Accommodation::where('id',$id)->first();
        return view('admin.accommodation_edit', compact('accommodation_data'));
    }

    public function update(Request $request, $id)
    {
        $obj = Accommodation::where('id', $id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,svg,png,webp,gif|max:5120',
            ]);

            unlink(public_path('uploads/'.$obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'),$final_name);


            $obj->photo = $final_name;           
        }

        $obj->name = $request->name;
        $obj->update();

        return redirect()->back()->with('success', 'Accommodation type is updated successfully!');
        
    }

    public function delete($id)
    {
        $single_data = Accommodation::where('id', $id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        $single_data->delete();

        return redirect()->back()->with('success', 'Accommodation is deleted successfully!');
    }
}
