<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointments extends Model
{
    use HasFactory;

    protected $table ="appointments";

    protected $fillable = [
        'email',
        'appointment_service',
        'appointment_person',
        'appointment_vaccine_type',
        'availableslot',
        'appointment_date',
    ];
        
    

}
