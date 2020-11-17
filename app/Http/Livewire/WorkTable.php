<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MasterShift;
use App\Models\ShiftTable;

class WorkTable extends Component
{
    public $masterShift = '';
    public $shiftId = '';
    public $workDay = '';
    public $startHour = '';
    public $startMinute = '';
    public $oldstartHour = '';
    public $oldstartMinute = '';
    public $endHour = '';
    public $endMinute = '';
    public $oldendHour = '';
    public $oldendMinute = '';
    public $rest1StartHour = '';
    public $rest1StartMinute ='';
    public $oldrest1StartHour = '';
    public $oldrest1StartMinute ='';
    public $rest1EndHour = '';
    public $rest1EndMinute ='';
    public $oldrest1EndHour = '';
    public $oldrest1EndMinute ='';
    public $rest2StartHour = '';
    public $rest2StartMinute ='';
    public $oldrest2StartHour = '';
    public $oldrest2StartMinute ='';
    public $rest2EndHour = '';
    public $rest2EndMinute ='';
    public $oldrest2EndHour = '';
    public $oldrest2EndMinute ='';
    public $rest3StartHour = '';
    public $rest3StartMinute ='';
    public $oldrest3StartHour = '';
    public $oldrest3StartMinute ='';
    public $rest3EndHour = '';
    public $rest3EndMinute ='';
    public $oldrest3EndHour = '';
    public $oldrest3EndMinute ='';
    public $lateEarlyLeave ='';
    public $checked = '';
    public $disabled = '';
    public $specialReason = '';
    public $remarks = '';

    public $activestartHour = '';
    public $activestartMinute = '';
    public $activeendHour = '';
    public $activeendMinute = '';
    public $activerest1StartHour = '';
    public $activerest1StartMinute ='';
    public $activerest1EndHour = '';
    public $activerest1EndMinute ='';
    public $activerest2StartHour = '';
    public $activerest2StartMinute ='';
    public $activerest2EndHour = '';
    public $activerest2EndMinute ='';
    public $activerest3StartHour = '';
    public $activerest3StartMinute ='';
    public $activerest3EndHour = '';
    public $activerest3EndMinute ='';

    public $calcWorkHour = '';

    public function mount($workTable,$masterShift)
    {
      $this->workDay = $workTable->workDay;
      if($workTable->shiftId){
        $this->shiftId = $workTable->shiftId;
      }else{
        $this->shiftId = ShiftTable::find($workTable->shiftTableId)->shiftId;
      }

        $this->startHour = $workTable->startHour;
        $this->startMinute = $workTable->startMinute;

      $this->oldstartHour = $this->startHour;
      $this->oldstartMinute = $this->startMinute;
      $this->activestartHour = $this->startHour;
      $this->activestartMinute = $this->startMinute;

        $this->endHour = $workTable->endHour;
        $this->endMinute = $workTable->endMinute;

      $this->oldendHour = $this->endHour;
      $this->oldendMinute = $this->endMinute;
      $this->activeendHour = $this->endHour;
      $this->activeendMinute = $this->endMinute;

      // dd($workTable->rest1StartHour.' '.$workTable->rest1StartMinute.' '.$workTable->rest1EndHour.' '.$workTable->rest1EndMinute);


        $this->rest1StartHour = $workTable->rest1StartHour;
        $this->rest1StartMinute = $workTable->rest1StartMinute;
        $this->rest1EndHour = $workTable->rest1EndHour;
        $this->rest1EndMinute = $workTable->rest1EndMinute;

      $this->oldrest1StartHour = $this->rest1StartHour;
      $this->oldrest1StartMinute = $this->rest1StartMinute;
      $this->oldrest1EndHour = $this->rest1EndHour;
      $this->oldrest1EndMinute = $this->rest1EndMinute;
      $this->activerest1StartHour = $this->rest1StartHour;
      $this->activerest1StartMinute = $this->rest1StartMinute;
      $this->activerest1EndHour = $this->rest1EndHour;
      $this->activerest1EndMinute = $this->rest1EndMinute;

        $this->rest2StartHour = $workTable->rest2StartHour;
        $this->rest2StartMinute = $workTable->rest2StartMinute;
        $this->rest2EndHour = $workTable->rest2EndHour;
        $this->rest2EndMinute = $workTable->rest2EndMinute;

      $this->oldrest2StartHour = $this->rest2StartHour;
      $this->oldrest2StartMinute = $this->rest2StartMinute;
      $this->oldrest2EndHour = $this->rest2EndHour;
      $this->oldrest2EndMinute = $this->rest2EndMinute;
      $this->activerest2StartHour = $this->rest2StartHour;
      $this->activerest2StartMinute = $this->rest2StartMinute;
      $this->activerest2EndHour = $this->rest2EndHour;
      $this->activerest2EndMinute = $this->rest2EndMinute;

        $this->rest3StartHour = $workTable->rest3StartHour;
        $this->rest3StartMinute = $workTable->rest3StartMinute;
        $this->rest3EndtHour = $workTable->rest3EndHour;
        $this->rest3EndMinute = $workTable->rest3EndMinute;

      $this->oldrest3StartHour = $this->rest3StartHour;
      $this->oldrest3StartMinute = $this->rest3StartMinute;
      $this->oldrest3EndHour = $this->rest3EndHour;
      $this->oldrest3EndMinute = $this->rest3EndMinute;
      $this->activerest3StartHour = $this->rest3StartHour;
      $this->activerest3StartMinute = $this->rest3StartMinute;
      $this->activerest3EndHour = $this->rest3EndHour;
      $this->activerest3EndMinute = $this->rest3EndMinute;

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

      $this->calculationWorkTime();

    }

