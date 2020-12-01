<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiveMonitaringPlan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'liveMonitaringPlanId';
    protected $dates=['eventDay'];
    protected $guarded = array('liveMonitaringPlanId');
}
