<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            // Personal Information
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'name_extension' => 'nullable|string|max:10',
            'barangay' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'birthdate' => 'required|date|before:today',
            'birthplace' => 'required|string|max:255',
            'sex' => 'required|string|in:male,female', // Assuming predefined values
            'civil_status' => 'required|string|max:50',
            'religion' => 'nullable|string|max:100',
            'mother_tongue' => 'nullable|string|max:100',
            'citizenship' => 'required|string|max:100',
            'mobile_number' => 'required|string|regex:/^[0-9]{10,15}$/', // Adjust length as needed
            'email' => 'required|email|unique:students,email|max:255',

            // Family Information
            'father_lastname' => 'required|string|max:255',
            'father_firstname' => 'required|string|max:255',
            'father_middlename' => 'nullable|string|max:255',
            'father_education' => 'nullable|string|max:255',
            'father_address' => 'nullable|string|max:255',
            'father_mobile_number' => 'nullable|string|regex:/^[0-9]{10,15}$/', // Adjust length as needed
            'mother_lastname' => 'required|string|max:255',
            'mother_firstname' => 'required|string|max:255',
            'mother_middlename' => 'nullable|string|max:255',
            'mother_education' => 'nullable|string|max:255',
            'mother_address' => 'nullable|string|max:255',
            'mother_mobile_number' => 'nullable|string|regex:/^[0-9]{10,15}$/', // Adjust length as needed
            'beneficiary_4ps' => 'required|boolean',

            // Academic Information
            'school_name' => 'required|string|max:255',
            'school_address' => 'required|string|max:255',
            'honors_received' => 'nullable|string|max:255',
            'year_graduated' => 'required|integer|min:1900|max:' . date('Y'),

            'year_level_id' => 'required',
            'academic_year_id' => 'required',
            'program_id' => 'required'
        ];
    }
}
