<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;
use App\Models\CredentialPhoto;
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
        $teacher = teacher::with('teacher_category','credentialPhotos')
                    ->orderByRaw('CAST(sort_by AS UNSIGNED) asc')
                    ->get();
        return response()->json($teacher, 200);
    }

    public function updateSorting(Request $request)
    {
        try {
            $request->validate([
                'teachers' => 'required|array',
                'teachers.*.id' => 'required|integer', // Ensure each teacher has an 'id' field
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
        $teachers = $request->input('teachers');
        foreach ($teachers as $index => $teacherData) {
            $teacher = Teacher::find($teacherData['id']);
            if ($teacher) {
                $teacher->sort_by = $index + 1;
                $teacher->save();
            }
        }
        return response()->json(['message' => 'Sorting updated successfully'], 200);
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
    // public function store(StoreteacherRequest $request)
    // {
	// if($request->hasfile('teacher_photo')){
	// 	$image = $request->file('teacher_photo');
    //     $trimmedName = str_replace(' ', '', trim($request->name));
    //     $teacher_photo_path  = $trimmedName. "." .$image->extension();
	// 	$image->move(public_path(). '/schooldata/teacherphoto/',$teacher_photo_path);
	// }else{
	// 	$teacher_photo_path = "defaultteacher.JPG";
	// }

    //     // Retrieve the maximum value of the sort_by column and increment it by 1
    //     $maxSortBy = Teacher::max('sort_by');
    //     $newSortBy = $maxSortBy ? $maxSortBy + 1 : 1;

    //     $teacher = new teacher();
    //     $teacher->teacher_category_id=$request->teacher_category_id;
    //     $teacher->name=$request->name;
    //     $teacher->studied=$request->studied;
    //     $teacher->position=$request->position;
    //    // $teacher->biography=$request->biography;
    //     $teacher->isDisplay=$request->isdisplay;
    //     $teacher->message=$request->message;
    //     $teacher->teacher_photo_path=$teacher_photo_path;
    //     $teacher->sort_by = $newSortBy; // Set the new sort_by value

    //     $teacher->save();
    //     return response()->json($teacher, 200);
    // }
    public function store(StoreteacherRequest $request)
    {
        if ($request->hasfile('teacher_photo')) {
            $image = $request->file('teacher_photo');
            $trimmedName = str_replace(' ', '', trim($request->name));
            $teacher_photo_path = $trimmedName . "." . $image->extension();
            $image->move(public_path() . '/schooldata/teacherphoto/', $teacher_photo_path);
        } else {
            $teacher_photo_path = "defaultteacher.JPG";
        }
        // Retrieve the maximum value of the sort_by column and increment it by 1
        $maxSortBy = Teacher::max('sort_by');
        $newSortBy = $maxSortBy ? $maxSortBy + 1 : 1;
        $teacher = new Teacher();
        $teacher->teacher_category_id = $request->teacher_category_id;
        $teacher->name = $request->name;
        $teacher->studied = $request->studied;
        $teacher->position = $request->position;
        $teacher->isDisplay = $request->isdisplay;
        $teacher->message = $request->message;
        $teacher->credential = $request->credential;
        $teacher->teacher_photo_path = $teacher_photo_path;
        $teacher->sort_by = $newSortBy;
        $teacher->save();

        // Handle multiple credential_photos
        if ($request->hasfile('credential_photos')) {
            $credentialPhotos = $request->file('credential_photos');

            // Ensure $credentialPhotos is an array
            if (!is_array($credentialPhotos)) {
                $credentialPhotos = [$credentialPhotos];
            }

            foreach ($credentialPhotos as $photo) {
                $photoName = $trimmedName . "_" . str_replace(' ', '_', $request->credential) . "_" . time() . "." . $photo->extension();
                $photo->move(public_path() . '/schooldata/credentialPhotos/', $photoName);
                $photoModel = new CredentialPhoto();
                $photoModel->photo_path = $photoName;
                $photoModel->save();
                $teacher->credentialPhotos()->attach($photoModel->id);
            }
        } else {
            Log::info('No credential photos found in the request.');
        }
        return response()->json($teacher->load('credentialPhotos'), 200);
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
    public function update(UpdateteacherRequest $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher_photo_path = $teacher->teacher_photo_path; // Retain the existing path if no new file is uploaded

        if ($request->hasfile('teacher_photo')) {
            $image = $request->file('teacher_photo');
            $trimmedName = str_replace(' ', '', trim($request->name));
            $teacher_photo_path = $trimmedName . "." . $image->extension();
            $image->move(public_path() . "/schooldata/teacherphoto/", $teacher_photo_path);
        }

        $teacher->teacher_category_id = $request->teacher_category_id;
        $teacher->name = $request->name;
        $teacher->studied = $request->studied;
        $teacher->position = $request->position;
        $teacher->message = $request->message;
        $teacher->isDisplay = $request->isdisplay;
        $teacher->credential = $request->credential; // Update credential field
        $teacher->teacher_photo_path = $teacher_photo_path;

        $teacher->save();

        // Handle multiple credential_photos
        if ($request->hasfile('credential_photos')) {
            $credentialPhotos = $request->file('credential_photos');

            // Ensure $credentialPhotos is an array
            if (!is_array($credentialPhotos)) {
                $credentialPhotos = [$credentialPhotos];
            }

            // Delete existing credential photos if new ones are uploaded
            $teacher->credentialPhotos()->detach();

            foreach ($credentialPhotos as $photo) {
                $photoName = $trimmedName . "_" . str_replace(' ', '_', $request->credential) . "_" . time() . "." . $photo->extension();
                $photo->move(public_path() . '/schooldata/credentialPhotos/', $photoName);

                $photoModel = new CredentialPhoto();
                $photoModel->photo_path = $photoName;
                $photoModel->save();

                // Attach the photo to the teacher
                $teacher->credentialPhotos()->attach($photoModel->id);
            }
        }

        return response()->json($teacher->load('credentialPhotos'), 200);
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
