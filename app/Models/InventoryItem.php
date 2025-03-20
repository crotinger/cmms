<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'part_number',
        'description',
        'quantity',
        'unit_cost',
    ];

    protected $casts = [
        'unit_cost' => 'decimal:2',
    ];
}
