<?php

namespace App\Http\Controllers;

use App\Models\KantinMenu;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KantinMenuController extends Controller
{
    public function index()
    {
        return Inertia::render('Kantin/MenuKantin', [
            'menus' => KantinMenu::withCount('products')
                ->orderBy('start_time')
                ->get()
                ->map(fn ($menu) => [
                    'id' => $menu->id,
                    'name' => $menu->name,
                    'start_time' => substr($menu->start_time, 0, 5),
                    'end_time' => substr($menu->end_time, 0, 5),
                    'product_count' => $menu->products_count,
                    'is_active' => $menu->is_active,
                ]),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        KantinMenu::create($request->all());

        return back();
    }

    public function update(Request $request, KantinMenu $menu)
    {
        $menu->update($request->only(['name','start_time','end_time']));
        return back();
    }

    public function toggle(KantinMenu $menu)
    {
        $menu->update([
            'is_active' => ! $menu->is_active
        ]);

        return back();
    }
}
