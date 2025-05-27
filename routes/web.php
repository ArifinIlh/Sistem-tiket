<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');

Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');

Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');


Route::get('/admin/dashboard', [TicketController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/dashboard/edit/{ticket}', [TicketController::class, 'dashboardEdit'])->name('admin.dashboard.edit');


