<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterProject extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_one';
  protected $primaryKey = 'projectId';
  protected $guarded = array('projectId');

  public function filePosts()
  {
    return $this->hasMany('App\Models\FilePost','projectId','projectId');
  }

  public function addFilePosts()
  {
    return $this->hasMany('App\Models\AddFilePost','projectId','projectId');
  }

  public function TakeOverTheOperations()
  {
    return $this->hasMany('App\Models\TakeOverTheOperation','projectId','projectId');
  }

  public function contractType()
  {
    return $this->belongsTo('App\Models\MasterContractType','contractTypeId','contractTypeId');
  }

  public function client()
  {
    return $this->belongsTo('App\Models\MasterClient','clientId','clientId');
  }
}
