<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WorkLoad extends Component
{
    public $teamProjectId;
    public $nonOpe;
    public $workLoad;
    public $nowId;

    public function mount($teamProjectId,$nonOpe,$workLoads,$nowId)
    {
        $this->nonOpe = $nonOpe;
        $this->teamProjectId = $teamProjectId;
        if(isset($workLoads[$teamProjectId])){
          $this->workLoad = $workLoads[$teamProjectId][0];
        }else{
          $this->workLoad = '';
        }
        $this->nowID = $nowId;
    }

    public function render()
    {
        return view('livewire.work-load');
    }
}
