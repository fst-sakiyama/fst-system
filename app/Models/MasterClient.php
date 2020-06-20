<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterClient extends Model
{
    use SoftDeletes;
    protected $connection = 'mysql_one';
    protected $primarykey = 'clientId';
    protected $guarded = array('clientId');

    public function projects()
    {
      return $this->hasMany('App\Models\MasterProject','clientId','clientId');
    }
}
