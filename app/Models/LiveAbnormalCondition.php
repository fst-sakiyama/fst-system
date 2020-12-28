<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveAbnormalCondition extends Model
{
    use HasFactory;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'liveAbnormalConditionId';
    protected $guarded = array('liveAbnormalConditionId');

    public function livePlan()
    {
        return $this->belongsTo('App\Models\LivePlan','livePlanId','livePlanId');
    }
}
