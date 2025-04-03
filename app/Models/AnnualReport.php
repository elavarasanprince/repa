<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnualReport extends Model
{
    //
    protected $table='annualreport';
    protected $fillable = ['name', 'pdf','link', 'status'];

}
