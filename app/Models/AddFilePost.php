<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddFilePost extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_one';
  protected $primaryKey = 'addFilePostId';
  protected $guarded = array('addFilePostId');

  public function operations()
  {
    return $this->belongsToMany('App\Models\TakeOverTheOperation')
  }

  public function addOperations()
  {
    return $this->belongsToMany('App\Models\AddTakeOverTheOperation')
  }
}
