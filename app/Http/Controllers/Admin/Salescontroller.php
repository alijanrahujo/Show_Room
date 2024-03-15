<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\SalePayment;
use Illuminate\Http\Request;

class Salescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::where('type', 'New')->with('customer')->orderBy('id', 'DESC')->latest()->get();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::pluck('customer_name', 'id');
        $purchases = PurchaseDetail::with('vehicle')->get()->pluck('vehicle.title', 'id')->toArray();
        return view('sales.create', compact('customers', 'purchases'));
    }
    public function getPurchaseDetails($id)
    {
        // return $id;
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
        return $request;
        $this->validate($request, [
            'customer' => 'required',
            'bike' => 'required',
            'sell' => 'required',
            'paid' => 'required',
        ]);
        $sale = Sale::create([
            'customer_id' => $request->customer,
            'title' => $request->title,
            'engine' => $request->engine,
            'chassis' => $request->chassis,
            'color' => $request->color,
            'model' => $request->model,
        ]);
        // return $sale->id;
        SalePayment::create([
            'sale_id' => $sale->id,
            'purchase_id' => $request->bike,
            'purchase_amount' => $request->purchase_amount,
            'sale_amount' => $request->sell,
            'received' => $request->paid,
            'pending' => $request->sell - $request->paid,
            'profit' => $request->sell - $request->purchase_amount,
            //'status' => $request->status,
        ]);
        return redirect()->route('sales.index')->with('success', 'Sale  created successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $sales = Sale::with('saleDetail', 'payments', 'installments')->find($id);

    //     $hasImage = $sales->payments->contains('image', '!=', null) && $sales->installment == 'Yes';

    //     return view($hasImage ? 'sales.show' : 'sales.show_with_out_image', compact('sales'));
    // }


    public function show($id)
    {
        $sales = Sale::with('saleDetail', 'payments', 'installments')->findOrFail($id);

        $paymentsWithoutImage = $sales->payments->where('image', null);
        if ($paymentsWithoutImage->isNotEmpty()) {
            return view('payments.show_with_out_image', compact('paymentsWithoutImage'));
        }

        return view('sales.show', compact('sales'));
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

    public function receipt($id)
    {
        $sell = Sale::with('saleDetail', 'customer')->where('id', $id)->first();
        //return $sell;
        return view('sales.receipt', compact('sell'));
    }

    public function invoices($id)
    {
        $sale = SaleDetail::where('purchase_id', $id)->with('sale', 'sale.customer')->first();
        return view('sales.invoice', compact('sale'));
    }

    public function paymentreceipt($id)
    {
        $payment = Payment::where('id', $id)->with('paymentable')->first();
        //return $payment;
        return view('sales.paymentreceipt', compact('payment'));
    }
}
