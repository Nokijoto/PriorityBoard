<?php

namespace App\Livewire\Matrix;

use Livewire\Component;

class Task extends Component
{
    public $task ;

    public function mount($task)
    {
        $this->task = $task;
    }
    public function render()
    {
        return view('livewire.matrix.task');
    }
}
