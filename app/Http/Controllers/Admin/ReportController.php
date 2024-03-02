<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use App\Models\Customer;
use App\Models\Expenses;
use App\Http\Controllers\Controller;
use App\Models\PurchaseDetail;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

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

    function Expences()
    {
        // $request;
        $reports = collect();
        if($request->report_type == 'New Purchase')
        {
            $reports = PurchaseDetail::where('type','New','customer_id',);
        }
        else if($request->report_type == 'Used purchase')
        {
            $reports = PurchaseDetail::where('type','Used');
        }
        else if($request->report_type == 'New Sell')
        {
            $reports = SaleDetail::where('type','New');
        }
        else if($request->report_type == 'New Sell')
        {
            $reports = SaleDetail::where('type','Used');
        }

        if($request->customer)
        {
            $reports = $reports->where('customer_id',$request->customer_id)->get();
        }
        else
        {
            $reports = $reports->all();
        }

        $customers = Customer::orderBy('id', 'DESC')->get();
        return view('reports.CustomerReport', compact('customers','reports'));
        return "Expences";
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
            $data = PurchaseDetail::where('type', 'Use')->get();
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
            $data = SaleDetail::where('type', 'Use')->get();
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
}
