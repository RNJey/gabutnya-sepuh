<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\HallOfFameController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('home');
});

// Route untuk Guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'processRegister']);
});

// Route untuk member (login required)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Route Khusus Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
// Route CRUD Hall of Fame
    Route::get('/hall-of-fame', [HallOfFameController::class, 'index'])->name('admin.hall_of_fame.index');
    Route::get('/hall-of-fame/create', [HallOfFameController::class, 'create'])->name('admin.hall_of_fame.create');
    Route::post('/hall-of-fame', [HallOfFameController::class, 'store'])->name('admin.hall_of_fame.store');
    Route::delete('/hall-of-fame/{id}', [HallOfFameController::class, 'destroy'])->name('admin.hall_of_fame.destroy');
});

// Route Publik
Route::get('/hall-of-fame', [PageController::class, 'hallOfFame'])->name('hall_of_fame');