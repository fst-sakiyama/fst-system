<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTable extends Model
{
    use HasFactory;
    use AuthorObservable;
    
    protected $connection='mysql_two';
    protected $primaryKey='workTableId';
    protected $dates=['workDay'];
    protected $guarded=array('workTableId');

    public function shift()
    {
        return $this->belongTo('MasterShift','shiftId','shiftId');
    }

    public function created_by()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function updated_by()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public function deleted_by()
    {
        return $this->belongsTo('App\User', 'deleted_by');
    }

    public function restored_by()
    {
        return $this->belongsTo('App\User', 'restored_by');
    }
}
