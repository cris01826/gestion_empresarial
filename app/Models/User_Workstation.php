<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Workstation extends Model
{
    
    protected $table = "workstations";
    protected $fillable = [
        'name_workstation'
    ];
}
