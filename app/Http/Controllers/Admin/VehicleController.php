<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class VehicleController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();

        return view('admins.vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle = new Vehicle();

        return view('admins.vehicles.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_type'     => 'required|string|max:150',
            'vehicle_color'     => 'required|string|max:100',
            'vehicle_registration'    => ['required', 'string','max:150', 'unique:vehicle'],
            'vehicle_rate'     => 'required|string|max:100'
        ]);

        $vehicle = Vehicle::create([
            'vehicle_type'           => $request->vehicle_type,
            'vehicle_color'           => $request->vehicle_color,
            'vehicle_registration'        => $request->vehicle_registration,
            'vehicle_rate'        => $request->vehicle_rate,
        ]);
        

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        return view('admins.vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'vehicle_type'           => $request->vehicle_type,
            'vehicle_color'           => $request->vehicle_color,
            'vehicle_registration'        => $request->vehicle_registration,
            'vehicle_rate'        => $request->vehicle_rate,
        ];

        $vehicle = Vehicle::where('vehicle_id', $id)->update($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted!');
    }
}
