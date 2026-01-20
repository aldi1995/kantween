<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WalletTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'type',        // topup | debit | credit
        'amount',
        'description',
        'status',      // pending | approved | rejected
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
