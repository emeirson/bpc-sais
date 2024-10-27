<?php

namespace App\Livewire;

use App\Models\Program;
use Livewire\Component;
use Livewire\WithPagination;

class ProgramTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.program-table', [
            'programs' => Program::latest()->where('description', 'like', "%{$this->search}%")->paginate(7)
        ]);
    }
}
