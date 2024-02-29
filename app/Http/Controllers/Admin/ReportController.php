<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\PurchaseDetail;
use App\Models\Report;
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
        return "Sale New";
    }

    function show(Request $request)
    {
        $this->validate($request, [
            'type' => 'required'
        ]);

        if ($request->type == 'new') {
            $purchases = PurchaseDetail::where('type', 'New')->get();
            return view('reports.view', compact('purchases'));
        } else {
            $purchases = PurchaseDetail::where('type', 'Use')->get();
            return view('reports.view', compact('purchases'));
        }
    }
}
