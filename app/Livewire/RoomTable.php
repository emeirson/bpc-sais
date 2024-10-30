<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class RoomTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.room-table', [
            'rooms' => Room::latest()->where('description', 'like', "%{$this->search}%")->paginate(7)
        ]);
    }
}
