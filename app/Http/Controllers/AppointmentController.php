<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\DaySlot;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get the status query parameter, default to return all statuses if not provided
        $status = $request->query('status', null);

        // Get the general search query parameter (search)
        $search = $request->query('search', null);

        // Build the query
        $query = Appointment::with('courses','daySlot');

        // Apply status filter if provided
        if ($status !== null) {
            $query->where('status', $status);
        }

        // Apply general search filter if provided
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('parent_name', 'like', '%' . $search . '%')
                  ->orWhere('student_name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        // Execute the query
        $appointments = $query->get();

        return response()->json($appointments);
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
            'parent_name' => 'required|string',
            'student_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'booking_date' => 'required|date',
            'booking_slot_id' => 'required|integer',
            'courses' => 'required|array',
            'courses.*' => 'exists:courses,id', // Ensure course IDs exist
        ]);

        // Check if the booking slot is already taken
        $existingDaySlot = DaySlot::where([
            ['booking_slot_id', $request->booking_slot_id],
            ['date', $request->booking_date],
            ['status', '1'] // Assuming '1' means booked
        ])->first();

        if ($existingDaySlot) {
            return response()->json([
                'message' => 'The selected booking slot is already taken.'
            ], 422);
        }

        // Exclude 'courses' from the validated data
        $appointmentData = collect($validated)->except('courses')->toArray();

        // Create the appointment
        $appointment = Appointment::create($appointmentData);

        $daySlot = DaySlot::create([
            'appointment_id' => $appointment->id,
            'booking_slot_id' => $request->booking_slot_id,
            'date' => $request->booking_date,
            'status' => '0', // Booked status by default
        ]);

        // Attach courses to the pivot table
        $appointment->courses()->sync($request->input('courses'));

        // Return the response with the appointment and related courses
        return response()->json([
            'appointment' => $appointment->load('courses'),
            'daySlot' => $daySlot
        ], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::with('courses')->findOrFail($id);
        return response()->json($appointment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'parent_name' => 'sometimes|string',
            'student_name' => 'sometimes|string',
            'email' => 'sometimes|email',
            'phone' => 'sometimes|string',
            'booking_date' => 'sometimes|date',
            'booking_time' => 'sometimes|date_format:H:i',
            'courses' => 'sometimes|array',
            'courses.*' => 'exists:courses,id',
        ]);

        // Find the appointment
        $appointment = Appointment::findOrFail($id);

        // Exclude the 'courses' field from the validated data
        $appointmentData = collect($validated)->except('courses')->toArray();

        // Update appointment with remaining data
        $appointment->update($appointmentData);

        // Update courses if provided
        if ($request->has('courses')) {
            $appointment->courses()->sync($request->input('courses'));
        }

        // Return the updated appointment with its related courses
        return response()->json($appointment->load('courses'));
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);

        // Delete associated DaySlot if it exists
        DaySlot::where('appointment_id', $appointment->id)->delete();

        // Detach associated courses
        $appointment->courses()->detach();

        // Delete the appointment
        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully']);
    }


    public function appointmentConfirmed($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = '1'; // Set status as '1' (string)
        $appointment->save();

        if ($appointment->daySlot) {
            $appointment->daySlot->status = '1'; // Set daySlot status as '1' (string)
            $appointment->daySlot->save(); // Save the daySlot
        }

        return response()->json(['message' => 'Appointment confirmed successfully']);
    }

    public function appointmentCanceled($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = '2'; // Set status as '2' (string)
        $appointment->save();

        if ($appointment->daySlot) {
            $appointment->daySlot->status = '2'; // Set daySlot status as '2' (string)
            $appointment->daySlot->save(); // Save the daySlot
        }

        return response()->json(['message' => 'Appointment canceled successfully']);
    }

}
