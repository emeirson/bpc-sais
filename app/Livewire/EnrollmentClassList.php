<?php

namespace App\Livewire;

use App\Models\ClassCourse;
use Livewire\Component;

class EnrollmentClassList extends Component
{
    public $student;
    public $sections;
    public $selected_section;
    public $classes = [];

    public function render()
    {
        if ($this->selected_section) {
            $this->classes = ClassCourse::where("section_id", $this->selected_section)->get();
        } else {
            $this->classes = [];
        }

        return view('livewire.enrollment-class-list', [
            'classes' => $this->classes,
        ]);
    }
}
