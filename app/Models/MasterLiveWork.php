<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLiveWork extends Model
{
    use HasFactory;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'liveWorkId';
    protected $guarded = array('liveWorkId');

    public function regLiveWorks()
    {
        return $this->hasMany('App\Models\RegLiveResult','liveWorkId','liveWorkId');
    }

    public function liveWorks()
    {
        return $this->hasMany('App\Models\LiveResult','liveWorkId','liveWorkId');
    }
}
