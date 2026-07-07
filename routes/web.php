<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AdminLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class)->only(['index', 'show']);
    Route::resource('items', ItemController::class);
    Route::post('/items/{item}/adjust-stock', [ItemController::class, 'adjustStock'])->name('items.adjustStock');
    Route::resource('suppliers', SupplierController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::get('/admin/logs', [AdminLogController::class, 'index'])->name('admin.logs');
    Route::delete('/admin/logs/clear', [AdminLogController::class, 'clear'])->name('admin.logs.clear');
});

require __DIR__.'/auth.php';