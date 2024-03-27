<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('paymentable')->where('paymentable_type', 'App\Models\Purchase')->orderBy('id', 'DESC')->latest()->get();
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
            // 'description' => 'required',
            'image' => 'required',
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
        if (isset($request->purchase_id)) {
            $sale = Purchase::find($request->purchase_id);
        } else {
            $sale = Sale::find($request->sale_id);
        }
        $sale->payments()->create([
            'date' => $request->date,
            'type' => $request->type,
            'total' => $sale->due_amount,
            'pending' => $request->pending - $request->paid,
            'received' => $request->paid,
            'description' => $request->description,
            'image' => str_replace('public/', '', $file),
            'status' => 6,
        ]);
        DB::commit();
        $this->installment($sale, $request->paid, $request->date);
        if ($sale->due_amount == 0) {
            $sale->update(['status' => 6]);
        } else {
            $sale->update(['status' => 5]);
        }
        return redirect()->back()->with('success', 'Payment created successfully');
    }

    function customerpayment(Request $request)
    {
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

        $customer = Customer::find($request->customer_id);
        $payment = $request->paid;
        foreach ($customer->sales as $sale) {
            $due_payment = $sale->due_amount;
            if ($payment <= $due_payment) {
                $sale->payments()->create([
                    'date' => $request->date,
                    'type' => $request->type,
                    'total' => $due_payment,
                    'pending' => $due_payment - $request->paid,
                    'received' => $request->paid,
                    'description' => $request->description,
                    'image' => str_replace('public/', '', $file),
                    'status' => ($payment == $due_payment) ? 6 : 5,
                ]);
                $this->installment($sale, $payment, $request->date);
                break;
            } else {
                $payment -= $due_payment;
                $sale->payments()->create([
                    'date' => $request->date,
                    'type' => $request->type,
                    'total' => $due_payment,
                    'pending' => $due_payment - $due_payment,
                    'received' => $due_payment,
                    'description' => $request->description,
                    'image' => str_replace('public/', '', $file),
                    'status' => 6,
                ]);
                $this->installment($sale, $payment, $request->date);
            }
        }

        $customer->payments()->create([
            'date' => $request->date,
            'type' => $request->type,
            'total' => $request->pending,
            'pending' => $request->pending - $request->paid,
            'received' => $request->paid,
            'description' => $request->description,
            'image' => str_replace('public/', '', $file),
            'status' => ($request->paid == $request->pending) ? 6 : 5,
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
        $this->validate($request, [
            'pending' => 'required',
            'received' => 'required',
            'date' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required',
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

        $payment = Payment::find($id);
        $payment->update([
            'pending' => $payment->total - $request->received,
            'received' => $request->received,
            'date' => $request->date,
            'type' => $request->type,
            'description' => $request->description,
            'image' => str_replace('public/', '', $file),
        ]);

        DB::commit();
        return redirect()->back()->with('success', 'Payment created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Payment::find($id)->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully');
    }



    public function installment($sale, $payment, $date)
    {
        //$sale = Sale::find($sale->id);
        if ($sale->installment == 'Yes') {
            foreach ($sale->installments as $installment) {
                $due_amount = $installment->amount - $installment->paid_amount;
                $c_pay = $installment->paid_amount + $payment;
                if ($payment <= $due_amount) {
                    $installment->update([
                        'paid_amount' => $c_pay,
                        'paid_date' => $date,
                        'due_amount' => $installment->amount - $c_pay,
                        'status' => ($payment == $due_amount) ? 6 : 5
                    ]);
                    break;
                } else if ($due_amount > 0) {
                    $c_pay = $installment->paid_amount + $due_amount;
                    $payment -= $due_amount;
                    $installment->update([
                        'paid_amount' => $c_pay,
                        'paid_date' => $date,
                        'due_amount' => $installment->amount - $c_pay,
                        'status' => 6
                    ]);
                }
            }
        }
    }

    public function imageUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
            'payment' => 'required',
            'date' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        DB::beginTransaction();

        $img = $request->image;
        $folderPath = "public/uploads/registrations/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);

        $registrations = Registration::find($id);

        $registrations->update([
            'status' => $request->status,
            'payment' => $request->payment,
            'date' => $request->date,
            'description' => $request->description,
            'image' => str_replace('public/', '', $file),
        ]);
        Payment::create([
            'date' => $request->date,
            'total' => $request->payment,
            'description' => $request->description,
            'status' => $request->status,
            'image' => str_replace('public/', '', $file),
        ]);
        DB::commit();

        return redirect()->back()->with('success', 'Registration created successfully');
    }
}
