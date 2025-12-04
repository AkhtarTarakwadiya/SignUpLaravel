<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AdminAuthController;
use App\Models\Admin;
use App\Models\UserDetail;


// =============================
// Public Routes
// =============================
Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [SignupController::class, 'showForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');


// =============================
// One-Time Admin Setup
// =============================
Route::get('/setup-admin', function() {
    if (Admin::count() === 0) {
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123')
        ]);
        return "Admin created!";
    }
    return "Admin already exists.";
});


// =============================
// Admin Routes
// =============================
Route::prefix('admin')->group(function () {

    // Login Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

    // Removed middleware - all routes are now accessible without authentication
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('/users', [SignupController::class, 'adminUsers'])->name('admin.users');
    Route::get('/users/show/{id}', [SignupController::class, 'show'])->name('admin.users.show');
    Route::get('/users/edit/{id}', [SignupController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/update/{id}', [SignupController::class, 'update'])->name('admin.users.update');

    Route::post('/users/approve/{id}', [SignupController::class, 'approve'])->name('admin.users.approve');
    Route::post('/users/reject/{id}', [SignupController::class, 'reject'])->name('admin.users.reject');

    Route::delete('/users/delete/{id}', [SignupController::class, 'delete'])->name('admin.users.delete');
});
