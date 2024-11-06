<?php

namespace App\Livewire;

use Livewire\Component;

class StudentProgramLevelTable extends Component
{
    public $student;
    public function render()
    {
        dd($this->student->programs);
        return view('livewire.student-program-level-table', [
            'student' => $this->student->programs,
        ]);
    }
}
