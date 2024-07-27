<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RequestsController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/login');
});

Route::middleware(['auth', config('jetstream.auth_session')])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UsersController::class)->except('show');
    Route::resource('requests', RequestsController::class)->except(['edit', 'update']);
    Route::delete('/requests/{id}', [RequestsController::class, 'destroy'])->name('requests.destroy');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile-delete', [ProfileController::class, 'delete_profile'])->name('profile.delete');
});
