<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterRole extends Model
{
    protected $connection='mysql_two';
    protected $primaryKey='role';
    protected $guarded=array('role');

    public function employees()
    {
      return $this->hasMany('App\User','role','role');
    }
}
