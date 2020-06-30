<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FstSystemProgressDetail extends Model
{
  protected $connection = 'mysql_three';
  protected $primaryKey = 'fstSystemProgressDetailId';
  protected $guarded = array('fstSystemProgressDetailId');

  public function progress()
  {
    return $this->belongsTo('App\Models\FstSystemProgress','fstSystemProgressId','fstSystemProgressId');
  }
}
