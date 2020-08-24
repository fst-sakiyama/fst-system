<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterRequestClassification extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_three';
  protected $primaryKey = 'requestClassificationId';
  protected $guarded = array('requestClassificationId');

  public function requestPlates()
  {
    return $this->hasMany('App\Models\FstSystemRequestPlate','requestClassificationId','requestClassificationId');
  }
}
