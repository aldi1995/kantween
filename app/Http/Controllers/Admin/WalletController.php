<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Inertia\Inertia;

class WalletController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Transaksi/Wallet/Index', [
            'wallets' => Wallet::with('user')->latest()->get(),
        ]);
    }
}
