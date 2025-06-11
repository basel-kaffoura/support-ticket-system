<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tickets.create');
});

// Create a new ticket
Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets/store', [TicketController::class, 'store'])->name('tickets.store');

// Trying to log in as an admin
Route::middleware('guest')->group(function () {
    Route::get('login', [AdminController::class, 'create'])->name('login');
    Route::post('login', [AdminController::class, 'store']);
});

// Admin routes
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/tickets/{connection}/{id}', [AdminController::class, 'viewTicket'])->name('ticket.view');
    Route::post('/tickets/{connection}/{id}/note/update', [AdminController::class, 'updateAdminNote'])->name('ticket.note.update');
    Route::post('logout', [AdminController::class, 'destroy'])->name('logout');
});
