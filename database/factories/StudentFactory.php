<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_code' => Student::generateStudentId(),
            'lastname' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'middlename' => $this->faker->optional()->firstName,
            'name_extension' => $this->faker->optional()->randomElement(['', 'Jr.', 'Sr.', 'II', 'III']),
            'barangay' => $this->faker->streetName,
            'town' => $this->faker->city,
            'province' => $this->faker->state,
            'birthdate' => $this->faker->date('Y-m-d', 'now - 18 years'),
            'birthplace' => $this->faker->city,
            'sex' => $this->faker->randomElement(['male', 'female']),
            'civil_status' => $this->faker->randomElement(['single', 'married', 'divorced', 'widowed', 'separated', 'solo parent',]),
            'religion' => $this->faker->word,
            'mother_tongue' => $this->faker->word,
            'citizenship' => $this->faker->country,
            'mobile_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,

            // Family Information
            'father_lastname' => $this->faker->lastName,
            'father_firstname' => $this->faker->firstName,
            'father_middlename' => $this->faker->optional()->firstName,
            'father_education' => $this->faker->randomElement(['Elementary Graduate', 'High School Graduate', 'College Graduate', 'Master\'s Graduate', 'Doctorate Graduate']),
            'father_address' => $this->faker->address,
            'father_mobile_number' => $this->faker->optional()->phoneNumber,
            'mother_lastname' => $this->faker->lastName,
            'mother_firstname' => $this->faker->firstName,
            'mother_middlename' => $this->faker->optional()->firstName,
            'mother_education' => $this->faker->randomElement(['Elementary Graduate', 'High School Graduate', 'College Graduate', 'Master\'s Graduate', 'Doctorate Graduate']),
            'mother_address' => $this->faker->address,
            'mother_mobile_number' => $this->faker->optional()->phoneNumber,
            'beneficiary_4ps' => $this->faker->boolean(),

            // Academic Information
            'school_name' => $this->faker->company . " High School",
            'school_address' => $this->faker->address,
            'honors_received' => $this->faker->optional()->sentence(3),
            'year_graduated' => $this->faker->numberBetween(2000, date('Y'))
        ];
    }
}
