<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KantinMenu extends Model
{
    protected $fillable = [
        'name',
        'start_time',
        'end_time',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function products()
    {
        return $this->hasMany(KantinProduct::class);
    }
}
