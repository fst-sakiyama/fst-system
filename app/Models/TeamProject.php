<?php

namespace App\Models;

use App\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamProject extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AuthorObservable;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'teamProjectId';
    protected $guarded = array('teamProjectId');

    public function project()
    {
      return $this->belongsTo('App\Models\MasterProject','projectId','projectId');
    }
    public function workingTeam()
    {
      return $this->belongsTo('App\Models\MasterWorkingTeam','workingTeamId','workingTeamId');
    }
    public function filePosts()
    {
      return $this->hasMany('App\Models\FilePost','teamProjectId','teamProjectId');
    }
    public function addFilePosts()
    {
      return $this->hasMany('App\Models\AddFilePost','teamProjectId','teamProjectId');
    }
    public function TakeOverTheOperations()
    {
      return $this->hasMany('App\Models\TakeOverTheOperation','teamProjectId','teamProjectId');
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
