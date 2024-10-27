<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {
            Student::factory(1)->create();
        }
    }
}
