<?php

namespace App\Livewire;

use App\Models\Program;
use Livewire\Component;
use Livewire\WithPagination;

class ProgramCoursesTable extends Component
{
    use WithPagination;

    public $courses;
    public $program;
    public $filterYear;
    public $filterSemester;

    public function render()
    {
        $this->courses = $this->program->courses;
        if ($this->filterYear) {
            $this->courses =  $this->program->courses()->where('year_level', $this->filterYear)->get();
        }
        if ($this->filterSemester) {
            $this->courses =  $this->program->courses()->where('semester', $this->filterSemester)->get();
        }
        if ($this->filterYear && $this->filterSemester) {
            $this->courses =  $this->program->courses()->where([
                'year_level' => $this->filterYear,
                'semester' => $this->filterSemester
            ])->get();
        }

        return view('livewire.program-courses-table', [
            'programs' => $this->courses
        ]);
    }
}
