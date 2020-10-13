<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTable extends Model
{
    use HasFactory;

    protected $connection='mysql_two';
    protected $primaryKey='workTableId';
    protected $dates=['workDay'];
    protected $guarded=array('workTableId');

    public function shift()
    {
        return $this->belongTo('MasterShift','shiftId','shiftId');
    }

}
