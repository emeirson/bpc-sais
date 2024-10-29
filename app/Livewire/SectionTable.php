<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;

class SectionTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.section-table', [
            'sections' => Section::latest()->where('section_code', 'like', "%{$this->search}%")->paginate(7)
        ]);
    }
}
