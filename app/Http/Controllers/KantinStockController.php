<?php

namespace App\Http\Controllers;

use App\Models\KantinProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KantinStockController extends Controller
{
    public function index()
    {
        return Inertia::render('Kantin/StokStatus', [
            'products' => KantinProduct::all(),
        ]);
    }

    public function updateStock(Request $request, KantinProduct $product)
    {
        $request->validate([
            'stock' => 'required|numeric',
        ]);

        $product->update([
            'stock' => $request->stock
        ]);

        return back();
    }
}
