<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Inertia\Inertia;

class VoucherController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Transaksi/Voucher/Index', [
            'vouchers' => Voucher::latest()->get(),
        ]);
    }
}
