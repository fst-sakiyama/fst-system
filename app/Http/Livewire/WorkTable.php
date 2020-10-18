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
    public $oldLeavingWorkHour = '';
    public $oldLeavingWorkMinute = '';
    public $workTableRest1StartHour = '';
    public $workTableRest1StartMinute ='';
    public $oldWorkTableRest1StartHour = '';
    public $oldWorkTableRest1StartMinute ='';
    public $workTableRest1EndHour = '';
    public $workTableRest1EndMinute ='';
    public $oldWorkTableRest1EndHour = '';
    public $oldWorkTableRest1EndMinute ='';
    public $workTableRest2StartHour = '';
    public $workTableRest2StartMinute ='';
    public $oldWorkTableRest2StartHour = '';
    public $oldWorkTableRest2StartMinute ='';
    public $workTableRest2EndHour = '';
    public $workTableRest2EndMinute ='';
    public $oldWorkTableRest2EndHour = '';
    public $oldWorkTableRest2EndMinute ='';
    public $workTableRest3StartHour = '';
    public $workTableRest3StartMinute ='';
    public $oldWorkTableRest3StartHour = '';
    public $oldWorkTableRest3StartMinute ='';
    public $workTableRest3EndHour = '';
    public $workTableRest3EndMinute ='';
    public $oldWorkTableRest3EndHour = '';
    public $oldWorkTableRest3EndMinute ='';
    public $lateEarlyLeave ='';
    public $disabled = '';

    public function mount($workTable,$masterShift,$year = 0,$month = 0)
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

      $this->oldLeavingWorkHour = $this->leavingWorkHour;
      $this->oldLeavingWorkMinute = $this->leavingWorkMinute;

      if(empty($workTable->workTableRest1StartHour) || empty($workTable->workTableRest1StartMinute) || empty($workTable->workTableRest1EndHour) || empty($workTable->workTableRest1EndMinute)){
        $this->workTableRest1StartHour = $workTable->rest1StartHour;
        $this->workTableRest1StartMinute = $workTable->rest1StartMinute;
        $this->workTableRest1EndHour = $workTable->rest1EndHour;
        $this->workTableRest1EndMinute = $workTable->rest1EndMinute;
      } else {
        $this->workTableRest1StartHour = $workTable->workTableRest1StartHour;
        $this->workTableRest1StartMinute = $workTable->workTableRest1StartMinute;
        $this->workTableRest1EndtHour = $workTable->workTableRest1EndHour;
        $this->workTableRest1EndMinute = $workTable->workTableRest1EndMinute;
      }

      $this->oldWorkTableRest1StartHour = $this->workTableRest1StartHour;
      $this->oldWorkTableRest1StartMinute = $this->workTableRest1StartMinute;
      $this->oldWorkTableRest1EndHour = $this->workTableRest1EndHour;
      $this->oldWorkTableRest1EndMinute = $this->workTableRest1EndMinute;

      if(empty($workTable->workTableRest2StartHour) || empty($workTable->workTableRest2StartMinute) || empty($workTable->workTableRest2EndHour) || empty($workTable->workTableRest2EndMinute)){
        $this->workTableRest2StartHour = $workTable->rest2StartHour;
        $this->workTableRest2StartMinute = $workTable->rest2StartMinute;
        $this->workTableRest2EndHour = $workTable->rest2EndHour;
        $this->workTableRest2EndMinute = $workTable->rest2EndMinute;
      } else {
        $this->workTableRest2StartHour = $workTable->workTableRest2StartHour;
        $this->workTableRest2StartMinute = $workTable->workTableRest2StartMinute;
        $this->workTableRest2EndtHour = $workTable->workTableRest2EndHour;
        $this->workTableRest2EndMinute = $workTable->workTableRest2EndMinute;
      }

      $this->oldWorkTableRest2StartHour = $this->workTableRest2StartHour;
      $this->oldWorkTableRest2StartMinute = $this->workTableRest2StartMinute;
      $this->oldWorkTableRest2EndHour = $this->workTableRest2EndHour;
      $this->oldWorkTableRest2EndMinute = $this->workTableRest2EndMinute;

      if(empty($workTable->workTableRest3StartHour) || empty($workTable->workTableRest3StartMinute) || empty($workTable->workTableRest3EndHour) || empty($workTable->workTableRest3EndMinute)){
        $this->workTableRest3StartHour = $workTable->rest3StartHour;
        $this->workTableRest3StartMinute = $workTable->rest3StartMinute;
        $this->workTableRest3EndHour = $workTable->rest3EndHour;
        $this->workTableRest3EndMinute = $workTable->rest3EndMinute;
      } else {
        $this->workTableRest3StartHour = $workTable->workTableRest3StartHour;
        $this->workTableRest3StartMinute = $workTable->workTableRest3StartMinute;
        $this->workTableRest3EndtHour = $workTable->workTableRest3EndHour;
        $this->workTableRest3EndMinute = $workTable->workTableRest3EndMinute;
      }

      $this->oldWorkTableRest3StartHour = $this->workTableRest3StartHour;
      $this->oldWorkTableRest3StartMinute = $this->workTableRest3StartMinute;
      $this->oldWorkTableRest3EndHour = $this->workTableRest3EndHour;
      $this->oldWorkTableRest3EndMinute = $this->workTableRest3EndMinute;

      if($workTable->lateEarlyLeave == 1){
        $this->disabled = '';
      } else {
        $this->disabled = 'disabled';
      }

      $this->masterShift = $masterShift;

    }

    public function onShiftChange()
    {
      $item = MasterShift::find($this->shiftId);
      // if($this->goingWorkHour!=$this->oldGoingWorkHour){
      //   $this->goingWorkHour = $this->oldGoingWorkHour;
      // }
      $this->goingWorkHour = $item->startHour;
      $this->goingWorkMinute = $item->startMinute;
      $this->leavingWorkHour = $item->endHour;
      $this->leavingWorkMinute = $item->endMinute;
      $this->workTableRest1StartHour = $item->rest1StartHour;
      $this->workTableRest1StartMinute = $item->rest1StartMinute;
      $this->workTableRest1EndHour = $item->rest1EndHour;
      $this->workTableRest1EndMinute = $item->rest1EndMinute;
      $this->workTableRest2StartHour = $item->rest2StartHour;
      $this->workTableRest2StartMinute = $item->rest2StartMinute;
      $this->workTableRest2EndHour = $item->rest2EndHour;
      $this->workTableRest2EndMinute = $item->rest2EndMinute;
      $this->workTableRest3StartHour = $item->rest3StartHour;
      $this->workTableRest3StartMinute = $item->rest3StartMinute;
      $this->workTableRest3EndHour = $item->rest3EndHour;
      $this->workTableRest3EndMinute = $item->rest3EndMinute;
    }

    public function checkLateEarlyLeave()
    {
      if($this->lateEarlyLeave == 1){
        $this->disabled = '';
      } else {
        $this->disabled = 'disabled';
      }
    }

    public function render()
    {
        return view('livewire.work-table');
    }
}
