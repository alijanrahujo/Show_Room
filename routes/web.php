<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\Customercontroller;
use App\Http\Controllers\Admin\Dealercontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Expenissioncontroller;
use App\Http\Controllers\Admin\Ledgercontroller;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SaleInvoicecontroller;
use App\Http\Controllers\Admin\Salescontroller;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehicleController;

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
    return view('welcome');
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
Route::resource('sales', Salescontroller::class);
Route::resource('payments', PaymentController::class);
Route::resource('customers', Customercontroller::class);
Route::resource('dealers', Dealercontroller::class);
Route::resource('saleinvoice', SaleInvoicecontroller::class);
Route::resource('purchaseinvoice', SaleInvoicecontroller::class);
Route::resource('dueinvoice', SaleInvoicecontroller::class);
Route::resource('dailyexp', Expenissioncontroller::class);
Route::resource('ledgers', Ledgercontroller::class);
Route::resource('vehicles', VehicleController::class);
Route::get('/get-balance/{accountId}', [LedgerController::class, 'getBalance']);
Route::get('/getPurchaseDetails/{id}', [SalesController::class, 'getPurchaseDetails'])->name('getPurchaseDetails');
Route::resource('accounts', AccountController::class);
