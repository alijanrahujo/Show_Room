<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::orderBy('id', 'DESC')->get();
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("purchases.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'title' => 'required',
            'engine' => 'required',
            'chassis' => 'required',
            'model' => 'required',
            'color' => 'required',
            // 'status' => 'required',
        ]);
        $purchase = Purchase::create([
            'title' => $request->title,
            'engine' => $request->engine,
            'chassis' => $request->chassis,
            'model' => $request->model,
            'color' => $request->color,
        ]);

        $pending = $request->total - $request->paid;
        $purchase->payments()->create([
            'type' => 'purchase',
            'type_id' => $purchase->id,
            'total' => $request->total,
            'recived' => $request->paid,
            'status' => 0,
            'pending' => $pending,
        ]);

        return redirect()->route('purchases.index')->with('success', 'Purchase created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $purchase = Purchase::find($id);
        return view('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);
        return view('purchases.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request;
        Purchase::find($id)->update([
            'company_name' => $request->company_name,
            'dealer_name' => $request->dealer_name,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);

        $pending = $request->total - $request->paid;
        Payment::create([
            'type' => 'purchase',
            'type_id' => $id,
            'total' => $request->total,
            'recived' => $request->paid,
            'pending' => $pending,
        ]);
        return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return $id;
        Purchase::find($id)->delete();
        return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully');
    }
}
