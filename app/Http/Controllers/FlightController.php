<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;



class FlightController extends Controller
{
    /**
     * Display listing of the flights.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = Flight::all();
        // return view('flights.index', compact('flights'));
        return view('flights.index', ['flights'=>$flights]);
    }

    /**
     * Show the form for creating a new flight.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flights.create'); 
    }

    /**
     * Store the newly created flight in the storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'airline' => 'required|string|max:255',
        ]);

        Flight::create($request->all());

        return redirect()->route('flight.index')->with('success', 'Flight was created successfully.');
    }

    /**
     * Display the specified flight.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        return view('flights.show', compact('flight'));
    }

    /**
     * Show the form for editing the specified flight.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        return view('flights.edit',  compact('flight'));
    }

    /**
     * Update the specified flight in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function updateFlight(Request $request, Flight $flight)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'airline' => 'required|string|max:255',
        ]);

        $flight->update($request->all());

        return redirect()->route('flight.index')->with('success', 'Flight updated successfully.');
    }

    /**
     * Remove the specified flight from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();

        return redirect()->route('flight.index')->with('success', 'Flight deleted successfully.');
    }
}

