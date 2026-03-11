<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTier extends Model
{
    protected $fillable = ['product_id', 'min_quantity', 'unit_price'];

    protected $casts = [
        'unit_price' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
