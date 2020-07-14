<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TakeOverTheOperation extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_one';
  protected $primaryKey = 'takeOverId';
  protected $guarded = array('takeOverId');

  public function project()
  {
    return $this->belongsTo('App\Models\MasterProject','projectId','projectId');
  }
}
