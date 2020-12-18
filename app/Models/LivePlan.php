<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivePlan extends Model
{
    use HasFactory;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'livePlanId';
    protected $dates=['eventDay'];
    protected $guarded = array('livePlanId');

    protected $casts = [
        'startHour' => 'integer',
        'startMinute' => 'integer',
        'endHour' => 'integer',
        'endMinute' => 'integer',
    ];
}