    public function onShiftChange()
    {
      $item = MasterShift::find($this->shiftId);
      // if($this->startHour!=$this->oldstartHour){
      //   $this->startHour = $this->oldstartHour;
      // }
      if($this->startHour == $this->oldstartHour && $this->startMinute == $this->oldstartMinute){
        $this->startHour = $item->startHour;
        $this->startMinute = $item->startMinute;
        $this->oldstartHour = $item->startHour;
        $this->oldstartMinute = $item->startMinute;
        $this->activestartHour = $item->startHour;
        $this->activestartMinute = $item->startMinute;
      } else {
        $this->oldstartHour = $this->startHour;
        $this->oldstartMinute = $this->startMinute;
        $this->activestartHour = $this->startHour;
        $this->activestartMinute = $this->startMinute;
      }

      if($this->endHour == $this->oldendHour && $this->endMinute == $this->oldendMinute){
        $this->endHour = $item->endHour;
        $this->endMinute = $item->endMinute;
        $this->oldendHour = $item->endHour;
        $this->oldendMinute = $item->endMinute;
        $this->activeendHour = $item->endHour;
        $this->activeendMinute = $item->endMinute;
      } else {
        $this->oldendHour = $this->endHour;
        $this->oldendMinute = $this->endMinute;
        $this->activeendHour = $this->endHour;
        $this->activeendMinute = $this->endMinute;
      }

      if($this->rest1StartHour == $this->oldrest1StartHour && $this->rest1StartMinute == $this->oldrest1StartMinute){
        $this->rest1StartHour = $item->rest1StartHour;
        $this->rest1StartMinute = $item->rest1StartMinute;
        $this->oldrest1StartHour = $item->rest1StartHour;
        $this->oldrest1StartMinute = $item->rest1StartMinute;
        $this->activerest1StartHour = $item->rest1StartHour;
        $this->activerest1StartMinute = $item->rest1StartMinute;
      } else {
        $this->oldrest1StartHour = $this->rest1StartHour;
        $this->oldrest1StartMinute = $this->rest1StartMinute;
        $this->activerest1StartHour = $this->rest1StartHour;
        $this->activerest1StartMinute = $this->rest1StartMinute;
      }

      if($this->rest1EndHour == $this->oldrest1EndHour && $this->rest1EndMinute == $this->oldrest1EndMinute){
        $this->rest1EndHour = $item->rest1EndHour;
        $this->rest1EndMinute = $item->rest1EndMinute;
        $this->oldrest1EndHour = $item->rest1EndHour;
        $this->oldrest1EndMinute = $item->rest1EndMinute;
        $this->activerest1EndHour = $item->rest1EndHour;
        $this->activerest1EndMinute = $item->rest1EndMinute;
      } else {
        $this->oldrest1EndHour = $this->rest1EndHour;
        $this->oldrest1EndHour = $this->rest1EndHour;
        $this->activerest1EndMinute = $this->rest1EndMinute;
        $this->activerest1EndMinute = $this->rest1EndMinute;
      }

      if($this->rest2StartHour == $this->oldrest2StartHour && $this->rest2StartMinute == $this->oldrest2StartMinute){
        $this->rest2StartHour = $item->rest2StartHour;
        $this->rest2StartMinute = $item->rest2StartMinute;
        $this->oldrest2StartHour = $item->rest2StartHour;
        $this->oldrest2StartMinute = $item->rest2StartMinute;
        $this->activerest2StartHour = $item->rest2StartHour;
        $this->activerest2StartMinute = $item->rest2StartMinute;
      } else {
        $this->oldrest2StartHour = $this->rest2StartHour;
        $this->oldrest2StartMinute = $this->rest2StartMinute;
        $this->activerest2StartHour = $this->rest2StartHour;
        $this->activerest2StartMinute = $this->rest2StartMinute;
      }

      if($this->rest2EndHour == $this->oldrest2EndHour && $this->rest2EndMinute == $this->oldrest2EndMinute){
        $this->rest2EndHour = $item->rest2EndHour;
        $this->rest2EndMinute = $item->rest2EndMinute;
        $this->oldrest2EndHour = $item->rest2EndHour;
        $this->oldrest2EndMinute = $item->rest2EndMinute;
        $this->activerest2EndHour = $item->rest2EndHour;
        $this->activerest2EndMinute = $item->rest2EndMinute;
      } else {
        $this->oldrest2EndHour = $this->rest2EndHour;
        $this->oldrest2EndMinute = $this->rest2EndMinute;
        $this->activerest2EndHour = $this->rest2EndHour;
        $this->activerest2EndMinute = $this->rest2EndMinute;
      }

      if($this->rest3StartHour == $this->oldrest3StartHour && $this->rest3StartMinute == $this->oldrest3StartMinute){
        $this->rest3StartHour = $item->rest3StartHour;
        $this->rest3StartMinute = $item->rest3StartMinute;
        $this->oldrest3StartHour = $item->rest3StartHour;
        $this->oldrest3StartMinute = $item->rest3StartMinute;
        $this->activerest3StartHour = $item->rest3StartHour;
        $this->activerest3StartMinute = $item->rest3StartMinute;
      } else {
        $this->oldrest3StartHour = $this->rest3StartHour;
        $this->oldrest3StartMinute = $this->rest3StartMinute;
        $this->activerest3StartHour = $this->rest3StartHour;
        $this->activerest3StartMinute = $this->rest3StartMinute;
      }

      if($this->rest3EndHour == $this->oldrest3EndHour && $this->rest3EndMinute == $this->oldrest3EndMinute){
        $this->rest3EndHour = $item->rest3EndHour;
        $this->rest3EndMinute = $item->rest3EndMinute;
        $this->oldrest3EndHour = $item->rest3EndHour;
        $this->oldrest3EndMinute = $item->rest3EndMinute;
        $this->activerest3EndHour = $item->rest3EndHour;
        $this->activerest3EndMinute = $item->rest3EndMinute;
      } else {
        $this->oldrest3EndHour = $this->rest3EndHour;
        $this->oldrest3EndMinute = $this->rest3EndMinute;
        $this->activerest3EndHour = $this->rest3EndHour;
        $this->activerest3EndMinute = $this->rest3EndMinute;
      }

        $this->calculationWorkTime();
    }

