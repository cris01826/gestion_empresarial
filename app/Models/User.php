<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = [
        'name','last_name','dni','address','phone','id_country','id_department','id_city'
    ];

    
}
