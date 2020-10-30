<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterClient extends Model
{
    use SoftDeletes;
    use AuthorObservable;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'clientId';
    protected $guarded = array('clientId');

    public function getSlPrefixAttribute()
    {
      return str_pad($this->slack_prefix, 3, '0', STR_PAD_LEFT);
    }

    public function projects()
    {
      return $this->hasMany('App\Models\MasterProject','clientId','clientId');
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
