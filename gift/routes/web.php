<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

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
})->name('login')->middleware('guest:employee');
Route::post('login', [EmployeeController::class, 'login'])->name('login.user');
Route::post('users/store', [EmployeeController::class, 'store']);

Route::middleware('auth:employee')->group(function () {
    Route::get('dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');
    Route::post('logout', [EmployeeController::class, 'logout'])->name('logout');
    Route::get('users/index', [EmployeeController::class, 'index'])->name('users');
    Route::get('users/reg', [EmployeeController::class, 'reg'])->name('Reg');
    Route::get('users/create', [EmployeeController::class, 'create']);
    Route::get('users/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('users/update/{id}', [EmployeeController::class, 'update']);
    Route::get('users/delete/{id}', [EmployeeController::class, 'delete']);
    Route::get('users/blog', [EmployeeController::class, 'blog']);

    Route::resource('partners', PartnerController::class);
    Route::post('partners/{id}', [PartnerController::class, 'update']);
    //profile Route
    Route::get('edit-profile', [EmployeeController::class, 'editProfile']);
    Route::get('edit-profile', [EmployeeController::class, 'editProfile']);
});
