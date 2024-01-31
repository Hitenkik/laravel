<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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
    return view('dashboard');
});

// Crud Routes

Route::get('employee/index', [EmployeeController::class, 'index']);
Route::post('employee/store', [EmployeeController::class, 'store']);
Route::get('employee/create', [EmployeeController::class, 'create']);
Route::get('employee/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('employee/update/{id}', [EmployeeController::class, 'update']);
Route::get('employee/delete/{id}', [EmployeeController::class, 'delete']);
