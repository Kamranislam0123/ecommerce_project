<?php

namespace App\Http\Controllers\Admin;

use App\Models\DeliveryTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TimeSetController extends Controller
{
    // Day mapping for delivery times
    private $days = [
        1 => 'Saturday',
        2 => 'Sunday',
        3 => 'Monday',
        4 => 'Tuesday',
        5 => 'Wednesday',
        6 => 'Thursday',
        7 => 'Friday'
    ];

    public function setTime(){
        $time = DeliveryTime::select('group_id')
                           ->groupBy('group_id')
                           ->orderBy('group_id')
                           ->get();
        return view('admin.set_time.index',compact('time'));
    }
    
    public function setTimeStore(Request $request){
        $request->validate([
            'time' => 'required|array|min:1',
            'time.*' => 'required|string|max:20',
            'time_end' => 'required|array|min:1',
            'time_end.*' => 'required|string|max:20',
            'group_id' => 'required|integer|between:1,7'
        ]);

        try {
            DB::beginTransaction();
            
            // Delete existing times for this day to avoid duplicates
            DeliveryTime::where('group_id', $request->group_id)->delete();
            
            $f_count = count($request->time);

            for ($i = 0; $i < $f_count; $i++) {
                // Validate time range
                if ($request->time[$i] >= $request->time_end[$i]) {
                    throw new \Exception('End time must be after start time for time slot ' . ($i + 1));
                }
                
                $delivery_time = new DeliveryTime();
                $delivery_time->time = $request->time[$i] . ' - ' . $request->time_end[$i];
                $delivery_time->group_id = $request->group_id;
                $delivery_time->is_active = true;
                $delivery_time->save();
            }
            
            DB::commit();
            $dayName = $this->days[$request->group_id] ?? 'Unknown';
            return back()->with('success', 'Delivery times created successfully for ' . $dayName);
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('failed', 'Failed to create delivery times: ' . $th->getMessage());
            return back();
        }
    }

    public function destroy($id){
        try {
            $time = DeliveryTime::where('group_id', $id)->delete();
            $dayName = $this->days[$id] ?? 'Unknown';
            return back()->with('success', 'Delivery times deleted successfully for ' . $dayName);
        } catch (\Exception $e) {
            return back()->with('failed', 'Failed to delete delivery times');
        }
    }

    public function show($id){
        $time = DeliveryTime::where('group_id', $id)
                           ->orderBy('time')
                           ->get();
        $dayName = $this->days[$id] ?? 'Unknown';
        return view('admin.set_time.show', compact('time', 'dayName', 'id'));
    }

    public function toggleStatus($id)
    {
        try {
            $deliveryTime = DeliveryTime::findOrFail($id);
            $deliveryTime->is_active = !$deliveryTime->is_active;
            $deliveryTime->save();
            
            $status = $deliveryTime->is_active ? 'enabled' : 'disabled';
            return response()->json([
                'success' => true,
                'message' => "Delivery time {$status} successfully",
                'is_active' => $deliveryTime->is_active
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update status'
            ], 500);
        }
    }

    public function updateTime(Request $request, $id)
    {
        $request->validate([
            'time' => 'required|string|max:20'
        ]);

        try {
            $deliveryTime = DeliveryTime::findOrFail($id);
            $deliveryTime->time = $request->time;
            $deliveryTime->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Delivery time updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update delivery time'
            ], 500);
        }
    }

    public function getDeliveryTimes()
    {
        try {
            $times = DeliveryTime::orderBy('group_id')
                                ->orderBy('time')
                                ->get()
                                ->groupBy('group_id');
            return response()->json([
                'success' => true,
                'data' => $times
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch delivery times'
            ], 500);
        }
    }
}
