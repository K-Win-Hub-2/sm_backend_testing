<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreteacherRequest;
use App\Models\CredentialPhoto;
use App\Models\IgcseTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IgcseTeacherController extends Controller
{
    public function index()
    {
        $teachers = IgcseTeacher::with('teacher_category', 'credentials')
                    ->orderByRaw('CAST(sort_by AS UNSIGNED) asc')
                    ->get();
        foreach ($teachers as $teacher) {
            if ($teacher->credentials) {
                foreach ($teacher->credentials as $credentialPhoto) {
                    $path = public_path($credentialPhoto->photo_path);
                    if (file_exists($path)) {
                        $data = file_get_contents($path);
                        $base64 = 'data:' . mime_content_type($path) . ';base64,' . base64_encode($data);
                        $credentialPhoto->photo_path = $base64;
                    } else {
                        $credentialPhoto->photo_path = null;
                    }
                }
            }
        }
        return response()->json($teachers);
    }

    public function search(Request $request)
    {
        $search = trim($request->search);

        if ($search === '') {
            return response()->json([], 200);
        }

        $data = IgcseTeacher::where('name', 'LIKE', "%{$search}%")
            ->orWhere('position', 'LIKE', "%{$search}%")
            ->orWhere('studied', 'LIKE', "%{$search}%")
            ->get();

        return response()->json($data, 200);
    }

    public function store(StoreteacherRequest $request)
    {
        Log::info($request->all());
        if ($request->hasFile('teacher_photo')) {
            $image = $request->file('teacher_photo');
            $trimmedName = str_replace(' ', '', trim($request->name));
            $teacher_photo_path = $trimmedName . "." . $image->extension();
            $image->move(public_path('schooldata/teacherphoto'), $teacher_photo_path);
        } else {
            $teacher_photo_path = "defaultteacher.JPG";
        }
        $maxSortBy = IgcseTeacher::max('sort_by');
        $newSortBy = $maxSortBy ? $maxSortBy + 1 : 1;
        $teacher = new IgcseTeacher();
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

    public function show($id)
    {

        $teacher = IgcseTeacher::with(['teacher_category', 'credentials'])->find($id);

        if (!$teacher) {
            return response()->json(['status' => 'error', 'message' => 'Teacher not found'], 404);
        }

        if ($teacher->credentials) {
            foreach ($teacher->credentials as $credentialPhoto) {
                $path = public_path($credentialPhoto->photo_path);
                if (file_exists($path)) {
                    $data = file_get_contents($path);
                    $base64 = 'data:' . mime_content_type($path) . ';base64,' . base64_encode($data);
                    $credentialPhoto->photo_path = $base64;
                } else {
                    $credentialPhoto->photo_path = null;
                }
            }
        }
        return response()->json([
            "status" => "success",
            "teacher" => $teacher
        ]);
    }

    public function update(Request $request, $id)
    {
        Log::info('Request all:', $request->all());
        try {
            $teacher = IgcseTeacher::findOrFail($id);
            $teacher_photo_path = $teacher->teacher_photo_path;

            // Handle teacher photo update
            if ($request->hasFile('teacher_photo')) {
                $image = $request->file('teacher_photo');
                $trimmedName = str_replace(' ', '', trim($request->name));
                $teacher_photo_path = $trimmedName . "." . $image->extension();
                $image->move(public_path('schooldata/teacherphoto'), $teacher_photo_path);
            }

            // Update fields
            $teacher->teacher_category_id = $request->teacher_category_id;
            $teacher->name = $request->name;
            $teacher->studied = $request->studied;
            $teacher->position = $request->position;
            $teacher->message = $request->message;
            $teacher->isDisplay = $request->isdisplay;
            $teacher->teacher_photo_path = $teacher_photo_path;
            $teacher->save();

            // Handle credentials update
            if ($request->has('credentials')) {
                $credentialsInput = $request->input('credentials');
                $credentials = is_string($credentialsInput) ? json_decode($credentialsInput, true) : [];

                if (is_array($credentials)) {
                    // Delete old credentials
                    $teacher->credentials()->each(function ($credentialPhoto) {
                        $filePath = public_path($credentialPhoto->photo_path);
                        if (file_exists($filePath)) {
                            unlink($filePath);
                        }
                        $credentialPhoto->delete();
                    });

                    // Add new credentials
                    foreach ($credentials as $credential) {
                        if (isset($credential['photo']) && $credential['photo']) {
                            $trimmedName = preg_replace('/[^a-zA-Z0-9_-]/', '_', trim($teacher->name . "_" . $credential['name']));

                            // Determine if base64 or URL/file path
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
                } else {
                    Log::error("Invalid credentials format on update. Expected JSON array. Got: ", [$credentialsInput]);
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid credentials format. Must be a JSON array.'
                    ], 422);
                }
            }

            return response()->json([
                'status' => 'success',
                'teacher' => $teacher->load('credentials')
            ], 200);
        } catch (\Exception $e) {
            Log::error("Error updating teacher ID {$id}: " . $e->getMessage(), [
                'stack' => $e->getTraceAsString()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while updating the teacher.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $teacher = IgcseTeacher::findOrFail($id);
        $teacher->delete();
        return response()->json([
            "status" => "deleted",
            "teacher" => $teacher
        ]);
    }

    public function isDisplay($id,Request $request)
    {
        $teacher = IgcseTeacher::find($id);
        $teacher->isDisplay=$request->isDisplay;
        $teacher->update();
        return response()->json($teacher, 200);
    }

    public function updateSorting(Request $request)
    {
        try {
            $request->validate([
                'teachers' => 'required|array',
                'teachers.*.id' => 'required|integer', 
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
        $teachers = $request->input('teachers');
        foreach ($teachers as $index => $teacherData) {
            $teacher = IgcseTeacher::find($teacherData['id']);
            if ($teacher) {
                $teacher->sort_by = $index + 1;
                $teacher->save();
            }
        }
        return response()->json(['message' => 'Sorting updated successfully'], 200);
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
