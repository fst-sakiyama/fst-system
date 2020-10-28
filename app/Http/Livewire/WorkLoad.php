<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WorkTable;

class WorkLoad extends Component
{
    public $calcWorkHour = '';

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.work-load');
    }
}
