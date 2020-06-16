<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class master_project extends Model
{
  use SoftDeletes;

  protected $connection='mysql_one';
  protected $table = 'master_project';
  protected $guarded = array('projectId');
  protected $dates = ['deleted_at'];
  const CREATED_AT='createdAt';
  const UPDATED_AT='updatedAt';
}
