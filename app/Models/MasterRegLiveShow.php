<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRegLiveShow extends Model
{
    use HasFactory;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'regLiveId';
    protected $guarded = array('regLiveId');

    public function regLiveDetails()
    {
        return $this->hasMany('App\Models\RegLiveShowDetail','regLiveId','regLiveId');
    }
}
