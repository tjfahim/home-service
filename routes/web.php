<?php

use App\Http\Controllers\Admin\AirconPageController;
use App\Http\Controllers\Admin\BookingManageController;
use App\Http\Controllers\Admin\BrandImageController;
use App\Http\Controllers\Admin\CivilPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ElectricalPageController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HvacPageController;
use App\Http\Controllers\Admin\PlumbingPageController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
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


Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/category-details/{id}', [FrontendController::class, 'categorydetails'])->name('category.details');
Route::get('/service-booking/{id}', [FrontendController::class, 'booking'])->name('service.booking');
Route::get('/book-online/{id?}', [FrontendController::class, 'allservice'])->name('allservice');
Route::post('/booking-store', [FrontendController::class, 'bookingstore'])->name('booking.store');
Route::get('/hvac-installation', [FrontendController::class, 'hvacpage'])->name('hvacpage');
Route::get('/civil-work', [FrontendController::class, 'civilpage'])->name('civilpage');
Route::get('/aircon-repair', [FrontendController::class, 'airconpage'])->name('airconpage');
Route::get('/electrical', [FrontendController::class, 'electricalpage'])->name('electricalpage');
Route::get('/plumbing', [FrontendController::class, 'plumbingpage'])->name('plumbingpage');
Route::get('/adminpage', [AuthController::class, 'showLoginFrom'])->name('login');
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


    Route::get('/home-content/edit', [HomeController::class, 'edit'])->name('home-content.edit');
Route::put('/home-content', [HomeController::class, 'update'])->name('home-content.update');
Route::get('settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings/update', [SettingController::class, 'update'])->name('settings.update');

    Route::get('brand-images', [BrandImageController::class, 'index'])->name('brandimage.index');
    Route::get('brand-images/create', [BrandImageController::class, 'create'])->name('brandimage.create');
    Route::post('brand-images', [BrandImageController::class, 'store'])->name('brandimage.store');
    Route::get('brand-images/{id}/edit', [BrandImageController::class, 'edit'])->name('brandimage.edit');
    Route::put('brand-images/{id}', [BrandImageController::class, 'update'])->name('brandimage.update');
    Route::delete('brand-images/{id}', [BrandImageController::class, 'destroy'])->name('brandimage.destroy');


    Route::get('/hvacpage/edit', [HvacPageController::class, 'edit'])->name('hvacpage.edit');
    Route::put('/hvacpage/update', [HVACPageController::class, 'update'])->name('hvacpage.update');
    Route::get('/civilpage/edit', [CivilPageController::class, 'edit'])->name('civilpage.edit');
    Route::put('/civilpage/update', [CivilPageController::class, 'update'])->name('civilpage.update');
    Route::get('/electricalpage/edit', [ElectricalPageController::class, 'edit'])->name('electricalpage.edit');
    Route::put('/electricalpage/update', [ElectricalPageController::class, 'update'])->name('electricalpage.update');
    Route::get('/aircon/edit', [AirconPageController::class, 'edit'])->name('airconpage.edit');
    Route::put('/aircon/update', [AirconPageController::class, 'update'])->name('airconpage.update');
    Route::get('/plumbing/edit', [PlumbingPageController::class, 'edit'])->name('plumbingpage.edit');
    Route::put('/plumbing/update', [PlumbingPageController::class, 'update'])->name('plumbingpage.update');


    Route::get('bookingmanage/{status?}', [BookingManageController::class, 'index'])->name('bookingmanage.index');
    Route::get('bookingmanage/{id}', [BookingManageController::class, 'show'])->name('bookingmanage.show');
    Route::get('bookingmanage/{id}/edit', [BookingManageController::class, 'edit'])->name('bookingmanage.edit');
    Route::put('bookingmanage/{id}', [BookingManageController::class, 'update'])->name('bookingmanage.update');
    Route::delete('bookingmanage/{id}', [BookingManageController::class, 'destroy'])->name('bookingmanage.destroy');


});