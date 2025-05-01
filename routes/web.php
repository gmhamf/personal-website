<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\TaskController;

// الصفحات الثابتة
Route::view('/', 'index')->name('home');
Route::view('/com', 'com')->name('com');

// تحويل العملات
Route::prefix('convert')->group(function () {
    Route::get('/', [CurrencyController::class, 'index'])->name('currency.index');
    Route::post('/', [CurrencyController::class, 'convert'])->name('currency.convert');
});

Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
    Route::put('/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});
