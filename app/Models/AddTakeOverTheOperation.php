<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddTakeOverTheOperation extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_one';
  protected $primaryKey = 'addTakeOverId';
  protected $guarded = array('addTakeOverId');

  public function takeOverTheOperation()
  {
    return $this->belongsTo('App\Models\TakeOverTheOperation','takeOverId','takeOverId');
  }

  public function files()
  {
    return $this->belongsToMany('App\Models\AddFilePost','add_take_over_file_post','addTakeOverId','addFilePostId');
  }

  public function links()
  {
    return $this->belongsToMany('App\Models\ReferenceLink','add_take_over_reference_link','addTakeOverId','linkId');
  }

}
