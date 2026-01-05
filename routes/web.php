<?php

// Contoh Route sederhana di web.php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Grouping biar rapi, nanti tinggal pasang middleware di sini
Route::prefix('dashboard')->group(function () {
    
    Route::get('/dosen', function () {
        return view('dashboard.dosen'); // Mengarah ke file dosen.blade.php
    })->name('dashboard.dosen');

    Route::get('/operator', function () {
        return view('dashboard.operator');
    })->name('dashboard.operator');

    Route::get('/wadek', function () {
        return view('dashboard.wadek');
    })->name('dashboard.wadek');

    Route::get('/dekan', function () {
        return view('dashboard.dekan');
    })->name('dashboard.dekan');
});