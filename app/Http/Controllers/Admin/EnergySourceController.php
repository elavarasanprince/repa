<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnergySource;
use App\Models\AvailabilityDemandmet;
use Illuminate\Support\Facades\Log;


class EnergySourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $EnergySource = EnergySource::orderBy('date', 'desc')->get();
        return view('adminpanel.energysource.index', compact('EnergySource'));
    }

    public function availability()
    {
        $AvailabilityDemandmet = AvailabilityDemandmet::orderBy('date', 'desc')->get();
        return view('adminpanel.availability.index', compact('AvailabilityDemandmet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|unique:energysources,date',
            'central_grid' => 'required|numeric',
            'bio_co_gen' => 'required|numeric',
            'solar' => 'required|numeric',
            'wind' => 'required|numeric',
            'gas_naptha' => 'required|numeric',
            'hydro' => 'required|numeric',
            'thermal' => 'required|numeric',
        ]);
    
        EnergySource::create($request->all());
    
        return response()->json(['success' => 'Energy Source data saved successfully.'], 200);
    }
    

    public function availabilitystore(Request $request)
    {
        // Validate input data
        $request->validate([
            'date' => 'required|date|unique:availability_demandmets,date',

            'availability' => 'required|numeric|min:0',
            'demand_met' => 'required|numeric|min:0'
        ]);

        // Insert data into the database
        AvailabilityDemandmet::create([
            'date' => $request->date,
            'availability' => $request->availability,
            'demand_met' => $request->demand_met,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Availability & Demand Met data saved successfully!');
    }

public function updateAvailability(Request $request, $id)
{
    $availability = AvailabilityDemandmet::findOrFail($id);
    $availability->update([
        'date' => $request->date,
        'availability' => $request->availability,
        'demand_met' => $request->demand_met
    ]);

    return response()->json(['status' => 'success']);
}

public function deleteAvailability($id)
{
    AvailabilityDemandmet::destroy($id);
    return response()->json(['status' => 'success']);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, EnergySource $energysource)
{
    \Log::info('Update Request:', $request->all()); // Debugging

    $request->validate([
        'date' => 'required|date',
        'central_grid' => 'required|numeric',
        'bio_co_gen' => 'required|numeric',
        'solar' => 'required|numeric',
        'wind' => 'required|numeric',
        'gas_naptha' => 'required|numeric',
        'hydro' => 'required|numeric',
        'thermal' => 'required|numeric',
    ]);

    $energysource->update($request->all());

    return redirect()->back()->with('success', 'Energy Source Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $energySource = EnergySource::find($id);
    
        if (!$energySource) {
            return redirect()->back()->withErrors('Energy source not found.');
        }
    
        $energySource->delete();
    
        return redirect()->back()->with('success', 'Energy Source Deleted Successfully');
    }
    
}
