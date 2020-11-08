<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectsFileClassification extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $connection = 'mysql_one';
    protected $primaryKey = 'projectsFileClassificationId';
    protected $guarded = array('projectsFileClassificationId');

    public function filePosts()
    {
      return $this->hasMany('App\Models\ProjectsFilePost','projectsFileClassificationId','projectsFileClassificationId');
    }
}
