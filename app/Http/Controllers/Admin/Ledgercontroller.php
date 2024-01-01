<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ledger;
use Illuminate\Http\Request;

class Ledgercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ledgers = Ledger::orderBy('id', 'DESC')->get();
        return view('ledgers.index', compact('ledgers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ledgers.create');
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
        Ledger::create([
            'customer_name' => $request->customer,
            'father_name' => $request->father,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        return redirect()->route('ledgers.index')->with('success', 'Ledger created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer = Ledger::find($id);
        return view('ledgers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Ledger::find($id);
        return view('ledgers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Ledger::find($id)->update([
            'company_name' => $request->company_name,
            'dealer_name' => $request->dealer_name,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        return redirect()->route('ledgers.index')->with('success', 'Ledger updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return $id;
        Ledger::find($id)->delete();
        return redirect()->route('ledgers.index')->with('success', 'Ledger deleted successfully');
    }
}
