<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('users/index', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
Route::get('users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
Route::post('users/create', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
Route::get('users/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
Route::post('users/update', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
Route::delete('users/delete', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');

Route::get('customers/test', [\App\Http\Controllers\CustomersController::class, 'test'])->name('customers.test');
Route::get('customers/index', [App\Http\Controllers\CustomersController::class, 'index'])->name('customers.index');
Route::get('customers/search', [App\Http\Controllers\CustomersController::class, 'search'])->name('customers.search');
Route::get('customers/show/{id}', [App\Http\Controllers\CustomersController::class, 'show'])->name('customers.show');
Route::get('customers/create', [App\Http\Controllers\CustomersController::class, 'create'])->name('customers.create');
Route::post('customers/create', [App\Http\Controllers\CustomersController::class, 'store'])->name('customers.store');
Route::get('customers/edit/{id}', [App\Http\Controllers\CustomersController::class, 'edit'])->name('customers.edit');
Route::put('customers/update/{customer}', [App\Http\Controllers\CustomersController::class, 'update'])->name('customers.update');
Route::delete('customers/delete/{customer}', [App\Http\Controllers\CustomersController::class, 'destroy'])->name('customers.delete');

require __DIR__ . '/auth.php';
