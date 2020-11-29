<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShiftTable extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection='mysql_two';
    protected $primaryKey='shiftTableId';
    protected $dates=['workDay'];
    protected $guarded=array('shiftTableId');

    protected $fillable = [
        'workDay', 'userId','shiftId'
    ];

    public function employee()
    {
      return $this->belongsTo('App\User','userId');
    }

    public function shift()
    {
      return $this->belongsTo('App\Models\MasterShift','shiftId','shiftId');
    }

    public function workTable()
    {
      return $this->hasOne('App\Models\WorkTable','shiftTableId','shiftTableId');
    }

    public function workLoad()
    {
      return $this->hasOne('App\Models\WorkLoad','shiftTableId','shiftTableId');
    }
}
