<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterWorkingTeam extends Model
{
    use HasFactory;

    protected $connection='mysql_one';
    protected $primaryKey='workingTeamId';
    protected $guarded=array('workingTeamId');

    public function workingTeams()
    {
      return $this->hasMany('App\Models\MasterProject','workingTeamId','workingTeamId');
    }
}
