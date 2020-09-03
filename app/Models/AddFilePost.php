<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddFilePost extends Model
{
  use SoftDeletes;
  use AuthorObservable;

  protected $connection = 'mysql_one';
  protected $primaryKey = 'addFilePostId';
  protected $guarded = array('addFilePostId');

  public function project()
  {
    return $this->belongsTo('App\Models\MasterProject','projectId','projectId');
  }

  public function operations()
  {
    return $this->belongsToMany('App\Models\TakeOverTheOperation','take_over_file_post','addFilePostId','takeOverId');
  }

  public function addOperations()
  {
    return $this->belongsToMany('App\Models\AddTakeOverTheOperation','add_take_over_file_post','addFilePostId','addTakeOverId');
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
