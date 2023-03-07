<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\TicketController;


// for frontend

use App\Http\Controllers\Frontend\FrontendController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'index']);

Route::prefix('admin')->middleware(['auth', 'verified', 'isAdmin'])->group(function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    Route::resource('bus', BusController::class);
    Route::resource('route', RouteController::class);
    Route::resource('ticket', TicketController::class);
});


require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/tickets', [App\Http\Controllers\Frontend\TicketController::class, 'index']);
    Route::post('/tickets/show', [App\Http\Controllers\Frontend\TicketController::class, 'show']);
    Route::get('/tickets/book/', [App\Http\Controllers\Frontend\TicketController::class, 'book']);
});
