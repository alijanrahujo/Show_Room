<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use App\Models\Report;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Expenses;
use App\Models\Purchase;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Registration;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function SaleRecipt()
    {
        $customers = Customer::orderBy('id', 'DESC')->latest()->get();
        return view('reports.salerecipt', compact('customers'));
    }

    function dailyexp()
    {
        $customers = Customer::pluck('customer_name', 'id');
        return view("reports.dailyExp", compact('customers'));
    }
    function dailyexpDetail(Request $request)
    {
        $customers = Customer::pluck('customer_name', 'id');

        $expenses = Expenses::select('*');
        $payments = Payment::with('paymentable');

        if ($request->from && $request->to) {
            $payments = $payments->whereBetween('date', [$request->from, $request->to]);
            $expenses = $expenses->whereBetween('date', [$request->from, $request->to]);
        }
        $payments = $payments->get();
        $expenses = $expenses->get();

        $payments->each(function ($payment) use (&$combinedData) {
            if ($payment->paymentable) {
                $particular = '';
                $debit = 0;
                $credit = 0;

                if ($payment->paymentable_type === 'App\Models\Sale') {
                    $particular = $payment->paymentable->customer->customer_name . ' Qty ' . $payment->paymentable->saleDetail->count() . ' - ' . ($payment->paymentable->type === 'New' ? 'NS' : 'US');
                    $debit = $payment->received;
                } elseif ($payment->paymentable_type === 'App\Models\Purchase' && $payment->paymentable->type === 'Used') {
                    $particular = $payment->paymentable->purchaseable->customer_name . ' Qty ' . $payment->paymentable->PurchaseDetail->count() . ' - UP';
                    $credit = $payment->received;
                } elseif ($payment->paymentable_type === 'App\Models\Registration') {
                    $particular = $payment->paymentable->type . ' ' . $payment->paymentable->title . ' Chas: ' . $payment->paymentable->chassis;
                    $debit = $payment->received;
                }

                if (!($payment->paymentable_type === 'App\Models\Purchase' && $payment->paymentable->type === 'New')) {
                    $combinedData[] = [
                        'date' => $payment->date,
                        'particular' => $particular,
                        'debit' => $debit,
                        'credit' => $credit,
                    ];
                }
            }
        });

        $expenses->each(function ($expense) use (&$combinedData) {
            $combinedData[] = [
                'date' => $expense->date,
                'particular' => $expense->title,
                'debit' => 0,
                'credit' => $expense->amount,
            ];
        });

        if($combinedData)
        {
            // Sort combinedData by date
            usort($combinedData, function ($a, $b) {
                return strtotime($a['date']) - strtotime($b['date']);
            });

            // Calculate balance
            $balance = 0;
            foreach ($combinedData as &$data) {
                $balance += $data['debit'] - $data['credit'];
                $data['balance'] = $balance;
            }
        }


        return view("reports.dailyExp", compact('customers', 'combinedData'));
    }

    function ledger()
    {
        $customers = Customer::pluck('customer_name', 'id');
        return view("reports.ledger", compact('customers'));
    }
    function ledgerDetail(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'from' => 'required',
            'to' => 'required'
        ]);

        $customer = Customer::with('sales', 'purchaseable')->where('id', $request->customer_id)->first();


        $combinedData = [];

        $bf_payment = 0;
        $customer->sales()->whereDate('date', '<', $request->from)->each(function ($sale) use (&$combinedData, &$request, &$bf_payment) {
            $bf_payment += $sale->amount;
            $bf_payment -= $sale->payments()->whereDate('date', '<', $request->from)->sum('received');
        });

        if ($bf_payment > 0) {
            $combinedData[] = [
                'date' => '',
                'particular' => 'B/F',
                'debit' => $bf_payment,
                'credit' => 0,
            ];
        }


        $customer->sales()->whereBetween('date', [$request->from, $request->to])->each(function ($sale) use (&$combinedData) {
            $sale->saleDetail->each(function ($saleDetail) use (&$combinedData, &$sale) {
                $combinedData[] = [
                    'date' => $sale->date,
                    'particular' => $saleDetail->title . ' ch:' . $saleDetail->chassis . (($saleDetail == 'New') ? ' (SN)' : ' (SU)'),
                    'debit' => $saleDetail->total,
                    'credit' => 0,
                ];
            });
        });


        $customer->purchaseable()->whereBetween('date', [$request->from, $request->to])->each(function ($purchase) use (&$combinedData) {
            $purchase->purchaseDetail->each(function ($purchaseDetail) use (&$combinedData, &$purchase) {
                $combinedData[] = [
                    'date' => $purchase->date,
                    'particular' => $purchaseDetail->title . ' ch:' . $purchaseDetail->chassis,
                    'debit' => 0,
                    'credit' => $purchaseDetail->total,
                ];
            });
        });

        $customer->sales()->each(function ($sale) use (&$combinedData, $request) {
            $sale->payments()->whereBetween('date', [$request->from, $request->to])->each(function ($payment) use (&$combinedData, &$sale) {
                if ($payment->received > 0) {
                    $combinedData[] = [
                        'date' => $payment->date,
                        'particular' => $payment->type,
                        'debit' => 0,
                        'credit' => $payment->received,
                    ];
                }
            });
        });



        // Sort combinedData by date
        usort($combinedData, function ($a, $b) {
            return strtotime($a['date']) - strtotime($b['date']);
        });

        // Calculate balance
        $balance = 0;
        foreach ($combinedData as &$data) {
            $balance += $data['debit'] - $data['credit'];
            $data['balance'] = $balance;
        }

        $customers = Customer::pluck('customer_name', 'id');
        return view("reports.ledger", compact('customers', 'combinedData', 'customer', 'request'));
    }

    function PurchaseNew()
    {
        return view('reports.purchase');
    }

    function PurchaseDetail(Request $request)
    {
        // return $request;
        if (!empty($request->input('from') && $request->input('to'))) {
            $data = Purchase::where('type', $request->type)->whereBetween('date', [$request->input('from'), $request->input('to')])->with('purchaseDetail')->get();
        } else {
            $data = Purchase::with('purchaseDetail')->get();
        }
        return view('reports.purchase', compact('data'));
    }

    function SaleNew()
    {
        return view('reports.sale');
    }

    function SaleDetail(Request $request)
    {
        if (!empty($request->input('from') && $request->input('to'))) {
            $data = Sale::where('type', $request->type)->whereBetween('date', [$request->input('from'), $request->input('to')])->with('saleDetail')->get();
        } else {
            $data = Sale::with('saleDetail')->get();
        }
        return view('reports.sale', compact('data'));
    }

    public function Expenses()
    {
        return view('reports.expenses');
    }

    public function ExpenseDetail(Request $request)
    {
        if (!empty($request->input('from_date') && $request->input('to_date'))) {
            $expenses = Expenses::whereBetween('date', [$request->input('from_date'), $request->input('to_date')])->get();
        } else {
            $expenses = Expenses::get();
        }
        return view('reports.expenses', compact('expenses'));
    }

    function Customer()
    {
        $customers = Customer::pluck("customer_name", 'id');
        return view("reports.customer", compact('customers'));
    }
    function CustomerDetail(Request $request)
    {
        $customers = Customer::pluck("customer_name", 'id');
        $customer = Customer::find($request->customer);
        if ($request->type == "sale") {
            $sale = Sale::where('customer_id', $request->customer)->with('saleDetail', 'customer')->get();
            return view("reports.customer", compact("sale", 'customer', 'customers'));
        } else {
            $purchase = $customer->purchaseable;
            return view("reports.customer", compact('purchase', 'customer', 'customers'));
        }
    }

    function Chassis()
    {
        return view("reports.vehicle");
    }
    function ChassisDetail(Request $request)
    {
        $purchases = PurchaseDetail::where('chassis', $request->chassis)->with('purchase')->orderby('id', 'DESC')->get();
        $sales = SaleDetail::where('chassis', $request->chassis)->with('sale', 'sale.customer')->orderby('id', 'DESC')->get();
        return view("reports.vehicle", compact('sales', 'purchases'));
    }

    function letter()
    {
        $data = collect();
        return view("reports.letter", compact('data'));
    }
    function letterDetail(Request $request)
    {
        $data = $request;
        $letters = Registration::select('*');
        $sales = SaleDetail::where('type', 'New');

        if ($request->input('from') && $request->input('to')) {
            $letters = $letters->whereBetween('date', [$request->input('from'), $request->input('to')]);

            $sales = $sales->whereHas('sale', function ($query) use ($request) {
                $query->whereBetween('date', [$request->input('from'), $request->input('to')]);
            });
        }
        if ($request->chassis) {
            $letters = $letters->where('chassis', $request->chassis);
            $sales = $sales->where('chassis', $request->chassis);
        }

        $letters = $letters->get();
        $sales = $sales->get();
        $combinedData = [];
        $letters->each(function ($letter) use (&$combinedData) {
            $combinedData[] = [
                'date' => $letter->date,
                'name' => $letter->name,
                'phone' => $letter->phone,
                'title' => $letter->title,
                'chassis' => $letter->chassis,
                'engine' => $letter->engine,
                'model' => $letter->model . ' - ' . $letter->color,
                'payment' => $letter->payment,
                'type' => $letter->type,
                'status' => $letter->status,
            ];
        });


        $sales->each(function ($sale) use (&$combinedData) {
            $combinedData[] = [
                'date' => $sale->sale->date,
                'name' => $sale->full_name,
                'phone' => $sale->sale->customer->phone,
                'title' => $sale->title,
                'chassis' => $sale->chassis,
                'engine' => $sale->engine,
                'model' => $sale->model . ' - ' . $sale->color,
                'payment' => $sale->total,
                'type' => $sale->type,
                'status' => $sale->sale->status,
            ];
        });

        usort($combinedData, function ($a, $b) {
            return strtotime($a['date']) - strtotime($b['date']);
        });

        return view("reports.letter", compact('combinedData', 'data'));
    }
}
