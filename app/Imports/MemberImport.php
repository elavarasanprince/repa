<?php

namespace App\Imports;

use App\Models\MemberReg;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Fees;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MemberImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2; // skip heading row
    }

    public function model(array $row)
    {
       
        $member = new MemberReg([
            'member_name'       => $row[1] ?? null,
            'father_name'       => $row[2] ?? null,
            'aadhar_number'     => $row[3] ?? null,
            'designation'       => $row[5] ?? null,
            'oftheCompany'      => $row[6] ?? null,
            'address'           => $row[7] ?? null,
            'pincode'           => $row[8] ?? null,
            'district'          => $row[9] ?? null,
            'gstin'             => $row[10] ?? null,
            'url'               => $row[11] ?? null,
            'email'             => $row[12] ?? null,
            'contactno'         => $row[13] ?? null,
            'whatsappgrp'       => $row[14] ?? null,
            'wcontact'          => $row[15] ?? null,
            'menbertasma'       => $row[16] ?? null,
            'primary_name'      => $row[17] ?? null,
            'designation_poc'   => $row[18] ?? null,
            'contact_poc'       => $row[19] ?? null,
            'email_poc'         => $row[20] ?? null,
            'pwhatsappgrps'     => $row[21] ?? null,
            'wscontact_poc'     => $row[22] ?? null,
            'secondary_name'    => $row[23] ?? null,
            'secondary_designation' => $row[24] ?? null,
            'contact_spoc'      => $row[25] ?? null,
            'spoc_email'        => $row[26] ?? null,
            'secondarydta'      => $row[27] ?? null,
            'wspcontact'        => $row[28] ?? null,
            'business_activity' => $row[29] ?? null,
            'position_re'       => $row[30] ?? null,
        ]);
    
        $member->save();
    
     
        User::create([
            'member_reg_id'  => $member->id,
            'name'           => $row[1] ?? null,
            'email'          => $row[12] ?? null,
            'contactno'      => $row[13] ?? null, 
            'password'       => bcrypt($row[13] ?? ''), 
            'status'         => 'active',
            'user_type'      => 'member',
        ]);
        
        $total = $row[35] ?? 0;


if ($total > 50) {
    $capacity_id = 5;
} elseif ($total > 25) {
    $capacity_id = 4;
} elseif ($total > 10) {
    $capacity_id = 3;
} elseif ($total > 5) {
    $capacity_id = 2;
} else {
    $capacity_id = 1;
}


Fees::create([
    'member_id'       => $member->id,
    'wind_energy'     => $row[31] ?? null,
    'solar_energy'    => $row[32] ?? null,
    'solar_energy_2'  => $row[33] ?? null,
    'other_re'        => $row[34] ?? null,
    'total'           => $total,
    'capacity_id'     => $capacity_id,
]);


        return $member;
    }
    
}
