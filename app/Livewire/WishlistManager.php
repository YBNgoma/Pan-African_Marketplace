<?php

namespace App\Livewire;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishlistManager extends Component
{
    public function removeFromWishlist($wishlistId)
    {
        Wishlist::where('id', $wishlistId)->where('user_id', Auth::id())->delete();
        $this->dispatch('wishlist-updated');
    }

    public function render()
    {
        $wishlistItems = Wishlist::with(['product.team', 'product.category'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('livewire.wishlist-manager', [
            'wishlistItems' => $wishlistItems
        ])->layout('layouts.marketplace');
    }
}
