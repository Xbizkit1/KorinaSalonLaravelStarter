<?php

use App\Http\Controllers\SalonController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SalonController::class, 'home'])->name('home');
Route::get('/dashboard', [SalonController::class, 'dashboard'])->name('dashboard');
Route::get('/transactions', [SalonController::class, 'transactions'])->name('transactions');
Route::post('/transactions', [SalonController::class, 'storeTransaction'])->name('transactions.store');
Route::get('/inventory', [SalonController::class, 'inventory'])->name('inventory');
Route::post('/inventory/{inventory}/restock', [SalonController::class, 'restock'])->name('inventory.restock');
Route::post('/inventory/{inventory}/subtract', [SalonController::class, 'subtractStock'])->name('inventory.subtract');
Route::get('/schedules', [SalonController::class, 'schedules'])->name('schedules');
Route::post('/schedules', [SalonController::class, 'storeSchedule'])->name('schedules.store');
