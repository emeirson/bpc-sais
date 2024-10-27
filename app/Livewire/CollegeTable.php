<?php

namespace App\Livewire;

use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;

class CollegeTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.college-table', [
            'colleges' => College::latest()->where('description', 'like', "%{$this->search}%")->paginate(7)
        ]);
    }
}
