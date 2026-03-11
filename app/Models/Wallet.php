<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['user_id', 'pending_balance', 'available_balance'];

    protected $casts = [
        'pending_balance' => 'decimal:2',
        'available_balance' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
