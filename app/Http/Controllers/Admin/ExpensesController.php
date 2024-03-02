<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expenses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expenses::orderBy('id', 'DESC')->get();
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'name' => 'required',
            
        ]);
        Expenses::create([
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'name' => $request->name,
            'date' => $request->date,
            'status' => $request->status
        ]);
        return redirect()->route('dailyexp.index')->with('success', 'Expenses created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $expenses = Expenses::find($id);
        return view('expenses.show', compact('expenses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $expenses = Expenses::find($id);
        return view('expenses.edit', compact('expenses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Expenses::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'name' => $request->name,
            'date' => $request->date,
            'status' => $request->status
        ]);
        return redirect()->route('dailyexp.index')->with('success', 'Expenses updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Expenses::find($id)->delete();
        return redirect()->route('dailyexp.index')->with('success', 'Expenses deleted successfully');
    }

    

}
