<?php

namespace App\Livewire;

use App\Models\Semester;
use Livewire\Component;
use Livewire\WithPagination;

class SemesterTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.semester-table', [
            'semesters' => Semester::latest()->where('name', 'like', "%{$this->search}%")->paginate(7)
        ]);
    }
}
