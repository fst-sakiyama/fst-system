<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegLiveShowDetail extends Model
{
    use HasFactory;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'regLiveDetailId';
    protected $guarded = array('regLiveDetailId');

    public function livePlan()
    {
        return $this->hasMany('App\Models\RegLivePlan','regLiveDetailId','regLiveDetailId');
    }

    public function regLive()
    {
        return $this->belongsTo('App\Models\MasterRegLiveShow','regLiveId','regLiveId');
    }
}
