<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Transaksi/Pesanan/Index', [
            'orders' => Order::latest()->get(),
        ]);
    }
}
