<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = VehicleType::get();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'vehicles' => 'required',
            'power' => 'required',
            'amount' => 'required',
            'tax' => 'required',
            'sale' => 'required',
            'saletax' => 'required',
            'registration' => 'required',
        ]);


        VehicleType::create([
            'vehicle_type' => $request->vehicles,
            'horse_power' => $request->power,
            'reg_fee' => $request->registration,
            'purchase_price' => $request->amount,
            'purchase_tax' => $request->tax,
            'sale_price' => $request->sale,
            'sale_tax' => $request->saletax,
            'status' => 1,
        ]);

        return redirect('vehicles')->with('success', 'Vehicle created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = VehicleType::find($id);
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicle = VehicleType::find($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $this->validate($request, [
            'vehicles' => 'required',
            'power' => 'required',
            'amount' => 'required',
            'tax' => 'required',
            'registration' => 'required',
        ]);

        $vehicle = VehicleType::find($id)->update([
            'vehicle_type' => $request->vehicles,
            'horse_power' => $request->power,
            'reg_fee' => $request->registration,
            'purchase_price' => $request->amount,
            'purchase_tax' => $request->tax,
            'sale_price' => $request->sale,
            'sale_tax' => $request->saletax,
            'status' => $request->status,
        ]);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        VehicleType::find($id)->delete();

        return redirect('vehicles')->with('success', 'Vehicle deleted successfully');
    }
}
