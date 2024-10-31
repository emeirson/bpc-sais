<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'class_code' => 'required|unique:class_courses,class_code',
            'course_id' => 'required',
            'semester_id' => 'required',
            'instructor_id' => 'required',
            'semester_id' => 'required',
            'room_id' => 'required',
        ];
    }
}
