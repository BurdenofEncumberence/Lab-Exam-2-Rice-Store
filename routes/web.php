<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('rices');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('rices', RiceController::class)->middleware('auth');


Route::resource('orders', OrderController::class)
    ->only(['index', 'create', 'store', 'show', 'destroy'])
    ->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::patch('/payments/{payment}/paid', [PaymentController::class, 'markAsPaid'])->name('payments.markAsPaid');
    Route::patch('/payments/{payment}/unpaid', [PaymentController::class, 'markAsUnpaid'])->name('payments.markAsUnpaid');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';