<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = "cities";
    protected $fillable = [
        'name_city','id_department'
    ];

}
