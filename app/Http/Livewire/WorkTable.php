<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MasterShift;

class WorkTable extends Component
{
    public $masterShift = '';
    public $shiftId = '';
    public $year = '';
    public $month = '';
    public $workDay = '';
    public $goingWorkHour = '';
    public $goingWorkMinute = '';
    public $oldGoingWorkHour = '';
    public $oldGoingWorkMinute = '';
    public $leavingWorkHour = '';
    public $leavingWorkMinute = '';

    public function mount($workTable,$year = 0,$month = 0)
    {
      // 年月の指定がないとき
      if(empty($year) || empty($month)){
        $this->year = date('Y');
        $this->month = date('m');
      } else {
        $this->year = $year;
        $this->month = $month;
      }

      $this->workDay = $workTable->workDay;
      $this->shiftId = $workTable->shiftId;

      if(empty($workTable->goingWorkHour) || empty($workTable->goingWorkMinute)){
        $this->goingWorkHour = $workTable->startHour;
        $this->goingWorkMinute = $workTable->startMinute;
      } else {
        $this->goingWorkHour = $workTable->goingWorkHour;
        $this->goingWorkMinute = $workTable->goingWorkMinute;
      }

      $this->oldGoingWorkHour = $this->goingWorkHour;
      $this->oldGoingWorkMinute = $this->goingWorkMinute;

      if(empty($workTable->leavingWorkHour) || empty($workTable->leavingWorkMinute)){
        $this->leavingWorkHour = $workTable->endHour;
        $this->leavingWorkMinute = $workTable->endMinute;
      } else {
        $this->leavingWorkHour = $workTable->leavingWorkHour;
        $this->leavingWorkMinute = $workTable->leavingWorkMinute;
      }

      $this->masterShift = MasterShift::select('shiftId','shiftName')->get()->pluck('shiftName','shiftId');

    }

    public function onShiftChange()
    {
      if($this->goingWorkHour!=$this->oldGoingWorkHour){
        $this->goingWorkHour = $this->oldGoingWorkHour;
      }
    }

    public function render()
    {
        return view('livewire.work-table');
    }
}
