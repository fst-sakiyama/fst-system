<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewTableWorkLoad extends Model
{
    use HasFactory;

    protected $connection = 'mysql_two';
    protected $primaryKey = 'shiftTableId';
    protected $guarded = array('shiftTableId');

    public function viewWorkTable1()
    {
      return $this->belongsTo('App\Models\ViewWorkTable1','shiftTableId','shiftTableId');
    }
}
