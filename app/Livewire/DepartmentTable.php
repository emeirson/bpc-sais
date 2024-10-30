<?php

namespace App\Livewire;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentTable extends Component
{
    use WithPagination;

    public $search = '';
    public function render()
    {
        return view('livewire.department-table', [
            'departments' => Department::latest()->where('description', 'like', "%{$this->search}%")->paginate(7)
        ]);
    }
}
