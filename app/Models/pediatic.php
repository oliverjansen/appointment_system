<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pediatic extends Model
{
    use HasFactory;

    protected $table ="checkup";

    protected $fillable = [
        'id',
        'pediatic_status',
        'checkup_status',
    ];
}
