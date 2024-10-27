<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ProgramCoursesTable extends Component
{
    use WithPagination;

    public $courses;

    public function render()
    {
        return view('livewire.program-courses-table', [
            'programs' => $this->courses
        ]);
    }
}
