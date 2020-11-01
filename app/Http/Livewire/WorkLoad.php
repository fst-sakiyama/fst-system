<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MasterProject;

class WorkLoad extends Component
{
    public $test;
    public $modelTest;
    public $testCalcWorkHour;

    public function mount(MasterProject $masterProject)
    {
        $this->test = 'test';
    }

    public function updatedModelTest($value)
    {
        $this->test=$value;
        $this->testCalcWorkHour-=$value;
    }

    public function render()
    {
        return view('livewire.work-load');
    }
}