    public function checkLateEarlyLeave()
    {
      if($this->lateEarlyLeave == 1){
        $this->disabled = '';
      } else {
        $this->disabled = 'disabled';
      }
    }

    public function startHourChange()
    {
      $this->activestartHour = $this->startHour;
      $this->calculationWorkTime();
    }
    public function startMinuteChange()
    {
      $this->activestartMinute= $this->startMinute;
      $this->calculationWorkTime();
    }
    public function endHourChange()
    {
      $this->activeendHour = $this->endHour;
      $this->calculationWorkTime();
    }
    public function endMinuteChange()
    {
      $this->activeendMinute= $this->endMinute;
      $this->calculationWorkTime();
    }
    public function rest1StartHourChange()
    {
      $this->activerest1StartHour = $this->rest1StartHour;
      $this->calculationWorkTime();
    }
    public function rest1StartMinuteChange()
    {
      $this->activerest1StartMinute = $this->rest1StartMinute;
      $this->calculationWorkTime();
    }
    public function rest1EndHourChange()
    {
      $this->activerest1EndHour = $this->rest1EndHour;
      $this->calculationWorkTime();
    }
    public function rest1EndMinuteChange()
    {
      $this->activerest1EndMinute = $this->rest1EndMinute;
      $this->calculationWorkTime();
    }
    public function rest2StartHourChange()
    {
      $this->activerest2StartHour = $this->rest2StartHour;
      $this->calculationWorkTime();
    }
    public function rest2StartMinuteChange()
    {
      $this->activerest2StartMinute = $this->rest2StartMinute;
      $this->calculationWorkTime();
    }
    public function rest2EndHourChange()
    {
      $this->activerest2EndHour = $this->rest2EndHour;
      $this->calculationWorkTime();
    }
    public function rest2EndMinuteChange()
    {
      $this->activerest2EndMinute = $this->rest2EndMinute;
      $this->calculationWorkTime();
    }
    public function rest3StartHourChange()
    {
      $this->activerest3StartHour = $this->rest3StartHour;
      $this->calculationWorkTime();
    }
    public function rest3StartMinuteChange()
    {
      $this->activerest3StartMinute = $this->rest3StartMinute;
      $this->calculationWorkTime();
    }
    public function rest3EndHourChange()
    {
      $this->activerest3EndHour = $this->rest3EndHour;
      $this->calculationWorkTime();
    }
    public function rest3EndMinuteChange()
    {
      $this->activerest3EndMinute = $this->rest3EndMinute;
      $this->calculationWorkTime();
    }

