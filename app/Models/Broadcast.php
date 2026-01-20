<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Broadcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'target_role',
    ];
}
