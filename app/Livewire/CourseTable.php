<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CourseTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.course-table', [
            'courses' => Course::latest()->where('description', 'like', "%{$this->search}%")->paginate(7)
        ]);
    }
}
