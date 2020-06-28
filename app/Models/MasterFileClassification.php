<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterFileClassification extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_one';
  protected $primaryKey = 'fileClassificationId';
  protected $guarded = array('fileClassificationId');

  public function filePosts()
  {
    return $this->hasMany('App\Models\FilePost','fileClassificationId','fileClassificationId');
  }
}
