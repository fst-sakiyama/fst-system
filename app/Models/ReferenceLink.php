<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReferenceLink extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_one';
  protected $primaryKey = 'linkId';
  protected $guarded = array('linkId');

  public function operations()
  {
    return $this->belongsToMany('App\Models\TakeOverTheOperation','take_over_reference_link','linkId','takeOverId');
  }

  public function addOperations()
  {
    return $this->belongsToMany('App\Models\AddTakeOverTheOperation','add_take_over_reference_link','linkId','addTakeOverId');
  }
}
