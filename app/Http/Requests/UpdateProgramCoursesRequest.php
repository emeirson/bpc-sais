<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProgramCoursesRequest extends FormRequest
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
            'course_id' => [
                'exists:courses,id',
                Rule::unique('course_program')->where(function ($query) {
                    return $query->where('program_id', $this->program_id);
                })
            ],
            'year_level' => 'required',
            'semester' => 'required'
        ];
    }
}
