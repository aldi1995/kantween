<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KantinProduct extends Model
{
    protected $fillable = [
        'kantin_menu_id',
        'name',
        'category',
        'price',
        'stock',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function menu()
    {
        return $this->belongsTo(KantinMenu::class, 'kantin_menu_id');
    }
}
