<?php

namespace App\Livewire\Tasks;

use Livewire\Component;

class Index extends Component
{
    public $tasks ;

    public function mount($tasks)
    {
        $this->tasks = $tasks;
    }
    public function render()
    {
        return view('livewire.tasks.index');
    }
}
