<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberReg;
use App\Models\Event;
use App\Mail\MemberRegistrationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ForecastActuals;
use App\Models\EnergySource;
use App\Models\Circular;
use App\Models\Forms;
use App\Models\Comments;
use App\Models\Fees;
use App\Models\LatestNews;

use App\Models\AnnualReport;
use DB;
use App\Models\AvailabilityDemandmet;


class MemberRegController extends Controller
{
   public function store(Request $request)
{
    // $validated = $request->validate([
    //     'member_name' => 'required|string|max:255',
    //     'email' => 'required|email|unique:member_reg,email',
    //     'aadhar_number' => 'required|digits:12|unique:member_reg,aadhar_number',
       
       
    // ]);

    try {
        // Create Member Record
        $member = MemberReg::create($request->all());

        User::create([
            'email' => $member->email,
            'member_reg_id' => $member->id, 
            'password' => Hash::make($request->contactno),
            'user_type'=>'member',
            'name'=>$member->member_name,
            'status'=> 'pending',
            
            

        ]);
        Mail::to($member->email)->send(new MemberRegistrationMail($member));

        // Log email success

        
        \Log::info('Email sent successfully to: ' . $member->email);
        
    } catch (\Exception $e) {
        // Log email failure
        \Log::error('Email sending failed: ' . $e->getMessage());
    }

    session()->flash('success', 'Thank you for registering! We have received your application, and our executive will contact you shortly.');
    
    return redirect()->back()->withInput();
}
    
    //  public function show($id)
    // {
       
    //     $event = Event::find($id);

    //     // Return the event details view and pass the event data
    //     return view('front.event_details',compact('event'));
    // }
    
