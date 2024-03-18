<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleUseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::where('type', 'Used')->with('customer')->orderBy('id', 'DESC')->latest()->get();
        return view('sale-use.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sale-use.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sales = Sale::find($id)->with('saleDetail', 'payments')->where('id', $id)->first();

        $paymentsWithoutImage = $sales->payments->where('image', null);
        if ($paymentsWithoutImage->isNotEmpty()) {
            return view('payments.show_with_out_image', compact('paymentsWithoutImage'));
        }

        return view('sale-use.show', compact('sales'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function certificate($id)
    {
        $detail = SaleDetail::where(['type' => 'Used', 'sale_id' => $id])->with('sale.payments')->first();
        return view("sale-use.certificate", compact('detail'));
    }
}
