<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;


    protected $fillable = [
        "patient_id",
        "doctor_id",
        "speciality_id",
    ];

    public function messages() {
        return $this->hasMany(Message::class, "consultation_id");
    }

    public function patient() {
        return $this->belongsTo(User::class, "patient_id");
    }

}
