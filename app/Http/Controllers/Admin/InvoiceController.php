<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'DESC')->latest()->get();
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sale = Invoice::with('sale')->find($id);
        return view("invoices.show", compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function change($id)
    {
        // return $id;
        $data = Invoice::find($id);
        $data->update(['status' => 9]);
        $sale = Invoice::find($id);
        return view('invoices.show', compact('sale'));
    }
}
