<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WorkLoadMemo extends Component
{
    public $teamProjectId;
    public $nonOpe;
    public $memo;

    public function mount($teamProjectId,$nonOpe,$workLoads)
    {
        $this->nonOpe = $nonOpe;
        $this->teamProjectId = $teamProjectId;
        if(isset($workLoads[$teamProjectId])){
          $this->memo = $workLoads[$teamProjectId][1];
        }else{
          $this->memo = '';
        }
    }
    public function render()
    {
        return view('livewire.work-load-memo');
    }
}
