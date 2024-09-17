<?php

namespace App\Http\Controllers;
use App\Models\EquipmentCalender;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function AddCalender(Request $request){

        if($request->status != null && $request->day != null)
        {
            $record = EquipmentCalender::create([
                'day' => $request->day,
                'status' => $request->status,
                'equipment_id' => $request->equipment_id,
                'date' => $request->date,
                'timings' => $request->timings,
                'holiday_name' => $request->status === 'Public Holiday' ? $request->holiday_name : null,
                // 'holiday_name' => $request->holiday_name,
            ]);

        }
        return response()->json([
            'success' => true,
        ]);
    }
    public function removeCalender($id){
        if($id != null)
        {
            $record = EquipmentCalender::findOrFail($id);
            $record->delete();
            return response()->json([
                'success' => true,
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }
}
