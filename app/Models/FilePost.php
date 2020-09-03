<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilePost extends Model
{
  use SoftDeletes;
  use AuthorObservable;

  protected $connection = 'mysql_one';
  protected $primaryKey = 'filePostId';
  protected $guarded = array('filePostId');

  public function project()
  {
    return $this->belongsTo('App\Models\MasterProject','projectId','projectId');
  }

  public function fileClassification()
  {
    return $this->belongsTo('App\Models\MasterFileClassification','fileClassificationId','fileClassificationId');
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
