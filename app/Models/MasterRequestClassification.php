<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterRequestClassification extends Model
{
  use SoftDeletes;
  use AuthorObservable;

  protected $connection = 'mysql_three';
  protected $primaryKey = 'requestClassificationId';
  protected $guarded = array('requestClassificationId');

  public function requestPlates()
  {
    return $this->hasMany('App\Models\FstSystemRequestPlate','requestClassificationId','requestClassificationId');
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
