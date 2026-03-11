<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class MarketplaceHome extends Component
{
    public $selectedCategory = null;
    public $search = '';

    protected $queryString = [
        'selectedCategory' => ['except' => ''],
        'search' => ['except' => ''],
    ];

    public function selectCategory($id)
    {
        $this->selectedCategory = ($this->selectedCategory == $id) ? null : $id;
    }

    public function render()
    {
        $categories = Category::withCount('products')->get();
        
        $query = Product::with(['team', 'category', 'tiers'])
            ->where('status', 'active');

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $products = $query->latest()->get();

        return view('livewire.marketplace-home', [
            'categories' => $categories,
            'products' => $products
        ])->layout('layouts.marketplace');
    }
}
