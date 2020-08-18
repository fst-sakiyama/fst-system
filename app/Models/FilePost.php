<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilePost extends Model
{
  use SoftDeletes;
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

}
