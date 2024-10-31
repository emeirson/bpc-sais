<?php

namespace App\Livewire;

use App\Models\ClassCourse;
use Livewire\Component;
use Livewire\WithPagination;

class ClassCourseTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.class-course-table', [
            'classes' => ClassCourse::latest()->where('class_code', 'like', "%{$this->search}%")->paginate(7)
        ]);
    }
}
