<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'course_code' => 'required|unique:courses,course_code,' . $this->course->id,
            'description' => 'required',
            'units' => 'required',
            'lecture_hours' => 'required',
            'laboratory_hours' => 'required',
            'prerequisite_course_id' => 'nullable'
        ];
    }
}
