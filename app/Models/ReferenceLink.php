<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceLink extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_one';
  protected $primaryKey = 'linkId';
  protected $guarded = array('linkId');

  public function operations()
  {
    return $this->belongsToMany('App\Models\TakeOverTheOperation')
  }

  public function addOperations()
  {
    return $this->belongsToMany('App\Models\AddTakeOverTheOperation')
  }
}
