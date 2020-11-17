<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WorkLoad extends Component
{
    public $teamProjectId;
    public $nonOpe;
    public $workLoad;

    public function mount($teamProjectId,$nonOpe,$workLoads)
    {
        $this->nonOpe = $nonOpe;
        $this->teamProjectId = $teamProjectId;
        if(isset($workLoads[$teamProjectId])){
          $this->workLoad = $workLoads[$teamProjectId][0];
        }else{
          $this->workLoad = '';
        }
    }

    public function render()
    {
        return view('livewire.work-load');
    }
}
