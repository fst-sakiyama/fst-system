<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveResult extends Model
{
    use HasFactory;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'liveResultId';
    protected $guarded = array('liveResultId');

    public function liveWork()
    {
        return $this->belongsTo('App\Models\MasterLiveWork','liveWorkId','liveWorkId');
    }

    public function livePlan()
    {
        return $this->belongsTo('App\Models\LivePlan','livePlanId','livePlanId');
    }
}
