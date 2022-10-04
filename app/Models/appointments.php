<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointments extends Model
{
    use HasFactory;

    protected $table ="appointments";

    protected $fillable = [
        'id',
        'email',
        'appointment_services',
        'appointment_category',
        'appointment_vaccine_category',
        'appointment_vaccine_type',
        'appointment_covid_dose',
        'appointment_concern',
        'appointment_information',
        'availableslot',
        'appointment_date',  
    ];
        
    

}
