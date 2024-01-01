<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expenission;
use Illuminate\Http\Request;

class Expenissioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenissions = Expenission::orderBy('id', 'DESC')->get();
        return view('expenissions.index', compact('expenissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenissions.create');
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
        Expenission::create([
            'customer_name' => $request->customer,
            'father_name' => $request->father,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        return redirect()->route('expenissions.index')->with('success', 'Expenission created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $expenission = Expenission::find($id);
        return view('expenissions.show', compact('expenission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $expenission = Expenission::find($id);
        return view('expenissions.edit', compact('expenission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Expenission::find($id)->update([
            'company_name' => $request->company_name,
            'dealer_name' => $request->dealer_name,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        return redirect()->route('expenissions.index')->with('success', 'Expenission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return $id;
        Expenission::find($id)->delete();
        return redirect()->route('expenissions.index')->with('success', 'Expenission deleted successfully');
    }
}
