<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'type',
        'amount',
        'expired_at',
        'is_active',
    ];

    protected $casts = [
        'expired_at' => 'date',
        'is_active' => 'boolean',
    ];

    public function studentVouchers(): HasMany
    {
        return $this->hasMany(StudentVoucher::class);
    }
}
