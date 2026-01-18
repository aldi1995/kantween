<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KantinMenuController;
use App\Http\Controllers\KantinProductController;
use App\Http\Controllers\KantinStockController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | KANTIN (UI + DATA)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth','verified'])->prefix('kantin')->group(function () {

    // MENU
    Route::get('/menu', [KantinMenuController::class, 'index']);
    Route::post('/menu', [KantinMenuController::class, 'store']);
    Route::put('/menu/{menu}', [KantinMenuController::class, 'update']);
    Route::patch('/menu/{menu}/toggle', [KantinMenuController::class, 'toggle']);

    // PRODUK
    Route::get('/produk', [KantinProductController::class, 'index']);
    Route::post('/produk', [KantinProductController::class, 'store']);
    Route::put('/produk/{product}', [KantinProductController::class, 'update']);
    Route::patch('/produk/{product}/toggle', [KantinProductController::class, 'toggle']);

    // STOK
    Route::get('/stok-status', [KantinStockController::class, 'index']);
    Route::patch('/stok-status/{product}', [KantinStockController::class, 'updateStock']);
});


    /*
    |--------------------------------------------------------------------------
    | VOUCHER
    |--------------------------------------------------------------------------
    */
    Route::get('/voucher/aktif', fn () => Inertia::render('Voucher/VoucherAktif'));
    Route::get('/voucher/expired', fn () => Inertia::render('Voucher/VoucherExpired'));
    Route::get('/voucher/distribusi', fn () => Inertia::render('Voucher/DistribusiVoucher'));

    /*
    |--------------------------------------------------------------------------
    | KEUANGAN
    |--------------------------------------------------------------------------
    */
    Route::get('/keuangan/saldo-siswa', fn () => Inertia::render('Keuangan/SaldoSiswa'));
    Route::get('/keuangan/top-up', fn () => Inertia::render('Keuangan/TopUp'));
    Route::get('/keuangan/penyesuaian-saldo', fn () => Inertia::render('Keuangan/PenyesuaianSaldo'));

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */
    Route::get('/laporan/harian', fn () => Inertia::render('Laporan/Harian'));
    Route::get('/laporan/bulanan', fn () => Inertia::render('Laporan/Bulanan'));

    /*
    |--------------------------------------------------------------------------
    | SISTEM
    |--------------------------------------------------------------------------
    */
    Route::get('/sistem/pengaturan', fn () => Inertia::render('Sistem/Pengaturan'));
    Route::get('/sistem/audit-log', fn () => Inertia::render('Sistem/AuditLog'));
});

require __DIR__.'/auth.php';
