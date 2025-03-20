<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'pivot_model',
        'service_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'service_date' => 'date',
    ];
}
