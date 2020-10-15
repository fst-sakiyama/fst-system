<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MasterShift;

class WorkTable extends Component
{
    public $masterShift = '';
    public $shiftId = 1;

    public function mount()
    {
      $this->masterShift = MasterShift::select('shiftId','shiftName')->get()->pluck('shiftName','shiftId');

    }

    public function onChange()
    {
        $this->shiftId = $this->shiftId;

    }

    public function render()
    {
        return view('livewire.work-table');
    }
}
