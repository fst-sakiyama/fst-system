<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class master_client extends Model
{
    use SoftDeletes;

    protected $connection='mysql_one';
    protected $table = 'master_client';
    protected $guarded = array('clientId');
    protected $dates = ['deleted_at'];
    const CREATED_AT='createdAt';
    const UPDATED_AT='updatedAt';
}
