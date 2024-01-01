<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaleInvoice;
use Illuminate\Http\Request;

class SaleInvoicecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = SaleInvoice::orderBy('id', 'DESC')->get();
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("invoices.create");
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
        SaleInvoice::create([
            'title' => $request->title,
            'engine' => $request->engine,
            'chassis' => $request->chassis,
            'model' => $request->model,
            'color' => $request->color,
        ]);
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $invoice = SaleInvoice::find($id);
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice = SaleInvoice::find($id);
        return view('invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        SaleInvoice::find($id)->update([
            'company_name' => $request->company_name,
            'dealer_name' => $request->dealer_name,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return $id;
        SaleInvoice::find($id)->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully');
    }
}
