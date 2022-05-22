<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('users/index', [App\Http\Controllers\UsersController::class, 'index'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\UsersController::class, 'create'])->name('user.create');
Route::post('user/create', [App\Http\Controllers\UsersController::class, 'store'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('user.edit');
Route::post('user/update', [App\Http\Controllers\UsersController::class, 'update'])->name('user.update');
Route::delete('user/delete', [App\Http\Controllers\UsersController::class, 'destroy'])->name('user.delete');

Route::get('customers/index', [App\Http\Controllers\CustomersController::class, 'index'])->name('customers.index');
Route::get('customers/create', [App\Http\Controllers\CustomersController::class, 'create'])->name('customers.create');
Route::post('customers/create', [App\Http\Controllers\CustomersController::class, 'store'])->name('customers.store');
Route::get('customers/edit/{id}', [App\Http\Controllers\CustomersController::class, 'edit'])->name('customers.edit');
Route::put('customers/update/{customer}', [App\Http\Controllers\CustomersController::class, 'update'])->name('customers.update');
Route::delete('customers/delete/{customer}', [App\Http\Controllers\CustomersController::class, 'destroy'])->name('customers.delete');

require __DIR__.'/auth.php';