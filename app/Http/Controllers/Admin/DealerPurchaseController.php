<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dealer;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PurchaseDetail;

use function PHPUnit\Framework\returnArgument;

class DealerPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::where('type', 'New')->latest()->get();
        return view('dealer-purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $vehicles = VehicleType::pluck('vehicle_type', 'id');
        $dealers = Dealer::pluck('company_name', 'id');
        return view('dealer-purchase.create', compact('dealers', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
        $request->validate([
            'title' => 'required',
            'engine' => 'required',
            'chassis' => 'required',
            'model' => 'required',
            'color' => 'required',
            'power' => 'required',
            // 'status' => 'required',
        ]);

        if ($request->customer > 0) {
            $data = Customer::find($request->customer);
            $data->purchaseable()->create([
                'title' => $request->title,
                'engine' => $request->engine,
                'chassis' => $request->chassis,
                'model' => $request->model,
                'color' => $request->color,
            ]);
        } else {
            $data = Dealer::find($request->dealer);
            $data->purchaseable()->create([
                'title' => $request->title,
                'engine' => $request->engine,
                'chassis' => $request->chassis,
                'model' => $request->model,
                'color' => $request->color,
                'vehicle_id' => 1,
            ]);
        }

        $pending = $request->total - $request->paid;
        $purchase = Purchase::orderby('id', 'desc')->first();
        $purchase->payments()->create([
            'date' => $request->date,
            'total' => $request->total,
            'received' => $request->paid,
            'status' => 0,
            'pending' => $pending,
        ]);

        return redirect()->route('dealer-purchase.index')->with('success', 'Purchase created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $purchases = Purchase::with('purchaseDetail', 'payments')->where('id', $id)->first();

        $paymentsWithoutImage = $purchases->payments->where('image', null);
        if ($paymentsWithoutImage->isNotEmpty()) {
            //return view('payments.show_with_out_image', compact('paymentsWithoutImage'));
        }

        return view('dealer-purchase.show', compact('purchases'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $purchase = Purchase::with('purchaseable')->where('id', $id)->first();
        $customers = Customer::pluck('customer_name', 'id');
        $dealers = Dealer::pluck('company_name', 'id');
        return view('dealer-purchase.edit', compact('purchase', 'dealers', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request;
        Purchase::find($id)->update([
            'company_name' => $request->company_name,
            'dealer_name' => $request->dealer_name,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);

        $pending = $request->total - $request->paid;
        Payment::create([
            'date' => $request->date,
            'total' => $request->total,
            'received' => $request->paid,
            'pending' => $pending,
        ]);
        return redirect()->route('dealer-purchase.index')->with('success', 'Purchase updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return $id;
        Purchase::find($id)->delete();
        return redirect()->route('dealer-purchase.index')->with('success', 'Purchase deleted successfully');
    }
}
