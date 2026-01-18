<?php

namespace App\Http\Controllers;

use App\Models\KantinProduct;
use App\Models\KantinMenu;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KantinProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Kantin/Produk', [
            'products' => KantinProduct::with('menu')->get(),
            'menus' => KantinMenu::select('id','name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kantin_menu_id' => 'required',
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        KantinProduct::create($request->all());
        return back();
    }

    public function update(Request $request, KantinProduct $product)
    {
        $product->update($request->all());
        return back();
    }

    public function toggle(KantinProduct $product)
    {
        $product->update([
            'is_active' => ! $product->is_active
        ]);

        return back();
    }
}
