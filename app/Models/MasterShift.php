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

}
