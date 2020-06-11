<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_client extends Model
{
    //
    protected $table = 'master_client';
    protected $guarded = array('clientId');
}
