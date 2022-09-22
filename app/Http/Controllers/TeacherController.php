<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;
use App\Http\Requests\StoreteacherRequest;
use App\Http\Requests\UpdateteacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = teacher::all();
        return response()->json($teacher, 200);
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
     * @param  \App\Http\Requests\StoreteacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreteacherRequest $request)
    {
        $teacher = new teacher();
        $teacher->type=$request->type;
        $teacher->name=$request->name;
        $teacher->studied=$request->studied;
        $teacher->position=$request->position;
        $teacher->biography=$request->biography;
        $teacher->isDisplay='false';
        $teacher->about=$request->about;
        $teacher->teacherimage=$request->teacherimage;

  


        $teacher->save();
        return response()->json($teacher, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateteacherRequest  $request
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateteacherRequest $request, teacher $teacher)
    {
        $teacher->type=$request->type;
        $teacher->name=$request->name;
        $teacher->studied=$request->studied;
        $teacher->position=$request->position;
        $teacher->biography=$request->biography;
        $teacher->about=$request->about;
        $teacher->teacherimage=$request->teacherimage;

        $teacher->update();
        return response()->json($teacher, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(teacher $teacher)
    {
        $teacher->delete();
        return response()->json($teacher, 200);
    }

    public function isDisplay($id,Request $request)
    {
        $teacher = teacher::find($id);
        $teacher->isDisplay=$request->isDisplay;
        $teacher->update();
        return response()->json($teacher, 200);
    }
}
