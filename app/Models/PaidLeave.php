<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidLeave extends Model
{
    use HasFactory;

    protected $connection='mysql_two';
    protected $primaryKey='paidLeaveId';
    protected $dates=['grantDate'];
    protected $guarded=array('paidLeaveId');

    public function employee()
    {
      return $this->belongsTo('App\User','userId');
    }
}
