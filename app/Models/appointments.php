<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\appointments;
use App\Models\User;
use Kyslik\ColumnSortable\Sortable;

class appointments extends Model
{
    use HasFactory;
    use Sortable;
    
    protected $table ="appointments";

    protected $fillable = [
        'id',
        'user_id',
        'user_contactnumber',
        'appointment_id',
        'appointment_date',
        'email',
        'appointment_services',
        'appointment_category',
        'appointment_vaccine_category',
        'appointment_vaccine_type',
        'appointment_covid_dose',
        'appointment_concern',
        'appointment_information',
        'appointment_message',
        'appointment_queue',
        'availableslot',
        'appointment_status',
        'appointment_date',
        'appointment_expiration_date', 
        'created_at', 

        // 'appointment_expired',
    ];

    public $sortable = [
        'id',
        'user_id',
        'user_contactnumber',
        'appointment_id',
        'appointment_date',
        'email',
        'appointment_services',
        'appointment_category',
        'appointment_vaccine_category',
        'appointment_vaccine_type',
        'appointment_covid_dose',
        'appointment_concern',
        'appointment_information',
        'appointment_message',
        'appointment_queue',
        'availableslot',
        'appointment_status',
        'appointment_date',
        'appointment_expiration_date', 
        'created_at'];

    public function users (){
        return $this->belongsTo(User::class);
    }

}
