<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    use HasFactory;

    protected $table = 'capacity';

    protected $fillable = ['name', 'fees']; // Adjust fields as per your table

    // Fees Relationship (One Capacity can be linked with many Fees)
    public function fees()
    {
        return $this->hasMany(Fees::class, 'capacity_id', 'id');
    }
}
