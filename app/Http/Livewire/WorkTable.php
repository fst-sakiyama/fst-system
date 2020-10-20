<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MasterShift;

class WorkTable extends Component
{
    public $masterShift = '';
    public $shiftId = '';
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
    public $checked = '';
    public $disabled = '';
    public $specialReason = '';
    public $remarks = '';

    public function mount($workTable,$masterShift)
    {
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

      // dd($workTable->workTableRest1StartHour.' '.$workTable->workTableRest1StartMinute.' '.$workTable->workTableRest1EndHour.' '.$workTable->workTableRest1EndMinute);

      if(($workTable->workTableRest1StartHour) != "null" && ($workTable->workTableRest1StartMinute) != "null" && ($workTable->workTableRest1EndHour) != "null" && ($workTable->workTableRest1EndMinute) != "null"){
        $this->workTableRest1StartHour = $workTable->workTableRest1StartHour;
        $this->workTableRest1StartMinute = $workTable->workTableRest1StartMinute;
        $this->workTableRest1EndHour = $workTable->workTableRest1EndHour;
        $this->workTableRest1EndMinute = $workTable->workTableRest1EndMinute;
      } else {
        $this->workTableRest1StartHour = $workTable->rest1StartHour;
        $this->workTableRest1StartMinute = $workTable->rest1StartMinute;
        $this->workTableRest1EndHour = $workTable->rest1EndHour;
        $this->workTableRest1EndMinute = $workTable->rest1EndMinute;
      }

      $this->oldWorkTableRest1StartHour = $this->workTableRest1StartHour;
      $this->oldWorkTableRest1StartMinute = $this->workTableRest1StartMinute;
      $this->oldWorkTableRest1EndHour = $this->workTableRest1EndHour;
      $this->oldWorkTableRest1EndMinute = $this->workTableRest1EndMinute;

      if(($workTable->workTableRest2StartHour) != "null" && ($workTable->workTableRest2StartMinute) != "null" && ($workTable->workTableRest2EndHour) != "null" && ($workTable->workTableRest2EndMinute) != "null"){
        $this->workTableRest2StartHour = $workTable->workTableRest2StartHour;
        $this->workTableRest2StartMinute = $workTable->workTableRest2StartMinute;
        $this->workTableRest2EndtHour = $workTable->workTableRest2EndHour;
        $this->workTableRest2EndMinute = $workTable->workTableRest2EndMinute;
      } else {
        $this->workTableRest2StartHour = $workTable->rest2StartHour;
        $this->workTableRest2StartMinute = $workTable->rest2StartMinute;
        $this->workTableRest2EndHour = $workTable->rest2EndHour;
        $this->workTableRest2EndMinute = $workTable->rest2EndMinute;
      }

      $this->oldWorkTableRest2StartHour = $this->workTableRest2StartHour;
      $this->oldWorkTableRest2StartMinute = $this->workTableRest2StartMinute;
      $this->oldWorkTableRest2EndHour = $this->workTableRest2EndHour;
      $this->oldWorkTableRest2EndMinute = $this->workTableRest2EndMinute;

      if(($workTable->workTableRest3StartHour) != "null" && ($workTable->workTableRest3StartMinute) != "null" && ($workTable->workTableRest3EndHour) != "null" && ($workTable->workTableRest3EndMinute) != "null"){
        $this->workTableRest3StartHour = $workTable->workTableRest3StartHour;
        $this->workTableRest3StartMinute = $workTable->workTableRest3StartMinute;
        $this->workTableRest3EndtHour = $workTable->workTableRest3EndHour;
        $this->workTableRest3EndMinute = $workTable->workTableRest3EndMinute;
      } else {
        $this->workTableRest3StartHour = $workTable->rest3StartHour;
        $this->workTableRest3StartMinute = $workTable->rest3StartMinute;
        $this->workTableRest3EndHour = $workTable->rest3EndHour;
        $this->workTableRest3EndMinute = $workTable->rest3EndMinute;
      }

      $this->oldWorkTableRest3StartHour = $this->workTableRest3StartHour;
      $this->oldWorkTableRest3StartMinute = $this->workTableRest3StartMinute;
      $this->oldWorkTableRest3EndHour = $this->workTableRest3EndHour;
      $this->oldWorkTableRest3EndMinute = $this->workTableRest3EndMinute;

      if($workTable->lateEarlyLeave == 1){
        $this->checked = true;
        $this->disabled = '';
      } else {
        $this->checked = false;
        $this->disabled = 'disabled';
      }

      $this->specialReason = $workTable->specialReason;
      $this->remarks = $workTable->remarks;

      $this->masterShift = $masterShift;

    }

