<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForecastActuals;


class ForecastActualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forecasts = ForecastActuals::orderBy('date', 'desc')->get();
        return view('adminpanel.forecast.index', compact('forecasts'));
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
        'date' => 'required|date|unique:forecast_actuals,date',
        'forecasted_wind' => 'required|numeric',
        'actual_wind' => 'required|numeric',
        'forecasted_solar' => 'required|numeric',
        'actual_solar' => 'required|numeric',
    ]);

    ForecastActuals::create($request->all());

    return response()->json(['message' => 'Forecast data saved successfully.']);
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
    public function update(Request $request)
{
   
    $event = ForecastActuals::find($request->events_id);
    $event->date = $request->date;
    $event->forecasted_wind = $request->forecasted_wind;
    $event->forecasted_solar = $request->forecasted_solar;
    $event->actual_wind = $request->actual_wind;
    $event->actual_solar = $request->actual_solar;
    $event->save();

    return response()->json(['success' => 'Forecast & Actuals']);
}

public function destroy($id)
{
    $forecast = ForecastActuals::find($id);
    if ($forecast) {
        $forecast->delete();
        return response()->json(['message' => 'Forecast & Actuals deleted successfully!'], 200);
    }
    return response()->json(['message' => 'Forecast & Actuals found!'], 404);
}


    
  
}
