<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterProject extends Model
{
  use SoftDeletes;
  use AuthorObservable;

  protected $connection = 'mysql_one';
  protected $primaryKey = 'projectId';
  protected $guarded = array('projectId');

  public function contractType()
  {
    return $this->belongsTo('App\Models\MasterContractType','contractTypeId','contractTypeId');
  }
  public function client()
  {
    return $this->belongsTo('App\Models\MasterClient','clientId','clientId');
  }
  public function teamProjects()
  {
    return $this->hasMany('App\Models\TeamProject','projectId','projectId');
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
