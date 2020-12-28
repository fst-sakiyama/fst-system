<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegLiveResult extends Model
{
    use HasFactory;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'regLiveResultId';
    protected $guarded = array('regLiveResultId');

    public function regLiveWork()
    {
        return $this->belongsTo('App\Models\MasterLiveWork','liveWorkId','liveWorkId');
    }

    public function regLivePlan()
    {
        return $this->belongsTo('App\Models\RegLivePlan','regLivePlanId','regLivePlanId');
    }
}
