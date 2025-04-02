<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergySource extends Model
{
    use HasFactory;

    protected $table = 'energysources';

    protected $fillable = [
        'date', 'central_grid', 'bio_co_gen', 'solar', 'wind', 
        'gas_naptha', 'hydro', 'thermal'
    ];
}

