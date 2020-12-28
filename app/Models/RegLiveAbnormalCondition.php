<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegLiveAbnormalCondition extends Model
{
    use HasFactory;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'regLiveAbnormalConditionId';
    protected $guarded = array('regLiveAbnormalConditionId');

    public function regLivePlan()
    {
        return $this->belongsTo('App\Models\RegLivePlan','regLivePlanId','regLivePlanId');
    }

    public function regLiveAbnormalConditions()
    {
        return $this->hasMany('App\Models\RegLiveAbnormalCondition','regLivePlanId','regLivePlanId');
    }
}
