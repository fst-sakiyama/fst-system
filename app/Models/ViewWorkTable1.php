<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewWorkTable1 extends Model
{
    use HasFactory;
    protected $table = 'view_work_table1';
    protected $connection = 'mysql_two';
    protected $primaryKey = 'shiftTableId';
    protected $guarded = array('shiftTableId');

    public function shift()
    {
      return $this->belongsTo('App\Models\MasterShift','shiftId','shiftId');
    }

    public function employee()
    {
      return $this->belongsTo('App\User','id','userId');
    }

    public function viewShiftWorkLoad()
    {
      return $this->hasOne('App\Models\ViewShiftWorkLoad','shiftId','shiftId');
    }

    public function viewTableWorkLoad()
    {
      return $this->hasOne('App\Models\ViewTableWorkLoad','shiftTableId','shiftTableId');
    }
}
