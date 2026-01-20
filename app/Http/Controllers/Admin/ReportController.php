<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ReportController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Laporan/Index', [
            'summary' => [
                'total_orders' => 0,
                'total_revenue' => 0,
                'total_topup' => 0,
            ],
        ]);
    }
}
