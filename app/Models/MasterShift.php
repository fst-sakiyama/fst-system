<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterShift extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection='mysql_two';
    protected $primaryKey = 'shiftId';
    protected $guarded = array('shiftId');

    public function shifts()
    {
        return $this->hasMany('App\Models\ShiftTable','shiftId','shiftId');
    }

    public function viewShifts()
    {
        return $this->hasMany('App\Models\ViewWorkTable','shiftId','shiftId');
    }

    public function shiftLoad()
    {
      return $this->hasOne('App\Models\ViewShiftWorkLoad','shiftId','shiftId');
    }

}
