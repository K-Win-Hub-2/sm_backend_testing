<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Course_input = Course::all();
        return response()->json($Course_input, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */

   
    public function store(StoreCourseRequest $request)
    {
        //
        $Course_input = new Course();
        $Course_input->class_types=$request->classtype;
        $Course_input->yearlevel=$request->level;
        $Course_input->yearname=$request->name;
        $Course_input->intake=$request->intake;
        $Course_input->subject=$request->subject;
     
        $Course_input->save();
        return response()->json($Course_input, 200);
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
      
        
        $course->class_types=$request->classtype;
        $course->yearlevel=$request->level;
        $course->yearname=$request->name;
        $course->intake=$request->intake;
        $course->subject=$request->subject;
        $course->update();
        return response()->json($course, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        // return $course;
        $course->delete();
        return response()->json($course, 200);
    }
    
}
