<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/signup', [SignupController::class, 'showForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

Route::get('/admin/users', [SignupController::class, 'adminUsers'])->name('admin.users');

Route::get('/admin/users/show/{id}', [SignupController::class, 'show'])->name('admin.users.show');

Route::get('/admin/users/edit/{id}', [SignupController::class, 'edit'])->name('admin.users.edit');
Route::post('/admin/users/update/{id}', [SignupController::class, 'update'])->name('admin.users.update');

Route::delete('/admin/users/delete/{id}', [SignupController::class, 'delete'])->name('admin.users.delete');
