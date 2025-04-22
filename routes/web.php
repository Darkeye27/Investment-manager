<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FixedDepositController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function(){
    Route::resource('fixed-deposits', FixedDepositController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('stocks', StockController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
