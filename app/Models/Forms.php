<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    //
    protected $table='forms';
    protected $fillable = ['name', 'pdf','link', 'status'];

}
