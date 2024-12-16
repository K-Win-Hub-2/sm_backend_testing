<?php

namespace App\Http\Controllers;

use App\Models\DaySlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DaySlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daySlots = DaySlot::with('bookingSlot','appointment')->get();
        return response()->json($daySlots);
    }

    public function daySlotsChecker(Request $request)
    {
        $bookingSlotApi = $request->booking_slot_id;
        $date = $request->date;

        Log::info($bookingSlotApi);
        Log::info($date);

        // Check if any matching records exist where `status = 1`
        $daySlots = DaySlot::where(function ($query) use ($bookingSlotApi, $date) {
            $query->where('booking_slot_id', $bookingSlotApi)
                  ->where('date', $date);
        })->where('status', '1')->exists(); // Ensures `status = 1` is required

        return response()->json([
            'status' => 'success',
            'appointment_status' => $daySlots
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_slot_id' => 'required|exists:booking_slots,id',
            'date' => 'required|string',
            'status' => 'required|in:0,1,2',
        ]);

        $daySlot = DaySlot::create($validated);
        return response()->json(['message' => 'Day Slot created successfully.', 'data' => $daySlot], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaySlot  $daySlot
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daySlot = DaySlot::with('bookingSlot')->find($id);

        if (!$daySlot) {
            return response()->json(['message' => 'Day Slot not found'], 404);
        }

        return response()->json($daySlot);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaySlot  $daySlot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'date' => 'string',
            'status' => 'in:0,1,2',
        ]);

        $daySlot = DaySlot::find($id);

        if (!$daySlot) {
            return response()->json(['message' => 'Day Slot not found'], 404);
        }

        $daySlot->update($validated);

        return response()->json(['message' => 'Day Slot updated successfully.', 'data' => $daySlot]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaySlot  $daySlot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $daySlot = DaySlot::find($id);

        if (!$daySlot) {
            return response()->json(['message' => 'Day Slot not found'], 404);
        }

        $daySlot->delete();

        return response()->json(['message' => 'Day Slot deleted successfully.']);
    }
}
