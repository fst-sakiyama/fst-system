<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsFilePost extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AuthorObservable;

    protected $connection = 'mysql_one';
    protected $primaryKey = 'projectsFilePostId';
    protected $guarded = array('projectsFilePostId');

    public function project()
    {
      return $this->belongsTo('App\Models\MasterProject','projectId','projectId');
    }

    public function fileClassification()
    {
      return $this->belongsTo('App\Models\ProjectsFileClassification','projectsFileClassificationId','projectsFileClassificationId');
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
