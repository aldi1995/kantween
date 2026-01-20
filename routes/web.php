<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\BroadcastController;


use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => false, // ⛔ siswa tidak bisa register sendiri
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (ALL ROLES)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard (ALL ROLES)
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile (ALL ROLES)
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (MANAGEMENT)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |----------------------------------------------------------------------
        | Manajemen Siswa
        |----------------------------------------------------------------------
        */
        Route::get('/students', [StudentController::class, 'index'])
            ->name('students.index');

        /*
        |----------------------------------------------------------------------
        | Manajemen Tenant
        |----------------------------------------------------------------------
        */
        Route::get('/tenants', [TenantController::class, 'index'])
            ->name('tenants.index');

        /*
        |----------------------------------------------------------------------
        | Manajemen Menu
        |----------------------------------------------------------------------
        */
        Route::get('/menus', [MenuController::class, 'index'])
            ->name('menus.index');
    });

    /*
|--------------------------------------------------------------------------
| Admin Routes (TRANSAKSI)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |----------------------------------------------------------------------
        | Transaksi - Pesanan
        |----------------------------------------------------------------------
        */
        Route::get('/orders', [OrderController::class, 'index'])
            ->name('orders.index');

        /*
        |----------------------------------------------------------------------
        | Transaksi - Wallet & Top Up
        |----------------------------------------------------------------------
        */
        Route::get('/wallets', [WalletController::class, 'index'])
            ->name('wallets.index');

        /*
        |----------------------------------------------------------------------
        | Transaksi - Voucher
        |----------------------------------------------------------------------
        */
        Route::get('/vouchers', [VoucherController::class, 'index'])
            ->name('vouchers.index');
    });

    /*
|--------------------------------------------------------------------------
| Admin Routes (LAINNYA)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |----------------------------------------------------------------------
        | Laporan
        |----------------------------------------------------------------------
        */
        Route::get('/reports', [ReportController::class, 'index'])
            ->name('reports.index');

        /*
        |----------------------------------------------------------------------
        | Broadcast
        |----------------------------------------------------------------------
        */
        Route::get('/broadcasts', [BroadcastController::class, 'index'])
            ->name('broadcasts.index');
    });


/*
|--------------------------------------------------------------------------
| Authentication Routes (Laravel Breeze / Starter)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
