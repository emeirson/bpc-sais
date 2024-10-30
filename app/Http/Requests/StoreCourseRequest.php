<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'college_id' => 'required',
            'department_id' => 'required',
            'course_code' => 'unique:courses,course_code|string|required',
            'description' => 'required|string|max:255',
            'units' => 'required|integer|min:1',
            'lecture_hours' => 'required|integer|min:0',
            'laboratory_hours' => 'required|integer|min:0',
            'prerequisite_course_id' => 'nullable'
        ];
    }
}
