<?php

namespace App\Livewire\Matrix;

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
        return view('livewire.matrix.index');
    }
}