    public function show($id)
{
    // Fetch event details
    $event = Event::find($id);

    if (!$event) {
        return abort(404, 'Event not found');
    }

    // Decode JSON event images
    $eventImages = json_decode($event->event_images, true) ?? [];

    // Ensure paths are formatted correctly
    $eventImages = array_map(fn($image) => str_replace('\\/', '/', $image), $eventImages);

    return view('front.event_details', compact('event', 'eventImages'));
}



public function membershow($id)
{
        if (!auth()->check()) {
        return redirect()->route('MemberLogin')->with('error', 'Please log in to access this page.');
    }
    $profile = MemberReg::findOrFail($id);
    return view('front.memberdetails', compact('profile'));
}

public function forcastvsactuals()
{
    if (!auth()->check()) {
        session(['redirect_url' => url()->current()]);
        return redirect()->route('MemberLogin')->with('error', 'Please log in to access this page.');
    }

    // Fetch the latest 10 days of forecast vs actuals data
    $forecasts = ForecastActuals::orderBy('date', 'desc')->take(10)->get();

    // Get from and to dates
    $toDate = $forecasts->first()->date ?? now()->toDateString(); 
    $fromDate = $forecasts->last()->date ?? now()->subDays(9)->toDateString(); 

    // Convert dates to dd-mm-yyyy format
    $toDateFormatted = \Carbon\Carbon::parse($toDate)->format('d-m-Y');
    $fromDateFormatted = \Carbon\Carbon::parse($fromDate)->format('d-m-Y');

    return view('front.forcastvsactuals', compact('forecasts', 'fromDateFormatted', 'toDateFormatted'));
}


public function updateProfile(Request $request, $id)
{
    // Validate incoming request data
   

    // Find profile by ID and update
    $profile = MemberReg::findOrFail($id);
    $profile->update([
        'member_name'   => $request->member_name,
        'father_name'   => $request->father_name,
        'aadhar_number' => $request->aadhar_number,
        'designation'   => $request->designation,
        'oftheCompany'  => $request->oftheCompany,
        'address'       => $request->address,
        'pincode'       => $request->pincode,
        'district'      => $request->district,
        'gstin'         => $request->gstin,
        'url'           => $request->url,
        'email'         => $request->email,
        'contactno'     => $request->contactno,
        'wcontact'   => $request->wcontact,
        'whatsappgrp'      => $request->whatsappgrp == 'Yes' ? $request->whatsappgrp : 'No',
       
        'menbertasma'      => $request->menbertasma == 'Yes' ? $request->menbertasma : 'No',
        'primary_name' => $request->primary_name,
        'designation_poc' => $request->designation_poc,
        'contact_poc' => $request->contact_poc,
        'email_poc' => $request->email_poc,
        'wscontact_poc' => $request->wscontact_poc,
        'pwhatsappgrps' => $request->pwhatsappgrps === 'Yes' ? $request->pwhatsappgrps : 'No',

        'secondary_name' => $request->secondary_name,
        'secondary_designation' => $request->secondary_designation,
        'contact_spoc' => $request->contact_spoc,
        'spoc_email' => $request->spoc_email,
        'wspcontact' => $request->wspcontact,
        'secondarydta' => $request->secondarydta === 'Yes' ? $request->secondarydta : 'No',
         'business_activity' => $request->business_activity,
          'position_re' => $request->position_re
        
        
        
        
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully!');
}


public function showprofile()
{
    if (!auth()->check()) {
        return redirect()->route('MemberLogin')->with('error', 'Please log in to access this page.');
    }

    // Fetch the logged-in user
    $user = auth()->user(); // No need for a separate query

    // Fetch the member profile using the member_reg_id
    $profile = MemberReg::where('id', $user->member_reg_id)->first(); // No need for `()` as it's a property

    // If the profile does not exist, redirect
    if (!$profile) {
        return redirect()->route('MemberLogin')->with('error', 'Profile not found.');
    }

    return view('front.profile', compact('profile'));
}


public function welcome() 
{
    $energySources = EnergySource::latest('date')->first();
    $latestNews = LatestNews::get();
    

    // Define categories
    $categories = ['THERMAL', 'HYDRO', 'GAS NAPTHA', 'WIND', 'SOLAR', 'BIO & CO-GEN', 'CENTRAL GRID'];

    // Fetch values or default to 0 if null
    $values = $energySources ? [
        $energySources->thermal ?? 0,
        $energySources->hydro ?? 0,
        $energySources->gas_naptha ?? 0,
        $energySources->wind ?? 0,
        $energySources->solar ?? 0,
        $energySources->bio_co_gen ?? 0,
        $energySources->central_grid ?? 0
    ] : [0, 0, 0, 0, 0, 0, 0];

    // Sort data in ascending order
    array_multisort($values, $categories);

    // Pass sorted data to the view
    $chartData = [
        'categories' => $categories,
        'values' => $values
    ];

    $availabilityDemandmet = AvailabilityDemandmet::latest('date')->first();

    $Events = Event::get();
    //$Circular = Circular::get();
     $Circular = DB::table('circulars')
    ->orderByDesc(DB::raw('CASE WHEN is_new = 1 THEN created_at ELSE NULL END')) 
    ->orderByDesc('date')->where('status','Active') 
    ->limit(10) 
    ->get();
      $Forms = Forms::orderByDesc('date')->where('status','Active')
    ->limit(10) 
    ->get();
      
       $Comments = Comments::orderByDesc('date')->where('status','Active')
    ->limit(10) 
    ->get();
        $AnnualReport = AnnualReport::orderByDesc('date')->where('status','Active')
    ->limit(10) 
    ->get();

    // Fetch forecast vs actuals data
    $forecastData = ForecastActuals::latest('date')->first();
    
    $memberscount=User::where('status','active')->where('user_type','member')->count();
    
//$totalre=Fees::where('status','active')->sum('total');



$solarenergy1=Fees::where('status','active')->sum('solar_energy');
$solarenergy2=Fees::where('status','active')->sum('solar_energy_2');
$totalsolar = $solarenergy1+$solarenergy2;

$wind_energy=Fees::where('status','active')->sum('wind_energy');

$totalre=$totalsolar+$wind_energy;

    return view('welcome', compact('forecastData','latestNews', 'chartData','energySources','availabilityDemandmet','Events','Forms','Circular','Comments','AnnualReport','memberscount','totalre','wind_energy','totalsolar'));
}
public function showenergy(Request $request)
{
    if (!auth()->check()) {
        session(['redirect_url' => url()->current()]);
        return redirect()->route('MemberLogin')->with('error', 'Please log in to access this page.');
    }

    // Fetch the latest 10 days of data
    $latestTenDays = EnergySource::orderBy('date', 'desc')->take(10)->get();
    $availabilityDemandmet = AvailabilityDemandmet::orderBy('date', 'desc')->take(10)->get();

    // Get the from and to dates for the latest 10 days
    $toDate = $latestTenDays->first()->date ?? now()->toDateString(); 
    $fromDate = $latestTenDays->last()->date ?? now()->subDays(9)->toDateString(); 

    // Convert dates to dd-mm-yyyy format
    $toDateFormatted = \Carbon\Carbon::parse($toDate)->format('d-m-Y');
    $fromDateFormatted = \Carbon\Carbon::parse($fromDate)->format('d-m-Y');

    return view('front.engery_source', compact('latestTenDays', 'availabilityDemandmet', 'fromDateFormatted', 'toDateFormatted'));
}


// public function memberlist()
// {
//     $member = MemberReg::with(['fees.capacity', 'user'])
//         ->whereHas('fees', function ($query) {
//         $query->whereBetween('capacity_id', [1, 10]);
//     })
       
//         ->get();
//     return view('front.memberlist', compact('member'));
   
    
// }

public function memberlist()
{
    $routeName = request()->route()->getName(); // Get current route name
    
    $memberQuery = MemberReg::with(['fees.capacity', 'user'])
        ->whereHas('user', function ($query) {
            $query->where('status', 'active');
        });

    // Initialize heading
    $pageHeading = '';

    if ($routeName === 'memberlist') {
        $memberQuery->whereHas('fees', function ($query) {
            $query->whereBetween('capacity_id', [1, 10]);
        });
        $pageHeading = 'Members';
    } elseif ($routeName === 'oems') {
        $memberQuery->whereHas('fees', function ($query) {
            $query->where('capacity_id', 11);
        });
        $pageHeading = 'OEMS';
    } elseif ($routeName === 'amc_service') {
        $memberQuery->whereHas('fees', function ($query) {
            $query->where('capacity_id', 12);
        });
        $pageHeading = 'AMC Service Providers';
    } elseif ($routeName === 'vendors') {
        $memberQuery->whereHas('fees', function ($query) {
            $query->where('capacity_id', 14);
        }); 
        $pageHeading = 'Vendors';
    } elseif ($routeName === 'otherservice') {
        $memberQuery->whereHas('fees', function ($query) {
            $query->where('capacity_id', 13);
        });
        $pageHeading = 'Other Services Providers';
    }

    $member = $memberQuery->get();

    return view('front.memberlist', compact('member', 'pageHeading'));
}




}

