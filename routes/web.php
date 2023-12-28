<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\EmployeeTypeController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\ReportController as testReportController;
use Illuminate\Routing\Route as RoutingRoute;


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

Route::resource('EmployeeType', EmployeeTypeController::class);
Route::resource("Designation", DesignationController::class);
Route::resource("Employee", EmployeeController::class);
Route::resource("Leaves", LeaveController::class);
Route::get('report/leave', [ReportController::class, 'leaveReport'])->name('report.leave');

Route::resource('report', testReportController::class);
