<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberReg;
use App\Models\LatestNews;
use DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //  $members = MemberReg::all();
         
     $members = DB::table('member_reg')
    ->join('users', 'member_reg.id', '=', 'users.member_reg_id')
    ->select('member_reg.*', 'member_reg.id as memberid', 'users.*') 
    ->orderBy('member_reg.id', 'desc')
    ->get();


        return view('adminpanel/members/index',compact('members'));

    }

    public function latestnews()
    {
      //  $members = MemberReg::all();
         
        $latestnews = DB::table('latest_news')->get();


        return view('adminpanel/latestnews/index',compact('latestnews'));

    }

    public function lateststore(Request $request)
    {
       
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255|unique:latest_news,title',
            'link' => 'required|url|max:500',
        ]);

        // Store the data
        LatestNews::create([
            'title' => $request->title,
            'link' => $request->link,
        ]);

        return response()->json(['success' => 'Latest News saved successfully!']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


   public function latestupdate(Request $request)
    {
        
       
        $news = LatestNews::find($request->id);
        if ($news) {
            $news->title = $request->title;
            $news->link = $request->link;
            $news->save();

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }

    // Delete Latest News
    public function latestdelete(Request $request)
    {
        $news = LatestNews::find($request->id);
        if ($news) {
            $news->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $members = MemberReg::find($id);
    //     return view('adminpanel/members/show',compact('members'));
    // }
    
    public function show(string $id) 
    {
        // Find the Member
        $members = MemberReg::with(['fees.capacity','user'])->findOrFail($id);
    
        // Fetch member's capacity fees
        $member_fees = DB::table('fees_repa')
            ->join('member_reg', 'member_reg.id', '=', 'fees_repa.member_id')
            ->join('capacity', 'fees_repa.capacity_id', '=', 'capacity.id')
            ->select(
                'member_reg.id as member_id', 
                'fees_repa.id as fees_id', 
                'capacity.name as capacity_name', 
                'capacity.fees as capacity_fees'
            )
            ->where('member_reg.id', $id)
            ->first();
            //dd($member_fees);
    
        // Ensure we got a valid record
        $capacity_fees = @$member_fees->capacity_fees;

           
    
        // Get total paid amount (default to 0 if no payments exist)
        $total_paid = DB::table('payments')
            ->where('member_id', $id)
            ->sum('pay_amount'); 
    
        $total_paid = $total_paid !== null ? (float) $total_paid : 0; // Ensure it's numeric
    
        // Calculate balance correctly
        $balance_amount = $capacity_fees - $total_paid; // Show full fee if no payments

        $payments = DB::table('payments')
        ->where('member_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();
    
        return view('adminpanel.members.show', compact('members', 'member_fees', 'balance_amount','payments'));
    }
    
    
    
    public function paymentstore(Request $request)
{
   
    $request->validate([
        'members_id' => 'required|exists:member_reg,id',
        'pay_amount' => 'required|numeric|min:1',
        'pay_method' => 'required|string'
    ]);

    DB::table('payments')->insert([
        'member_id'   => $request->members_id,
        'pay_amount'  => $request->pay_amount,
        'pay_method'  => $request->pay_method,
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);

    return redirect()->back()->with('success', 'Payment recorded successfully.');
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
