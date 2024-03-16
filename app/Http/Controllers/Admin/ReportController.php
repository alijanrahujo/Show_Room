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
        // return $request;
        if (!empty($request->input('from') && $request->input('to'))) {
            $customers = Customer::pluck('customer_name', 'id');

            $expenses = Expenses::select('*');
            $payments = Payment::with('paymentable');

            if ($request->customer_id > 0) {
                $payments = $payments;
                $expenses = $expenses;
            }
            if ($request->from && $request->to) {
                $payments = $payments->whereBetween('date', [$request->from, $request->to]);
                $expenses = $expenses->whereBetween('date', [$request->from, $request->to]);
            }
            $payments = $payments->get();
            $expenses = $expenses->get();


            $combinedData = [];
            $payments->each(function ($payment) use (&$combinedData) {
                $combinedData[] = [
                    'date' => $payment->date,
                    'particular' => ($payment->paymentable_type == 'App\\Models\\Sale') ? (($payment->paymentable->type == 'New') ? $payment->paymentable->customer->customer_name . ' Qty ' . $payment->paymentable->saleDetail->count() . ' (' . $payment->id . ') - NS' : $payment->paymentable->customer->customer_name . ' Qty ' . $payment->paymentable->saleDetail->count() . ' (' . $payment->id . ') - US') : (($payment->paymentable->type == 'New') ? 'NP' : 'UP'),
                    'debit' => ($payment->paymentable_type == 'App\\Models\\Sale') ? $payment->received : 0,
                    'credit' => ($payment->paymentable_type == 'App\\Models\\Purchase') ? $payment->received : 0,
                ];
            });

            $expenses->each(function ($expense) use (&$combinedData) {
                $combinedData[] = [
                    'date' => $expense->date,
                    'particular' => $expense->title,
                    'debit' => 0,
                    'credit' => $expense->amount,
                ];
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
        } else {
            $customers = Customer::pluck('customer_name', 'id');

            $expenses = Expenses::select('*');
            $payments = Payment::with('paymentable');

            if ($request->customer_id > 0) {
                $payments = $payments;
                $expenses = $expenses;
            }
            if ($request->from && $request->to) {
                $payments = $payments;
                $expenses = $expenses;
            }
            $payments = $payments->get();
            $expenses = $expenses->get();


            $combinedData = [];
            $payments->each(function ($payment) use (&$combinedData) {
                $combinedData[] = [
                    'date' => $payment->date,
                    'particular' => ($payment->paymentable_type == 'App\\Models\\Sale') ? (($payment->paymentable->type == 'New') ? $payment->paymentable->customer->customer_name . ' Qty ' . $payment->paymentable->saleDetail->count() . ' (' . $payment->id . ') - NS' : $payment->paymentable->customer->customer_name . ' Qty ' . $payment->paymentable->saleDetail->count() . ' (' . $payment->id . ') - US') : (($payment->paymentable->type == 'New') ? 'NP' : 'UP'),
                    'debit' => ($payment->paymentable_type == 'App\\Models\\Sale') ? $payment->received : 0,
                    'credit' => ($payment->paymentable_type == 'App\\Models\\Purchase') ? $payment->received : 0,
                ];
            });

            $expenses->each(function ($expense) use (&$combinedData) {
                $combinedData[] = [
                    'date' => $expense->date,
                    'particular' => $expense->title,
                    'debit' => 0,
                    'credit' => $expense->amount,
                ];
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
                        'particular' => $payment->type . ' (' . $payment->id . ')',
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
        return view("reports.letter");
    }
    function letterDetail(Request $request)
    {
        if (!empty($request->input('from') && $request->input('to'))) {
            $letters = Registration::whereBetween('date', [$request->input('from'), $request->input('to')])->get();
        } else {
            $letters = Registration::get();
        }
        return view("reports.letter", compact('letters'));
    }
}
