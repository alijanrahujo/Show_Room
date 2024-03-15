<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use Illuminate\Http\Request;

class Dealercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dealers = Dealer::orderBy('id', 'DESC')->latest()->get();
        return view('dealers.index', compact('dealers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dealers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company' => 'required',
            'dealer' => 'required',
            'phone' => 'required',
        ]);
        Dealer::create([
            'company_name' => $request->company,
            'dealer_name' => $request->dealer,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        return redirect()->route('dealers.index')->with('success', 'Dealer  created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dealer = Dealer::find($id);
        return view('dealers.show', compact('dealer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dealer = Dealer::find($id);
        return view('dealers.edit', compact('dealer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Dealer::find($id)->update([
            'company_name' => $request->company_name,
            'dealer_name' => $request->dealer_name,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        return redirect()->route('dealers.index')->with('success', 'Dealer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return $id;
        Dealer::find($id)->delete();
        return redirect()->route('dealers.index')->with('success', 'Dealer deleted successfully');
    }
}
