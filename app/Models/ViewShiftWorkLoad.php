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

    public function viewWorkTable1()
    {
      return $this->belongsTo('App\Models\ViewWorkTable1','shiftId','shiftId');
    }

    public function viewWorkTable2()
    {
      return $this->belongsTo('App\Models\ViewWorkTable2','shiftId','shiftId');
    }
}
