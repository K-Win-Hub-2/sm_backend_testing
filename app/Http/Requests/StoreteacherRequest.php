<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreteacherRequest extends FormRequest
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
            'teacher_category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'studied' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'isdisplay' => 'required|boolean',
            'message' => 'nullable|string',
            'teacher_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'credentials' => 'nullable|array',
            // 'credentials.*.name' => 'required|string|max:255',
            // 'credentials.*.photo' => ['nullable', 'string', 'regex:/^data:image\/(jpeg|png|jpg|gif|svg);base64,/']
        ];
    }
}
