<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstructorRequest extends FormRequest
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
            'department_id' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'nullable',
            'salutation' => 'required',
            'sex' => 'required',
            'birthdate' => 'required',
            'barangay' => 'required',
            'town' => 'required',
            'province' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'professional_no' => 'required|unique:instructors,professional_no',
            'appointment_nature' => 'required',
            'employment_status' => 'required',
            'date_hired' => 'required',
        ];
    }
}
