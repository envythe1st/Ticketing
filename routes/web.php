<?php

//CONTROLLER

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

//GUEST
Route::get('/', function () {
    return view('welcome');
});


//USER ROUTE
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('home', [TicketController::class, 'index'])->name('user.ticket');


// ADMIN ROUTE
Route::middleware(['auth', 'admin'])->group(function () {
    //Dashboard
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //TICKET
    Route::get('admin/ticket', [TicketController::class, 'index'])->name('admin.ticket.index');

    //CREATE
    Route::get('admin/ticket/create', [TicketController::class, 'create'])->name('admin.ticket.create');
    Route::post('admin/ticket/store', [TicketController::class, 'store'])->name('admin.ticket.store');

    //UPDATE
    Route::get('admin/ticket/edit/{id}', [TicketController::class, 'edit'])->name('admin.ticket.edit');
    Route::put('admin/ticket/update/{id}', [TicketController::class, 'update'])->name('admin.ticket.update');

    //DELETE
    Route::delete('admin/ticket/delete/{id}', [TicketController::class, 'delete'])->name('admin.ticket.delete');
});


//PROFILE
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

//SETTING
Route::middleware('auth')->group(function () {
    Route::get('/setting', [SettingController::class, 'edit'])->name('setting.edit');
    Route::patch('/setting', [SettingController::class, 'update'])->name('setting.update');
    Route::delete('/setting', [SettingController::class, 'destroy'])->name('setting.destroy');
});

require __DIR__.'/auth.php';
