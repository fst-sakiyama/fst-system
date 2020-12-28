<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegLivePlan extends Model
{
    use HasFactory;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'regLivePlanId';
    protected $dates=['eventDay'];
    protected $guarded = array('regLivePlanId');

    public function liveShow()
    {
        return $this->belongsTo('App\Models\RegLiveShowDetail','regLiveDetailId','regLiveDetailId');
    }

    public function regLiveResults()
    {
        return $this->hasMany('App\Models\RegLiveResult','regLivePlanId','regLivePlanId');
    }
}
