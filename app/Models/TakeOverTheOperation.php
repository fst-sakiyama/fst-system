<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class TakeOverTheOperation extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_one';
  protected $primaryKey = 'takeOverId';
  protected $dates = ['timeLimit','wellKnown'];
  protected $guarded = array('takeOverId');

  public function project()
  {
    return $this->belongsTo('App\Models\MasterProject','projectId','projectId');
  }

  public function takeOverTheOperations()
  {
    return $this->hasMany('App\Models\AddTakeOverTheOperation','takeOverId','takeOverId');
  }

  public function files()
  {
    return $this->belongsToMany('App\Models\AddFilePost');
  }

  public function links()
  {
    return $this->belongsToMany('App\Models\ReferenceLink');
  }

/**
*  public function setWellKnownAttribute($value) {
*    dd($value);
*    if ($value !== null) {
*       return (new Carbon($value))->format('Y-m-d H:i');
*    }
*    return $value;
*  }
**/
}
