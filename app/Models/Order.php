<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'team_id',
        'total_amount',
        'stripe_payment_intent_id',
        'status',
        'shipping_status',
    ];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
