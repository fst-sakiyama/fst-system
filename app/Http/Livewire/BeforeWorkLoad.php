<?php

/**
 *  ライブワイヤ　工数表
 *
 *
 */

namespace App\Http\Livewire;

use Livewire\Component;

class BeforeWorkLoad extends Component
{
    public $teamProjectId;
    public $before;
    public $nowId;

    public function mount($teamProjectId,$before,$nowId)
    {
        $this->teamProjectId = $teamProjectId;
        if(isset($before[$teamProjectId])){
          $this->before = $before[$teamProjectId];
        }else{
          $this->before = '';
        }
        $this->nowId = $nowId;
    }

    public function render()
    {
        return view('livewire.before-work-load');
    }
}
