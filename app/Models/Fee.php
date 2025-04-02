<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $table = 'fees';

    protected $fillable = [
        'membership_type',  // generator, oem, amc, etc.
        'sub_type',         // existing, other (for generator members)
        'min_capacity',     // Minimum MW capacity (for generators)
        'max_capacity',     // Maximum MW capacity (for generators)
        'amount',           // Fee amount
    ];
}
