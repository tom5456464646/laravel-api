<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/', [DataController::class, 'index'])->name('data.index');
Route::get('/orders', [DataController::class, 'orders'])->name('data.orders');
Route::get('/sales', [DataController::class, 'sales'])->name('data.sales');
Route::get('/stocks', [DataController::class, 'stocks'])->name('data.stocks');
Route::get('/incomes', [DataController::class, 'incomes'])->name('data.incomes');