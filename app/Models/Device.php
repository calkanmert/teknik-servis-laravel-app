<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'device_type_id',
        'device_brand_id',
        'model',
        'includes',
        'problems',
        'customer_note',
        'employee_note',
    ];
}
