<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialityUser extends Model
{
    use HasFactory;
    protected $fillable = [
        "speciality_id",
        "user_id",
    ];
    
protected $table = "specialities_users";
    


}
