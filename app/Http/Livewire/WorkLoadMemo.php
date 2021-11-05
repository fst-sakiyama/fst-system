<?php

/**
 *  ライブワイヤ　工数表のメモ管理
 *
 *
 */

namespace App\Http\Livewire;

use Livewire\Component;

class WorkLoadMemo extends Component
{
    public $teamProjectId;
    public $nonOpe;
    public $memo;
    public $nowId;

    public function mount($teamProjectId,$nonOpe,$workLoads,$nowId)
    {
        $this->nonOpe = $nonOpe;
        $this->teamProjectId = $teamProjectId;
        if(isset($workLoads[$teamProjectId])){
          $this->memo = $workLoads[$teamProjectId][1];
        }else{
          $this->memo = '';
        }
        $this->nowID = $nowId;
    }
    public function render()
    {
        return view('livewire.work-load-memo');
    }
}
