<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewShiftWorkLoad extends Model
{
    use HasFactory;

    protected $connection = 'mysql_two';
    protected $primaryKey = 'shiftId';
    protected $guarded = array('shiftId');

    public function shiftLoad()
    {
      return $this->belongsTo('App\Models\MasterShift','shiftId','shiftId');
    }
}
