<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use App\Models\Report;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Expenses;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use App\Models\PurchaseDetail;
use App\Http\Controllers\Controller;
use App\Models\Purchase;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function SaleRecipt()
    {
        $customers = Customer::orderBy('id', 'DESC')->get();
        return view('reports.salerecipt', compact('customers'));
    }

    function Leadger()
    {
        $customers = Customer::pluck('customer_name', 'id');
        return view("reports.leadger", compact('customers'));
    }
    function LeadgerDetail(Request $request)
    {
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
                'particular' => ($payment->paymentable_type == 'App\\Models\\Sale') ? 'Sale (' . $payment->paymentable->type . ')' : 'Purchase (' . $payment->paymentable->type . ')',
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

        // $sale = SaleDetail::join('sales', 'sales.id', '=', 'sale_details.sale_id')
        // ->select('sales.date', 'title as particuler', 'sale_price as amount')
        // ->get();

        // $purchase = PurchaseDetail::join('purchases', 'purchases.id', '=', 'purchase_details.purchase_id')
        // ->select('purchases.date', 'title as particuler', 'purchase_amount as amount')
        // ->get();

        return view("reports.leadger", compact('customers', 'combinedData'));
    }

    function PurchaseNew()
    {
        return view('reports.purchase');
    }

    function PurchaseDetail(Request $request)
    {
        // return "ok";
        if ($request->type == 'new') {
            $data = PurchaseDetail::where('type', 'New')->get();
            return view('reports.purchase', compact('data'));
        } else {
            $data = PurchaseDetail::where('type', 'Used')->get();
            return view('reports.purchase', compact('data'));
        }
    }

    function SaleNew()
    {
        return view('reports.sale');
    }
    function SaleDetail(Request $request)
    {
        // return "ok";
        if ($request->type == 'new') {
            $data = SaleDetail::where('type', 'New')->get();
            return view('reports.sale', compact('data'));
        } else {
            $data = SaleDetail::where('type', 'Used')->get();
            return view('reports.sale', compact('data'));
        }
    }

    function show(Request $request)
    {
        $this->validate($request, [
            'type' => 'required'
        ]);
        $table = $request->table;
        if ($table == "purchase") {
            if ($request->type == 'new') {
                $data = PurchaseDetail::where('type', 'New')->get();
                return view('reports.view', compact('table', 'data'));
            } else {
                $data = PurchaseDetail::where('type', 'Use')->get();
                return view('reports.view', compact('table', 'data'));
            }
        } else {
            // return $request->type;
            if ($request->type == 'new') {
                $data = SaleDetail::where('type', 'New')->get();
                return view('reports.view', compact('table', 'data'));
            } else {
                $data = SaleDetail::where('type', 'Use')->get();
                return view('reports.view', compact('table', 'data'));
            }
        }
    }

    public function Expenses()
    {
        return view('reports.expenses');
    }

    public function ExpenseDetail(Request $request)
    {
        // return "working";
        $expenses = Expenses::whereBetween('date', [$request->input('from_date'), $request->input('to_date')])->get();
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
}
