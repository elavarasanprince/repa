<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Circular extends Model
{
    //
    protected $table='circulars';
    protected $fillable = ['date','name', 'pdf','link', 'is_new','status'];

}
