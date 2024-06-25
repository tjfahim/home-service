<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\AuthController;
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


Route::get('/', [AuthController::class, 'showLoginFrom'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterFrom'])->name('register');
Route::post('/register-submit', [AuthController::class, 'registerSubmit'])->name('register.submit');

Route::group(['middleware' => 'role:2', 'prefix' => 'admin'], function () {
    Route::get('/profile', [AuthController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [AuthController::class, 'changePassword'])->name('profile.changePassword');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');



        
    Route::get('service-categories', [ServiceCategoryController::class, 'index'])->name('service.category.index');
    Route::get('service-categories/create', [ServiceCategoryController::class, 'create'])->name('service.category.create');
    Route::post('service-categories', [ServiceCategoryController::class, 'store'])->name('service.category.store');
    Route::get('service-categories/{serviceCategory}/edit', [ServiceCategoryController::class, 'edit'])->name('service.category.edit');
    Route::put('service-categories/{serviceCategory}', [ServiceCategoryController::class, 'update'])->name('service.category.update');
    Route::delete('service-categories/{serviceCategory}', [ServiceCategoryController::class, 'destroy'])->name('service.category.destroy');



    Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/services/{id}/update', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/services/{id}/delete', [ServiceController::class, 'destroy'])->name('service.destroy');
});