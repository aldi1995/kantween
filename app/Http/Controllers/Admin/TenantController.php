<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Inertia\Inertia;

class TenantController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Tenant/Index', [
            'tenants' => Tenant::latest()->get(),
        ]);
    }
}
