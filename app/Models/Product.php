<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'team_id',
        'category_id',
        'name',
        'slug',
        'description',
        'unit_price',
        'stock_quantity',
        'images',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'unit_price' => 'decimal:2',
    ];

    public function team()
    {
        return $this->belongsTo(\Laravel\Jetstream\Jetstream::teamModel());
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tiers()
    {
        return $this->hasMany(ProductTier::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getWhatsAppUrlAttribute()
    {
        $vendorPhone = $this->team->owner->phone ?? ''; // Assuming phone field in User
        $message = urlencode("Hi, I'm interested in your product: " . $this->name . " (Price: $" . $this->unit_price . ")");
        return "https://wa.me/{$vendorPhone}?text={$message}";
    }
}
