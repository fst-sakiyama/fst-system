<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FstSystemReplyToRequest extends Model
{
  use SoftDeletes;
  use AuthorObservable;
  
  protected $connection = 'mysql_three';
  protected $primaryKey = 'fstSystemReplyToRequestId';
  protected $guarded = array('fstSystemReplyToRequestId');

  public function request()
  {
    return $this->belongsTo('App\Models\FstSystemRequestPlate','fstSystemRequestPlateId','fstSystemRequestPlateId');
  }

  public function created_by()
  {
      return $this->belongsTo('App\User', 'created_by');
  }

  public function updated_by()
  {
      return $this->belongsTo('App\User', 'updated_by');
  }

  public function deleted_by()
  {
      return $this->belongsTo('App\User', 'deleted_by');
  }

  public function restored_by()
  {
      return $this->belongsTo('App\User', 'restored_by');
  }

}
