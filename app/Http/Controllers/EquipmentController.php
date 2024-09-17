<?php

namespace App\Http\Controllers;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all();
        return view('equipments.index', compact('equipments'));
    }

    public function create()
    {
        return view('equipments.create');
    }

    public function store(Request $request)
    {
        // Validate all fields
        $request->validate([
            'incharge_name' => 'required',
            'incharge_email' => 'required|email',
            'incharge_phone' => 'required',
            'location' => 'required',
            'status' => 'required',
            'additional_accessories' => 'required',
            'number_of_slots' => 'required',
            'name' => 'required',
        ]);
        if($request->hasFile('image')){
            $image = Storage::disk('website')->put( 'equipment', $request->image);
        }
        else{
            $image = $request->image;
        }
        // Create a new Equipment instance with all fields
        Equipment::create([
            'image' => $image,
            'name' => $request->name,
            'incharge_name' => $request->incharge_name,
            'incharge_email' => $request->incharge_email,
            'incharge_phone' => $request->incharge_phone,
            'location' => $request->location,
            'status' => $request->status,
            'sample_requirements' => $request->sample_requirements,
            'additional_accessories' => $request->additional_accessories,
            'number_of_slots' => $request->number_of_slots,
            'user_id' => auth()->id(),
        ]);

        // Redirect back to the equipments index with a success message
        return redirect()->route('equipments.index')->with(['type'=>'success', 'message'=> 'Equipment created successfully.']);
    }


    public function edit(Equipment $equipment)
    {
        return view('equipments.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        // Validate all fields
        $request->validate([
            'name' => 'required',
            'incharge_name' => 'required',
            'incharge_email' => 'required|email',
            'incharge_phone' => 'required',
            'location' => 'required',
            'status' => 'required',
            'additional_accessories' => 'required',
            'number_of_slots' => 'required',
        ]);
        if($request->hasFile('image')){
            $image = Storage::disk('website')->put( 'equipment', $request->image);
        }
        else{
            $image = $request->image;
        }
        // Update the existing Equipment instance with all fields
        $equipment->update([
            'image' => $image,
            'name' => $request->name,
            'incharge_name' => $request->incharge_name,
            'incharge_email' => $request->incharge_email,
            'incharge_phone' => $request->incharge_phone,
            'location' => $request->location,
            'status' => $request->status,
            'sample_requirements' => $request->sample_requirements,
            'additional_accessories' => $request->additional_accessories,
            'number_of_slots' => $request->number_of_slots,
            'user_id' => auth()->id(),
        ]);

        // Redirect back to the equipments index with a success message
        return redirect()->route('equipments.index')->with(['type'=> 'success','message' => 'Equipment updated successfully.']);
    }


    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->route('equipments.index')->with('success', 'Equipment deleted successfully.');
    }
    public function updateCalender(Request $request){
        return $request->all();
    }
}