    public function onShiftChange()
    {
      $item = MasterShift::find($this->shiftId);
      // if($this->goingWorkHour!=$this->oldGoingWorkHour){
      //   $this->goingWorkHour = $this->oldGoingWorkHour;
      // }
      if($this->goingWorkHour == $this->oldGoingWorkHour && $this->goingWorkMinute == $this->oldGoingWorkMinute){
        $this->goingWorkHour = $item->startHour;
        $this->goingWorkMinute = $item->startMinute;
        $this->oldGoingWorkHour = $item->startHour;
        $this->oldGoingWorkMinute = $item->startMinute;
      } else {
        $this->oldGoingWorkHour = $this->goingWorkHour;
        $this->oldGoingWorkMinute = $this->goingWorkMinute;
      }

      if($this->leavingWorkHour == $this->oldLeavingWorkHour && $this->leavingWorkMinute == $this->oldLeavingWorkMinute){
        $this->leavingWorkHour = $item->endHour;
        $this->leavingWorkMinute = $item->endMinute;
        $this->oldLeavingWorkHour = $item->endHour;
        $this->oldLeavingWorkMinute = $item->endMinute;
      } else {
        $this->oldLeavingWorkHour = $this->leavingWorkHour;
        $this->oldLeavingWorkMinute = $this->leavingWorkMinute;
      }

      if($this->workTableRest1StartHour == $this->oldWorkTableRest1StartHour && $this->workTableRest1StartMinute == $this->oldWorkTableRest1StartMinute){
        $this->workTableRest1StartHour = $item->rest1StartHour;
        $this->workTableRest1StartMinute = $item->rest1StartMinute;
        $this->oldWorkTableRest1StartHour = $item->rest1StartHour;
        $this->oldWorkTableRest1StartMinute = $item->rest1StartMinute;
      } else {
        $this->oldWorkTableRest1StartHour = $this->workTableRest1StartHour;
        $this->oldWorkTableRest1StartMinute = $this->workTableRest1StartMinute;
      }

      if($this->workTableRest1EndHour == $this->oldWorkTableRest1EndHour && $this->workTableRest1EndMinute == $this->oldWorkTableRest1EndMinute){
        $this->workTableRest1EndHour = $item->rest1EndHour;
        $this->workTableRest1EndMinute = $item->rest1EndMinute;
        $this->oldWorkTableRest1EndHour = $item->rest1EndHour;
        $this->oldWorkTableRest1EndMinute = $item->rest1EndMinute;
      } else {
        $this->oldWorkTableRest1EndHour = $this->workTableRest1EndHour;
        $this->oldWorkTableRest1EndMinute = $this->workTableRest1EndMinute;
      }

      if($this->workTableRest2StartHour == $this->oldWorkTableRest2StartHour && $this->workTableRest2StartMinute == $this->oldWorkTableRest2StartMinute){
        $this->workTableRest2StartHour = $item->rest2StartHour;
        $this->workTableRest2StartMinute = $item->rest2StartMinute;
        $this->oldWorkTableRest2StartHour = $item->rest2StartHour;
        $this->oldWorkTableRest2StartMinute = $item->rest2StartMinute;
      } else {
        $this->oldWorkTableRest2StartHour = $this->workTableRest2StartHour;
        $this->oldWorkTableRest2StartMinute = $this->workTableRest2StartMinute;
      }

      if($this->workTableRest2EndHour == $this->oldWorkTableRest2EndHour && $this->workTableRest2EndMinute == $this->oldWorkTableRest2EndMinute){
        $this->workTableRest2EndHour = $item->rest2EndHour;
        $this->workTableRest2EndMinute = $item->rest2EndMinute;
        $this->oldWorkTableRest2EndHour = $item->rest2EndHour;
        $this->oldWorkTableRest2EndMinute = $item->rest2EndMinute;
      } else {
        $this->oldWorkTableRest2EndHour = $this->workTableRest2EndHour;
        $this->oldWorkTableRest2EndMinute = $this->workTableRest2EndMinute;
      }

      if($this->workTableRest3StartHour == $this->oldWorkTableRest3StartHour && $this->workTableRest3StartMinute == $this->oldWorkTableRest3StartMinute){
        $this->workTableRest3StartHour = $item->rest3StartHour;
        $this->workTableRest3StartMinute = $item->rest3StartMinute;
        $this->oldWorkTableRest3StartHour = $item->rest3StartHour;
        $this->oldWorkTableRest3StartMinute = $item->rest3StartMinute;
      } else {
        $this->oldWorkTableRest3StartHour = $this->workTableRest3StartHour;
        $this->oldWorkTableRest3StartMinute = $this->workTableRest3StartMinute;
      }

      if($this->workTableRest3EndHour == $this->oldWorkTableRest3EndHour && $this->workTableRest3EndMinute == $this->oldWorkTableRest3EndMinute){
        $this->workTableRest3EndHour = $item->rest3EndHour;
        $this->workTableRest3EndMinute = $item->rest3EndMinute;
        $this->oldWorkTableRest3EndHour = $item->rest3EndHour;
        $this->oldWorkTableRest3EndMinute = $item->rest3EndMinute;
      } else {
        $this->oldWorkTableRest3EndHour = $this->workTableRest3EndHour;
        $this->oldWorkTableRest3EndMinute = $this->workTableRest3EndMinute;
      }

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