    public function calculationWorkTime()
    {
      $this->calcWorkHour = 0;

      $ah = $this->activeendHour;
      $am = $this->activeendMinute;
      $bh = $this->activestartHour;
      $bm = $this->activestartMinute;

      if(is_numeric($ah) && is_numeric($am) && is_numeric($bh) && is_numeric($bm)){
        $this->calcWorkHour += $this->commonCalc($ah,$am,$bh,$bm);

        $ah = $this->activerest1EndHour;
        $am = $this->activerest1EndMinute;
        $bh = $this->activerest1StartHour;
        $bm = $this->activerest1StartMinute;
        if(is_numeric($ah) && is_numeric($am) && is_numeric($bh) && is_numeric($bm)){
          $this->calcWorkHour -= $this->commonCalc($ah,$am,$bh,$bm);
        }
        $ah = $this->activerest2EndHour;
        $am = $this->activerest2EndMinute;
        $bh = $this->activerest2StartHour;
        $bm = $this->activerest2StartMinute;
        if(is_numeric($ah) && is_numeric($am) && is_numeric($bh) && is_numeric($bm)){
          $this->calcWorkHour -= $this->commonCalc($ah,$am,$bh,$bm);
        }
        $ah = $this->activerest3EndHour;
        $am = $this->activerest3EndMinute;
        $bh = $this->activerest3StartHour;
        $bm = $this->activerest3StartMinute;
        if(is_numeric($ah) && is_numeric($am) && is_numeric($bh) && is_numeric($bm)){
          $this->calcWorkHour -= $this->commonCalc($ah,$am,$bh,$bm);
        }
      }
    }

    public function commonCalc($ah,$am,$bh,$bm)
    {
      return ($ah - $bh) * 3600 + ($am - $bm) * 60;
    }

    public function render()
    {
        return view('livewire.work-table');
    }


}
