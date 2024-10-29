<?php

namespace App\Livewire;

use App\Models\Instructor;
use Livewire\Component;
use Livewire\WithPagination;

class InstructorTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.instructor-table', [
            'instructors' => Instructor::latest()->where('firstname', 'like', "%{$this->search}%")->paginate(7)
        ]);
    }
}
