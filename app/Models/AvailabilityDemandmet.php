<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailabilityDemandmet extends Model
{
    use HasFactory;

    protected $table = 'availability_demandmets'; // Ensure correct table name

    protected $fillable = [
        'date',
        'availability',
        'demand_met'
    ];

    protected $casts = [
        'date' => 'date',
        'availability' => 'float',
        'demand_met' => 'float'
    ];
}

