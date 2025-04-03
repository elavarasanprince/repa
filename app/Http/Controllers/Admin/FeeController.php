<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberReg;
use App\Models\Fees;
use App\Models\MemberFee;
use Illuminate\Support\Facades\Log;
use DB;


class FeeController extends Controller
{
    
    
public function store(Request $request)
{
// dd($request);
    $request->validate([
        'member_id' => 'required|exists:member_reg,id',
        'wind_energy' => 'nullable|string',
        'solar_energy' => 'nullable|string',
        'solar_energy_2' => 'nullable|string',
        'other_re' => 'nullable|string',
        'total' => 'nullable|string',
        'membership_type' => 'nullable|string',
        'generator_type' => 'nullable|string',
        'capacity_fee_existing' => 'nullable|exists:capacity,id',
        'capacity_fee_existing1' => 'nullable|exists:capacity,id',
        'capacity_fee_other' => 'nullable|exists:capacity,id',
        'other_members' => 'nullable|array',
    ]);

    // Get the first non-null value from the three capacity fields
    $fees_id = collect([
        $request->capacity_fee_existing,
        $request->capacity_fee_existing1,
        $request->capacity_fee_other
    ])->filter()->first(); // Remove null values and get the first available one

    // Store the data in Fees table
    Fees::create([
        'member_id' => $request->member_id,
        'wind_energy' => $request->wind_energy,
        'solar_energy' => $request->solar_energy,
        'solar_energy_2' => $request->solar_energy_2,
        'other_re' => $request->other_re,
        'total' => $request->total,
        'capacity_id' => $fees_id, // Store the first non-null value
        'other_members' => json_encode($request->other_members), // Store array as JSON
    ]);

    return redirect()->back()->with('success', 'Fees stored successfully!');
}

public function update(Request $request)
{
    $request->validate([
        'member_id' => 'required|exists:member_reg,id',
        'status' => 'required|in:active,pending,denied',
        'remark' => $request->status === 'denied' ? 'required|string|max:255' : 'nullable' // Validate remark if denied
    ]);

    $memberId = $request->member_id;
    $status = $request->status;
    $remark = $request->remark ?? null; // Set remark to null if not provided

    // Update `fees_repa.status` and store remark if denied
    DB::table('fees_repa')->where('member_id', $memberId)->update([
        'status' => $status,
        // Store remark only if denied
    ]);

    // Update `users.status`
    DB::table('users')
    ->where('member_reg_id', $memberId)
    ->update([
        'status' => $status,
        'remark' => $status === 'denied' ? $remark : null
    ]);

    return redirect()->back()->with('success', 'Status updated successfully!');
}


// public function update(Request $request)
//     {
       
//         $request->validate([
//             'member_id' => 'required|exists:users,id',
//             'status' => 'required|in:active,pending,denied',
//         ]);

//         $memberId = $request->member_id;
//         $status = $request->status;

//         // Update `fees_repa.status` based on `member_id`
//         DB::table('fees_repa')->where('member_id', $memberId)->update(['status' => $status]);

//         // Update `users.status` based on `member_id`
//         DB::table('users')->where('member_reg_id', $memberId)->update(['status' => $status]);

//         return redirect()->back()->with('success', 'Status updated successfully!');
//     }
// }

}
