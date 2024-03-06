<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\Customercontroller;
use App\Http\Controllers\Admin\Dealercontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Ledgercontroller;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\DealerPurchaseController;
use App\Http\Controllers\Admin\ExpensesController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SaleInvoicecontroller;
use App\Http\Controllers\Admin\Salescontroller;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\SaleUseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
    //return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::resource("users", UserController::class);
Route::resource("roles", RoleController::class);
Route::resource("permissions", PermissionController::class);
Route::resource("purchases", PurchaseController::class);
Route::resource("dealer-purchase", DealerPurchaseController::class);
Route::resource('sales', Salescontroller::class);
Route::resource('sale-use', SaleUseController::class);
Route::resource('payments', PaymentController::class);
Route::resource('customers', Customercontroller::class);
Route::resource('dealers', Dealercontroller::class);
Route::resource('saleinvoice', SaleInvoicecontroller::class);
Route::resource('purchaseinvoice', SaleInvoicecontroller::class);
Route::resource('dueinvoice', SaleInvoicecontroller::class);
Route::resource('dailyexp', ExpensesController::class);
Route::resource('ledgers', Ledgercontroller::class);
Route::resource('vehicles', VehicleController::class);
Route::get('/sell/receipt/{id}', [Salescontroller::class, 'receipt'])->name('sell.receipt');
Route::get('/sell/paymentreceipt/{id}', [Salescontroller::class, 'paymentreceipt'])->name('sell.paymentreceipt');
Route::get('/invoices/{purchase}', [SalesController::class, 'invoices'])->name('invoices');
Route::get('/get-balance/{accountId}', [LedgerController::class, 'getBalance']);
Route::get('/getPurchaseDetails/{id}', [SalesController::class, 'getPurchaseDetails'])->name('getPurchaseDetails');
Route::resource('accounts', AccountController::class);
Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
    Route::get('SaleRecipt', [ReportController::class, 'SaleRecipt'])->name('SaleRecipt');
    Route::get('CustomerReport', [ReportController::class, 'CustomerReport'])->name('CustomerReport');
    Route::get('leadger', [ReportController::class, 'leadger'])->name('leadger');
    Route::post('leadger', [ReportController::class, 'leadgerDetail'])->name('leadger');
    Route::get('Expenses', [ReportController::class, 'Expenses'])->name('Expenses');
    Route::post('Expenses', [ReportController::class, 'ExpenseDetail'])->name('Expenses');
    Route::get('PurchaseNew', [ReportController::class, 'PurchaseNew'])->name('PurchaseNew');
    Route::post('PurchaseNew', [ReportController::class, 'PurchaseDetail'])->name('PurchaseNew');
    Route::get('SaleNew', [ReportController::class, 'SaleNew'])->name('SaleNew');
    Route::post('SaleNew', [ReportController::class, 'SaleDetail'])->name('SaleNew');
    Route::get('Customer', [ReportController::class, 'Customer'])->name('Customer');
    Route::post('Customer', [ReportController::class, 'CustomerDetail'])->name('Customer');
});
