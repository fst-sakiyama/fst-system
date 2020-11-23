<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewWorkTable extends Model
{
    use HasFactory;

    protected $connection = 'mysql_two';
    protected $primaryKey = 'shiftTableId';
    protected $guarded = array('shiftTableId');

    public function workLoads()
    {
      return $this->hasMany('App\Models\WorkLoad','shiftTableId','shiftTableId');
    }

    public function employee()
    {
      return $this->belongsTo('App\User','userId','id');
    }

    public function shift()
    {
      return $this->belongsTo('App\Models\MasterShift','shiftId','shiftId');
    }

}
