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
    $courses = Course::when(request()->has('type'), function ($query) {
      return $query->where('class_type', request()->type);
    })
    ->when(request()->has('level'), function ($query) {
      return $query->where('year_level', request()->level);
    })
    ->orderBy('list_order')->get();

    return response()->json($courses, 200);
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
    // return response()->json($request, 200);
    //
    $course = new Course();
    $course->class_type = $request->class_type;
    $course->year_level = $request->year_level;
    $course->intake = $request->intake;
    $course->list_order = $request->order;
    $course->fromMonth = $request->fromMonth;
    $course->toMonth = $request->toMonth;
    $course->curriculum = $request->curriculum;

    $course->save();
    return response()->json($course, 200);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Course  $course
   * @return \Illuminate\Http\Response
   */
  public function show(Course $course)
  {
    return response()->json($course, 200);
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
    // return response($request);
    $course->class_type = $request->class_type;
    $course->year_level = $request->year_level;
    $course->intake = $request->intake;
    $course->list_order = $request->order;
    $course->fromMonth = $request->fromMonth;
    $course->toMonth = $request->toMonth;
    $course->curriculum = $request->curriculum;

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
