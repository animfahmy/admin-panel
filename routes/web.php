<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/flight', [FlightController::class, 'index'])->name('flight.index');
    Route::get('/flight-create', [FlightController::class, 'create'])->name('flight.create');
    Route::post('/flight', [FlightController::class, 'save'])->name('flight.save');
    Route::get('/flight/{id}', [FlightController::class, 'show'])->name('flight.show');
    Route::put('/flight-update/{id}', [FlightController::class, 'update'])->name('flight.update');
    Route::delete('/flight/{id}', [FlightController::class, 'destroy'])->name('flight.destroy');
});

require __DIR__.'/auth.php';
