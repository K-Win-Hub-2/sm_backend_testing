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
    public function store(StoreteacherRequest $request)
    {
        if ($request->hasFile('teacher_photo')) {
            $image = $request->file('teacher_photo');
            $trimmedName = str_replace(' ', '', trim($request->name));
            $teacher_photo_path = $trimmedName . "." . $image->extension();
            $image->move(public_path('schooldata/teacherphoto'), $teacher_photo_path);
        } else {
            $teacher_photo_path = "defaultteacher.JPG";
        }
        $maxSortBy = Teacher::max('sort_by');
        $newSortBy = $maxSortBy ? $maxSortBy + 1 : 1;
        $teacher = new Teacher();
        $teacher->teacher_category_id = $request->teacher_category_id;
        $teacher->name = $request->name;
        $teacher->studied = $request->studied;
        $teacher->position = $request->position;
        $teacher->isDisplay = $request->isdisplay;
        $teacher->message = $request->message;
        $teacher->teacher_photo_path = $teacher_photo_path;
        $teacher->sort_by = $newSortBy;
        $teacher->save();
        $credentials = json_decode($request->input('credentials', '[]'), true);
        if (is_array($credentials)) {
            foreach ($credentials as $credential) {
                if (isset($credential['photo']) && $credential['photo']) {
                    $trimmedName = preg_replace('/[^a-zA-Z0-9_-]/', '_', trim($teacher->name . "_" . $credential['name']));
                    $photoPath = $this->saveBase64Image($credential['photo'], $trimmedName, 'schooldata/credentialPhotos');
                    $photoModel = new CredentialPhoto();
                    $photoModel->name = $credential['name'];
                    $photoModel->photo_path = $photoPath;
                    $photoModel->save();
                    $teacher->credentials()->attach($photoModel->id);
                }
            }
        } else {
            Log::error('Invalid credentials format: Expected array but got something else.');
        }
        return response()->json($teacher->load('credentials'), 200);
    }

    /**
     * Decode a base64 image and save it to the specified directory.
     *
     * @param string $base64Image
     * @param string $namePrefix
     * @param string $directory
     * @return string Path to the saved image
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        // Eager load the related models
        $teacher->load(['teacher_category', 'credentialPhotos']);

        return response()->json([
            "status" => "success",
            "teacher" => $teacher
        ]);
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
        $teacher_photo_path = $teacher->teacher_photo_path;
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
        $teacher->credential = $request->credential;
        $teacher->teacher_photo_path = $teacher_photo_path;
        $teacher->save();
        if ($request->has('credentials') && is_array($credentials = json_decode($request->input('credentials', '[]'), true))) {
            $teacher->credentials()->each(function ($credentialPhoto) {
                $filePath = public_path($credentialPhoto->photo_path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $credentialPhoto->delete();
            });
            foreach ($credentials as $credential) {
                if (isset($credential['photo']) && $credential['photo']) {
                    $trimmedName = preg_replace('/[^a-zA-Z0-9_-]/', '_', trim($teacher->name . "_" . $credential['name']));
                    if (strpos($credential['photo'], 'data:image/') === 0) {
                        $photoPath = $this->saveBase64Image($credential['photo'], $trimmedName, 'schooldata/credentialPhotos');
                    } else {
                        $photoPath = $this->saveCredentialPhoto($credential['photo'], $trimmedName);
                    }
                    $photoModel = new CredentialPhoto();
                    $photoModel->name = $credential['name'];
                    $photoModel->photo_path = $photoPath;
                    $photoModel->save();

                    $teacher->credentials()->attach($photoModel->id);
                }
            }
        }
        return response()->json($teacher->load('credentials'), 200);
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

    private function saveBase64Image($base64Image, $namePrefix, $directory)
    {
        if (!preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
            throw new \Exception("Invalid base64 image format");
        }
        $imageType = $type[1];
        $base64Image = preg_replace('/^data:image\/\w+;base64,/', '', $base64Image);
        $decodedImage = base64_decode($base64Image);
        if ($decodedImage === false) {
            throw new \Exception("Failed to decode base64 image");
        }
        $filename = $namePrefix . "_" . uniqid() . "." . $imageType;
        $savePath = public_path($directory);
        if (!file_exists($savePath)) {
            if (!mkdir($savePath, 0755, true) && !is_dir($savePath)) {
                throw new \Exception("Failed to create directory: $savePath");
            }
        }
        $fullPath = $savePath . '/' . $filename;
        if (file_put_contents($fullPath, $decodedImage) === false) {
            throw new \Exception("Failed to save the image to: $fullPath");
        }
        return $directory . '/' . $filename;
    }
}
