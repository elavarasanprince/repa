<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'venue', 'description', 'cover_image', 'event_images'];

    protected $casts = [
        'event_images' => 'array', // Convert JSON to array
    ];
}
