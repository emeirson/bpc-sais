<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSemesterRequest extends FormRequest
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
            'academic_year_id' => [
                'required',
                Rule::unique('semesters')->where(function ($query) {
                    return $query->where('name', request()->name);
                })
            ],
            'name' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'academic_year_id.unique' => 'A semester with this name already exists for the selected academic year.',
        ];
    }
}
