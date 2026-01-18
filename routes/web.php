<?php

use App\Http\Controllers\ProfileController;
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
| Authenticated Routes (UI ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // ======================
    // PROFILE
    // ======================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ======================
    // KANTIN
    // ======================
    Route::get('/kantin/menu', fn () =>
        Inertia::render('Kantin/MenuKantin')
    );

    Route::get('/kantin/produk', fn () =>
        Inertia::render('Kantin/Produk')
    );

    Route::get('/kantin/stok-status', fn () =>
        Inertia::render('Kantin/StokStatus')
    );

    // ======================
    // VOUCHER
    // ======================
Route::get('/voucher/aktif', fn () =>
    Inertia::render('Voucher/VoucherAktif')
);

Route::get('/voucher/expired', fn () =>
    Inertia::render('Voucher/VoucherExpired')
);

Route::get('/voucher/distribusi', fn () =>
    Inertia::render('Voucher/DistribusiVoucher')
);

// ======================
// KEUANGAN
// ======================
Route::get('/keuangan/saldo-siswa', fn () =>
    Inertia::render('Keuangan/SaldoSiswa')
);

Route::get('/keuangan/top-up', fn () =>
    Inertia::render('Keuangan/TopUp')
);

Route::get('/keuangan/penyesuaian-saldo', fn () =>
    Inertia::render('Keuangan/PenyesuaianSaldo')
);

// ======================
// LAPORAN
// ======================
Route::get('/laporan/harian', fn () =>
    Inertia::render('Laporan/Harian')
);

Route::get('/laporan/bulanan', fn () =>
    Inertia::render('Laporan/Bulanan')
);

// ======================
// SISTEM
// ======================
Route::get('/sistem/pengaturan', fn () =>
    Inertia::render('Sistem/Pengaturan')
);

Route::get('/sistem/audit-log', fn () =>
    Inertia::render('Sistem/AuditLog')
);




});

require __DIR__.'/auth.php';
