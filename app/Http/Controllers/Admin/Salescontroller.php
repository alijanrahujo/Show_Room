<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;

class Salescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::orderBy('id', 'DESC')->get();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::pluck('customer_name', 'id');
        $purchases = Purchase::pluck('title', 'id');
        return view('sales.create', compact('customers', 'purchases'));
    }
    public function getPurchaseDetails($id)
    {
        return $id;
        // Fetch purchase details based on the provided ID
        $purchase = Purchase::find($id);

        // You can customize this response based on your needs
        return response()->json([
            'total' => $purchase->total,
            // Add more fields as needed
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'customer' => 'required',
            'father' => 'required',
            'phone' => 'required',
            'cnic' => 'required',
        ]);
        Sale::create([
            'customer_name' => $request->customer,
            'father_name' => $request->father,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        return redirect()->route('sales.index')->with('success', 'Sale  created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sale = Sale::find($id);
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sale = Sale::find($id);
        return view('sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Sale::find($id)->update([
            'company_name' => $request->company_name,
            'dealer_name' => $request->dealer_name,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        return redirect()->route('sales.index')->with('success', 'Sale updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return $id;
        Sale::find($id)->delete();
        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully');
    }
}
