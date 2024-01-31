<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;

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
    return view('login');
})->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login.admin');
Route::post('admin/store', [AdminController::class, 'store']);
Route::post('admin/register', [AdminController::class, 'register']);


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

    // Crud routes
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin/create', [AdminController::class, 'create']);
    Route::get('admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/update/{id}', [AdminController::class, 'update']);
    Route::get('admin/delete/{id}', [AdminController::class, 'delete']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

//layout.app route
// Route::view('index', 'layout.app');
// Route::view('dashboard', 'dashboard');
Route::view('login', 'login');
Route::view('register', 'register');


