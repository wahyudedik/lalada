<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ProductController;

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
    Route::get('/admin/dashboard/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/dashboard/create', [ProductController::class, 'store'])->name('admin.product.store');

    //category
    Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('admin/category/create', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('admin/category/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('admin/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    //transaction
    // Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category');
});
