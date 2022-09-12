<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DeviceQueryController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

// Main Routes

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cihaz-sorgula', [DeviceQueryController::class, 'index'])->name('get_devices_index');
Route::post('/cihaz-sorgula', [DeviceQueryController::class, 'get_devices'])->name('get_devices');

// Admin Routes

Route::prefix('admin/giris-yap')->controller(LoginController::class)->middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/', 'index')->name('admin.login.index');
    Route::post('/', 'login')->name('admin.login.post');
});

Route::prefix('admin')->middleware(Authenticate::class)->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/cikis-yap', [LoginController::class, 'logout'])->name('admin.logout');
    Route::prefix('musteriler')->controller(CustomerController::class)->group(function () {
        Route::get('/', 'index')->name('admin.customer.index');
        Route::get('/olustur', 'new')->name('admin.customer.new');
        Route::post('/olustur', 'new_post')->name('admin.customer.new_post');
        Route::get('/duzenle/{id}', 'edit')->name('admin.customer.edit');
        Route::post('/duzenle/{id}', 'edit_post')->name('admin.customer.edit_post');
        Route::get('/goster/{id}', 'show')->name('admin.customer.show');
        Route::get('/sil/{id}', 'delete')->name('admin.customer.delete');
    });
    Route::prefix('cihazlar')->controller(DeviceController::class)->group(function () {
        Route::get('/', 'index')->name('admin.device.index');
        Route::get('/goster/{id}', 'show')->name('admin.device.show');
        Route::post('/goster/{id}/log', 'new_log_post')->name('admin.device.new_log_post');
        Route::post('/goster/{id}/status', 'change_status')->name('admin.device.change_device_status');
        Route::get('/olustur', 'select_customer')->name('admin.device.select_customer');
        Route::get('/olustur/{id}', 'new')->name('admin.device.new');
        Route::post('/olustur/{id}', 'new_post')->name('admin.device.new_post');
        Route::get('/sil/{id}', 'delete')->name('admin.device.delete');
    });
});
