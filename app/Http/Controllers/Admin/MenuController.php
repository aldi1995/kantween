<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Inertia\Inertia;

class MenuController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Menu/Index', [
            'menus' => Menu::with('tenant')->latest()->get(),
        ]);
    }
}
