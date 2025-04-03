<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberReg extends Model
{
    use HasFactory;

    protected $table = 'member_reg';

    protected $fillable = [
        'member_name', 'father_name', 'designation', 'oftheCompany', 'address', 'pincode', 'district',
        'gstin', 'url', 'email', 'contactno', 'whatsappgrp', 'wcontact', 'menbertasma',
        'primary_name', 'designation_poc', 'contact_poc', 'email_poc', 'pwhatsappgrps', 'wscontact_poc',
        'secondary_name', 'secondary_designation', 'sdesignation', 'contact_spoc', 'spoc_email', 'secondarydta', 'wspcontact', 'business_activity', 'position_re'
    ];
    
     public function fees()
    {
        return $this->hasMany(Fees::class, 'member_id', 'id');
    }
    
    public function user()
{
    return $this->hasOne(Users::class, 'member_reg_id', 'id');
}

}

