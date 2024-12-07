<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $teacher = teacher::with('teacher_category')->get();
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
    public function search(Request $request){

        $search=$request->search;
        if($search==""){


        }
        else{
            $data = teacher::where('name','LIKE','%'.$search.'%')->orWhere('position','LIKE','%'.$search.'%')
            ->orWhere('studied','LIKE','%'.$search.'%')->get();
            return response()->json($data, 200);
        }

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreteacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreteacherRequest $request)
    {
	if($request->hasfile('teacher_photo')){
		$image = $request->file('teacher_photo');
        $trimmedName = str_replace(' ', '', trim($request->name));
        $teacher_photo_path  = $trimmedName. "." .$image->extension();
		$image->move(public_path(). '/schooldata/teacherphoto/',$teacher_photo_path);
	}else{
		$teacher_photo_path = "defaultteacher.JPG";
	}


        $teacher = new teacher();
        $teacher->teacher_category_id=$request->teacher_category_id;
        $teacher->name=$request->name;
        $teacher->studied=$request->studied;
        $teacher->position=$request->position;
       // $teacher->biography=$request->biography;
        $teacher->isDisplay=$request->isdisplay;
        $teacher->message=$request->message;
        $teacher->teacher_photo_path=$teacher_photo_path;

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
    public function update(UpdateteacherRequest $request,$id)
    {
        $teacher = teacher::findOrFail($id);
        $teacher_photo_path = $teacher->teacher_photo_path; // Retain the existing path if no new file is uploaded
        if($request->hasfile('teacher_photo')){
        $image = $request->file('teacher_photo');
        $trimmedName = str_replace(' ', '', trim($request->name));
        $teacher_photo_path  = $trimmedName. "." .$image->extension();
        $image->move(public_path(). "/schooldata/teacherphoto/",$teacher_photo_path);
        }
        $teacher->teacher_category_id=$request->teacher_category_id;
        $teacher->name=$request->name;
        $teacher->studied=$request->studied;
        $teacher->position=$request->position;
       // $teacher->biography=$request->biography;
        $teacher->message=$request->message;
	    $teacher->isDisplay = $request->isdisplay;
        $teacher->teacher_photo_path=$teacher_photo_path;
        $teacher->update();
        return response()->json($teacher, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = teacher::findOrFail($id);
        $teacher->delete();
        return response()->json([
            "status" => "deleted",
            "teacher" => $teacher
        ]);
    }

    public function isDisplay($id,Request $request)
    {
        $teacher = teacher::find($id);
        $teacher->isDisplay=$request->isDisplay;
        $teacher->update();
        return response()->json($teacher, 200);
    }
}
