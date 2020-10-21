<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FstSystemInformation extends Model
{
    use HasFactory;

    protected $connection = 'mysql_three';
    protected $table = 'fst_system_information';
    
}
