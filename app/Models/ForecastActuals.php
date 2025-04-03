<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastActuals extends Model
{
    
    protected $fillable = [
        'date',
        'forecasted_wind',
        'actual_wind',
        'forecasted_solar',
        'actual_solar',
    ];
    
}
