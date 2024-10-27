<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colleges = [
            [
                'college_code' => 'CAST',
                'description' => 'College of Arts, Science, and Technology',
            ],
            [
                'college_code' => 'COE',
                'description' => 'College of Engineering',
            ],
            [
                'college_code' => 'COB',
                'description' => 'College of Business',
            ],
            [
                'college_code' => 'COEED',
                'description' => 'College of Education',
            ],
            [
                'college_code' => 'CON',
                'description' => 'College of Nursing',
            ],
            [
                'college_code' => 'COS',
                'description' => 'College of Science',
            ],
            [
                'college_code' => 'COC',
                'description' => 'College of Communication',
            ],
            [
                'college_code' => 'CAS',
                'description' => 'College of Arts and Sciences',
            ],
            [
                'college_code' => 'CAFES',
                'description' => 'College of Agriculture, Forestry, and Environmental Science',
            ],
            [
                'college_code' => 'COLAW',
                'description' => 'College of Law',
            ]
        ];

        foreach ($colleges as $college) {
            College::create($college);
        }
    }
}
