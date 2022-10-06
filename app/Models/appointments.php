<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\appointments;
use App\Models\User;

class appointments extends Model
{
    use HasFactory;

    protected $table ="appointments";

    protected $fillable = [
        'id',
        'user_id',
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
        
    public function users (){
        return $this->belongsTo(User::class);
    }

}
