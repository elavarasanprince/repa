<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestNews extends Model
{
    use HasFactory;

    protected $table = 'latest_news'; // Ensure correct table name

    protected $fillable = [
        'title',
        'link'
     
    ];

  
}

