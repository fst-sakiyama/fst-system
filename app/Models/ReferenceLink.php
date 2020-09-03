<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReferenceLink extends Model
{
  use SoftDeletes;
  use AuthorObservable;

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
