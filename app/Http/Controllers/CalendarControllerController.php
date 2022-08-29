<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarController;
use App\Http\Requests\StoreCalendarControllerRequest;
use App\Http\Requests\UpdateCalendarControllerRequest;

class CalendarControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendar_input = CalendarController::all();
        return response()->json($calendar_input, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCalendarControllerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalendarControllerRequest $request)
    {
        $calendar_input = new CalendarController();
        $calendar_input->academic_id=0;
        $calendar_input->calender_name=$request->name;
        $calendar_input->calender_startdate=$request->start_date;
        $calendar_input->calender_enddate=$request->end_date;
        $calendar_input->type=$request->type;

        
        $calendar_input->description=$request->description;
        $calendar_input->color=$request->color;
        $calendar_input->save();
        return response()->json($calendar_input, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalendarController  $calendarController
     * @return \Illuminate\Http\Response
     */
    public function show(CalendarController $calendarController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalendarController  $calendarController
     * @return \Illuminate\Http\Response
     */
    public function edit(CalendarController $calendarController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalendarControllerRequest  $request
     * @param  \App\Models\CalendarController  $calendarController
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalendarControllerRequest $request, CalendarController $calendarController)
    {
    
        $calendarController->academic_id=0;
        $calendarController->calender_name=$request->name;
        $calendarController->calender_startdate=$request->start_date;
        $calendarController->calender_enddate=$request->end_date;
        $calendarController->type=$request->type;

        
        $calendarController->description=$request->description;
        $calendarController->color=$request->color;
        $calendarController->update();
        return response()->json($calendarController, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalendarController  $calendarController
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalendarController $calendarController)
    {
        $calendarController->delete();
        return response()->json($calendarController, 200);
    }

    public function deleteCalendar($id)
    {

        //    return $id;
        $calendar = CalendarController::find($id);
        $calendar->delete();
        return response()->json($calendar, 200);
    }

    public function updateCalendar($id,Request $request)
    {

        //    return $id;
        $calendar = CalendarController::find($id);
        $calendar->academic_id=0;
        $calendar->calender_name=$request->name;
        $calendar->calender_startdate=$request->start_date;
        $calendar->calender_enddate=$request->end_date;
        $calendar->type=$request->type;

        
        $calendar->description=$request->description;
        $calendar->color=$request->color;
        $calendar->update();
        return response()->json($calendar, 200);
    }
}
