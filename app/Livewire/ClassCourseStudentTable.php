<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class ClassCourseStudentTable extends Component
{
    use WithPagination;

    public $search = '';
    public $class;

    public function render()
    {
        return view('livewire.class-course-student-table', [
            'students' => $this->class->students
        ]);
    }
}
