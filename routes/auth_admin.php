<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Seller\CategoryController;
use App\Http\Controllers\Seller\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/{id}/show', [AdminController::class, 'show'])->name('admin_info.show');
    Route::get('/{id}/change-password', [AdminController::class, 'change_password'])->name('change.password');
    Route::patch('admin/{id}/change-password', [AdminController::class, 'password_update'])->name('update.password');
    Route::get('/{id}/screen_lock', [AdminController::class, 'screen_lock'])->name('screen.lock');
    Route::get('/{id}/profile', [AdminController::class, 'admin_profile'])->name('profile.info');
    Route::post('/update/profile', [AdminController::class, 'update_admin_profile'])->name('update.profile');
    Route::post('/logout', [AuthSessionController::class, 'admin_destroy'])->name('logout');
});

Route::resource('permission', PermissionController::class);
Route::resource('role', RoleController::class);
Route::resource('user', UserController::class);

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/{id}/permissions', [UserController::class, 'permissions'])->name('permissions');
    Route::put('/{id}/permissions-update', [UserController::class, 'permissions_update'])->name('permissions-update');
    Route::get('/{id}/status', [UserController::class, 'status'])->name('status');
    Route::get('/show', [UserController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'seller/products', 'as' => 'products.'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
});
Route::group(['prefix' => 'seller/categories', 'as' => 'categories.'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
});



