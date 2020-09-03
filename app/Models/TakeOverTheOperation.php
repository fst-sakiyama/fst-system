<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class TakeOverTheOperation extends Model
{
  use SoftDeletes;
  use AuthorObservable;

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
    return $this->belongsToMany('App\Models\AddFilePost','take_over_file_post','takeOverId','addFilePostId');
  }

  public function links()
  {
    return $this->belongsToMany('App\Models\ReferenceLink','take_over_reference_link','takeOverId','linkId');
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
