<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterContractType extends Model
{
  use SoftDeletes;
  protected $connection = 'mysql_one';
  protected $primarykey = 'contractTypeId';
  protected $guarded = array('contractTypeId');

  public function projects()
  {
    return $this->hasMany('App\Models\MasterProject','contractTypeId','contractTypeId');
  }
}
