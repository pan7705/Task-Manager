<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $tasks = Task::where('user_id', auth()->id()) 
                    ->search($this->search)
                    ->get();

        return view('livewire.search', [
            'tasks' => $tasks,
        ]);
    }
}
