<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateteacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'teacher_photo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Optional, max 2MB
            'teacher_category_id' => 'required|integer|exists:teacher_categories,id', // Must exist in teacher_categories table
            'name' => 'required|string|max:255', // Required and cannot exceed 255 characters
            'studied' => 'nullable|string|max:255', // Optional, max 255 characters
            'position' => 'nullable|string|max:255', // Optional, max 255 characters
            'message' => 'nullable|string|max:1000', // Optional, max 1000 characters
            'isdisplay' => 'required|boolean', // Must be a boolean value
        ];
    }
}
