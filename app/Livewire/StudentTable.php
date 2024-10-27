<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.student-table', [
            'students' => Student::latest()->where('firstname', 'like', "%{$this->search}%")->paginate(7)
        ]);
    }
}
