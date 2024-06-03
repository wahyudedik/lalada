<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//user route
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
});

//admin route
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    //dashboard Product
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //category
    Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('admin/category/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::get('admin/category/{category}/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('admin/category/{category}/destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    //transaction
    // Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category');
});