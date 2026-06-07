<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;

Route::get('/', function () {
    return view('index');
})->name('home');
Route::post('/submit-quote', [QuoteController::class, 'store'])->name('quote.submit');