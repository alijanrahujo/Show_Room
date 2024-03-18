<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Installment;
use App\Models\PurchaseDetail;

class DashboardController extends Controller
{
    public function index()
    {
        $data['customer'] = Customer::count();
        $data['new_customer'] = Customer::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        $data['new_bike'] = PurchaseDetail::where(['status' => 2, 'type' => 'New'])->count();
        $data['used_bike'] = PurchaseDetail::where(['status' => 2, 'type' => 'Used'])->count();
        $installments = Installment::where(function ($query) {
            $query->where('status', 4)->orWhere('status', 5);
        })
        ->whereBetween('date', [\Carbon\Carbon::now()->format('Y-m-d'),\Carbon\Carbon::now()->addMonth(1)->format('Y-m-d')
        ])->with('installmentable.customer')->orderBy('date','ASC')->get();

        return view('dashboard', compact('data', 'installments'));
    }
}
