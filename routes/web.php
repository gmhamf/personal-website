<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;

Route::get('/convert', [CurrencyController::class, 'index'])->name('home');
Route::post('/convert', [CurrencyController::class, 'convert'])->name('convert');
Route::get('/com', function () {
    return view('come');
})->name('com');
Route::get('/', function () {
    return view('index');
})->name('index');
