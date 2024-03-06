<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('paymentable')->where('paymentable_type', 'App\Models\Purchase')->orderBy('id', 'DESC')->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pending' => 'required',
            'paid' => 'required',
            'description' => 'required',
            'image' => 'required',
            'sale_id' => 'required',
        ]);

        DB::beginTransaction();

        $img = $request->image;
        $folderPath = "public/uploads/sale/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);

        $sale = Sale::find($request->sale_id);
        $sale->payments()->create([
            'date' => $request->date,
            'type' => $request->type,
            'total' => $sale->amount,
            'pending' => $request->pending - $request->paid,
            'received' => $request->paid,
            'description' => $request->description,
            'image' => str_replace('public/', '', $file),
            'status' => 6,
        ]);

        DB::commit();
        return redirect()->back()->with('success', 'Payment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $payment = Payment::with('paymentable')->find($id);
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payment = Payment::find($id);
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Payment::find($id)->update([
            'company_name' => $request->company_name,
            'dealer_name' => $request->dealer_name,
            'phone' => $request->phone,
            'cnic' => $request->cnic,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Payment::find($id)->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully');
    }
}
