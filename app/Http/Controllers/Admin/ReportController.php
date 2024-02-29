<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PurchaseDetail;
use App\Models\Report;
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
        return "Leadger Working";
    }

    function Expences()
    {
        return "Expences";
    }

    function PurchaseNew()
    {
        return view('reports.purchase');
    }

    function SaleNew()
    {
        return view('reports.sale');
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
}
