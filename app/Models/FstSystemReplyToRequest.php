<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class FstSystemReplyToRequest extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_three';
  protected $primaryKey = 'fstSystemReplyToRequestId';
  protected $guarded = array('fstSystemReplyToRequestId');

  public function request()
  {
    return $this->belongsTo('App\Models\FstSystemRequestPlate','fstSystemRequestPlateId','fstSystemRequestPlateId');
  }
}
