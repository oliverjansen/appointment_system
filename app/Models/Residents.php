<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residents extends Model
{
    use HasFactory; 

    protected $table ="residents";

    protected $fillable = [
        'resident_firstname',
        'resident_middlename',
        'resident_lastname',
        'resident_gender',
        'resident_birthdate',
        'resident_age',
        'resident_address',
        'resident_barangay',
    ];
}
