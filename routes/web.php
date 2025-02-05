<?php

//CONTROLLER
use App\Http\Controllers\SettingController;

use Illuminate\Support\Facades\Route;

//GUEST
Route::get('/', function () {
    return view('welcome');
});

//USER ROUTE
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//ADMIN ROUTE

//SETTING
Route::middleware('auth')->group(function () {
    Route::get('/setting', [SettingController::class, 'edit'])->name('setting.edit');
    Route::patch('/setting', [SettingController::class, 'update'])->name('setting.update');
    Route::delete('/setting', [SettingController::class, 'destroy'])->name('setting.destroy');
});

require __DIR__.'/auth.php';
