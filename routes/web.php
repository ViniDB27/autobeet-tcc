<?php

use App\Http\Controllers\DiagnosisController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/history', [DiagnosisController::class, 'index'])->name('history.index');
Route::post('/history', [DiagnosisController::class, 'store'])->name('history.store');
