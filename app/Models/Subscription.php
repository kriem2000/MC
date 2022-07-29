<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        "patient_id",
        "offer_id",
        "start_data",
        "end_data",
        "consultation_number",
        "payment_id",
    ];
    protected $table = "Subscription";
}
