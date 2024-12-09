<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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

        // If a specific status is requested, filter by that status
        if ($status !== null) {
            $appointments = Appointment::with('courses')
                ->where('status', $status)
                ->get();
        } else {
            // Otherwise, return all appointments
            $appointments = Appointment::with('courses')->get();
        }

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
            'booking_time' => 'required|date_format:H:i',
            'courses' => 'required|array',
            'courses.*' => 'exists:courses,id', // Ensure course IDs exist
        ]);

        // Exclude 'courses' from the validated data
        $appointmentData = collect($validated)->except('courses')->toArray();

        // Create the appointment
        $appointment = Appointment::create($appointmentData);

        // Attach courses to the pivot table
        $appointment->courses()->sync($request->input('courses'));

        // Return the response with the appointment and related courses
        return response()->json($appointment->load('courses'), 201);
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
        $appointment->courses()->detach();
        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully']);
    }

    public function appointmentConfirmed($id){
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 1;
        $appointment->save();
        return response()->json(['message' => 'Appointment confirmed successfully']);
    }
    public function appointmentCanceled($id){
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 2;
        $appointment->save();
        return response()->json(['message' => 'Appointment canceled successfully']);
    }
}
