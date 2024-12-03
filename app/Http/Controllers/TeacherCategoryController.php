<?php

namespace App\Http\Controllers;

use App\Models\TeacherCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeacherCategoryRequest;
use App\Http\Requests\UpdateTeacherCategoryRequest;

class TeacherCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher_categories = TeacherCategory::all();
        return response()->json($teacher_categories, 200);
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
   // public function search(Request $request){
   
     //   $search=$request->search;
     //   if($search==""){
       
       
     //   }
     //   else{
     //       $data = teacher::where('name','LIKE','%'.$search.'%')->orWhere('position','LIKE','%'.$search.'%')
       //     ->orWhere('studied','LIKE','%'.$search.'%')->get();
         //   return response()->json($data, 200);
       // }
      
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreteacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherCategoryRequest $request)
    {
        $teacher_category = new TeacherCategory();
        $teacher_category->name=$request->name;
	$teacher_category->description = $request->description;
       
        $teacher_category->save();
        return response()->json($teacher_category, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
   // public function show(teacher $teacher)
   // {
        //
   // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
   // public function edit(teacher $teacher)
   // {
        //
   // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateteacherRequest  $request
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherCategoryRequest $request, TeacherCategory $teacher_category)
    {
        $teacher_category->name=$request->name;
        $teacher_category->description=$request->description;
       $teacher_category->update();
        return response()->json($teacher_category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherCategory $teacher_category)
    {
        $teacher_category->delete();
        return response()->json($teacher_category, 200);
    }

   // public function isDisplay($id,Request $request)
   // {
    //    $teacher = teacher::find($id);
      //  $teacher->isDisplay=$request->isDisplay;
      //  $teacher->update();
       // return response()->json($teacher, 200);
   // }
}