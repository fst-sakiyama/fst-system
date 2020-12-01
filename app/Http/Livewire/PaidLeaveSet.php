<?php

namespace App\Http\Livewire;

use App\Models\PaidLeave;
use Livewire\Component;
use Carbon\Carbon;

class PaidLeaveSet extends Component
{
    public $userId,$dispPaidleave,$name,$grantDate,$minDate;

    public function mount($item)
    {
        $userId = $item->id;
        $this->userId = $userId;
        $this->name = $item->name;
        $this->orgClass = '';
        $this->fmClass = 'd-none';
        $res = PaidLeave::where('userId',$userId)->first();
        if(isset($res)){
            $this->dispPaidleave = $res->dispPaidLeave;
            $grantDate = $res->grantDate;
            if($grantDate){
                $dt=new Carbon($grantDate);
                $grantDateLastDay=$dt->addYear();
                $today=Carbon::today();
                if($grantDateLastDay <= $today){
                    $res->grantDate = $grantDateLastDay;
                    $res->save();
                    $grantDate = $grantDateLastDay;
                }
                $this->grantDate = $grantDate->format('Y-m-d');
            }else{
                $this->grantDate = '';
            }
        }else{
            $this->dispPaidleave = 0;
            $this->grantDate = '';
        }
        $this->minDate = Carbon::today()->subYear()->addDay()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.paid-leave-set');
    }
}
