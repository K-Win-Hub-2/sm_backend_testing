<?php

namespace App\Http\Controllers;

use App\Models\BookingSlot;
use Illuminate\Http\Request;

class BookingSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookingSlots = BookingSlot::all();
        return response()->json($bookingSlots);
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
            'name' => 'required|string|max:255',
            'day_type' => 'required|boolean',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
        ]);

        $bookingSlot = BookingSlot::create($validated);
        return response()->json(['message' => 'Booking Slot created successfully.', 'data' => $bookingSlot], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingSlot  $bookingSlot
     * @return \Illuminate\Http\Response
     */
    public function show(BookingSlot $bookingSlot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingSlot  $bookingSlot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'day_type' => 'boolean',
            'start_time' => 'string',
            'end_time' => 'string',
        ]);

        $bookingSlot = BookingSlot::find($id);

        if (!$bookingSlot) {
            return response()->json(['message' => 'Booking Slot not found'], 404);
        }

        $bookingSlot->update($validated);

        return response()->json(['message' => 'Booking Slot updated successfully.', 'data' => $bookingSlot]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingSlot  $bookingSlot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookingSlot = BookingSlot::find($id);

        if (!$bookingSlot) {
            return response()->json(['message' => 'Booking Slot not found'], 404);
        }

        $bookingSlot->delete();

        return response()->json(['message' => 'Booking Slot deleted successfully.']);
    }
}
