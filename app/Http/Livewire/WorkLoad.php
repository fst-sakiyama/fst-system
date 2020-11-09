<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TeamProject;

class WorkLoad extends Component
{
    public $modelTest;
    public $testCalcWorkHour;
    public $projectId;

    public function mount(TeamProject $teamProject)
    {
        $this->projectId = $teamProject->projectId;
    }

    public function updatedModelTest($value)
    {
        if(ctype_digit($value)){
          $this->test=$value;
          $this->testCalcWorkHour-=$value;
        } else {
          $this->modelTest = '';
        }
    }

    public function render()
    {
        return view('livewire.work-load');
    }
}
