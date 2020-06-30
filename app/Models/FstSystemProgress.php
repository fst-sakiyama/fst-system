<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FstSystemProgress extends Model
{
    use SoftDeletes;
    protected $connection = 'mysql_three';
    protected $table = 'fst_system_progress';
    protected $primaryKey = 'fstSystemProgressId';
    protected $guarded = array('fstSystemProgressId');

    public function progressDetails()
    {
      return $this->hasMany('App\Models\FstSystemProgressDetail','fstSystemProgressId','fstSystemProgressId');
    }
}
