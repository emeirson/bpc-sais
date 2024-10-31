<?php

namespace App\Livewire;

use App\Models\YearLevel;
use Livewire\Component;
use Livewire\WithPagination;

class YearLevelTable extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.year-level-table', [
            'levels' => YearLevel::latest()->where('name', 'like', "%{$this->search}%")->paginate(7)
        ]);
    }
}
