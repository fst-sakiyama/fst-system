<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkLoad extends Model
{
    use HasFactory;

    protected $connection='mysql_two';
    protected $primaryKey='workLoadId';
    protected $guarded=array('workLoadId');

    public function shiftTable()
    {
      return $this->belongTo('App\Models\ShiftTable','shiftTableId','shiftTableId');
    }

    public function teamProject()
    {
      return $this->belongTo('App\Models\TeamProject','teamProjectId','teamProjectId');
    }
}
