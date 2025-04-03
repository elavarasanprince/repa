<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
          $generalCount = DB::table('fees_repa')->where('status', 'active')->whereBetween('capacity_id', [1, 10])->count();
    $oemCount = DB::table('fees_repa')->where('status', 'active')->where('capacity_id', 11)->count();
    $amcCount = DB::table('fees_repa')->where('status', 'active')->where('capacity_id', 12)->count();
    $vendorCount = DB::table('fees_repa')->where('status', 'active')->where('capacity_id', 14)->count();
    $otherServiceCount = DB::table('fees_repa')->where('status', 'active')->where('capacity_id', 13)->count();
    return view('adminpanel/home', compact('generalCount', 'oemCount', 'amcCount', 'vendorCount', 'otherServiceCount'));

       
    }
    
}
