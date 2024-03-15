<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::orderBy('id', 'DESC')->latest()->get();
        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'holder' => 'required',
            'account' => 'required',
            'bank' => 'required',
            'name' => 'required',
            'code' => 'required',
        ]);
        Account::create([
            'account_holder' => $request->holder,
            'account_number' => $request->account,
            'bank' => $request->bank,
            'branch_name' => $request->name,
            'branch_code' => $request->code,
        ]);
        return redirect()->route('accounts.index')->with('success', 'Account  created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $account = Account::find($id);
        return view('accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $account = Account::find($id);
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Account::find($id)->update([
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'bank' => $request->bank,
            'branch_name' => $request->branch_name,
            'branch_code' => $request->branch_code,
            'status' => $request->status,
        ]);
        return redirect()->route('accounts.index')->with('success', 'Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Account::find($id)->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully');
    }
}
