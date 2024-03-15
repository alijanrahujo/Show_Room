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
        $installments = Installment::where('status', 4)->whereBetween('date', [\Carbon\Carbon::now()->format('Y-m-d'), \Carbon\Carbon::now()->addMonths()])->with('installmentable.customer')->get();
        return view('dashboard', compact('data', 'installments'));
    }
}
