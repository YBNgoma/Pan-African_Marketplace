<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $quantity = 1;

    public function mount($slug)
    {
        $this->product = Product::with(['team', 'category', 'tiers', 'reviews.user'])->where('slug', $slug)->firstOrFail();
    }

    public function getAvgRatingProperty()
    {
        return $this->product->reviews->avg('rating') ?? 0;
    }

    public function getReviewCountProperty()
    {
        return $this->product->reviews->count();
    }

    public function getPriceProperty()
    {
        $price = $this->product->unit_price;

        foreach ($this->product->tiers->sortByDesc('min_quantity') as $tier) {
            if ($this->quantity >= $tier->min_quantity) {
                $price = $tier->unit_price;
                break;
            }
        }

        return $price;
    }

    public function render()
    {
        return view('livewire.product-detail')->layout('layouts.marketplace');
    }
}
