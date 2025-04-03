<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    
    protected $table ='fees_repa';

    protected $fillable = [
        'member_id', 'wind_energy', 'solar_energy', 'solar_energy_2', 
        'other_re', 'total', 'membership_type', 'generator_type', 
        'capacity_fee_existing', 'other_members','capacity_id'
    ];

    protected $casts = [
        'other_members' => 'array', // Store multiple checkboxes as JSON
    ];
    
    
     public function member()
    {
        return $this->belongsTo(MemberReg::class, 'member_id', 'id');
    }

    // Relation with Capacity
    public function capacity()
    {
        return $this->belongsTo(Capacity::class, 'capacity_id', 'id');
    }
}
