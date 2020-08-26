<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FstSystemRequestPlate extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_three';
  protected $primaryKey = 'fstSystemRequestPlateId';
  protected $guarded = array('fstSystemRequestPlateId');
  protected $dates = ['doComp'];

  public function requestClassification()
  {
    return $this->belongsTo('App\Models\MasterRequestClassification','requestClassificationId','requestClassificationId');
  }

  public function replyToRequests()
  {
    return $this->hasMany('App\Models\FstSystemReplyToRequest','fstSystemRequestPlateId','fstSystemRequestPlateId');
  }
}
