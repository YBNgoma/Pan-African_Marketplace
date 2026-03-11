<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderTracking extends Component
{
    public function render()
    {
        $orders = Order::with(['vendor'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('livewire.order-tracking', [
            'orders' => $orders
        ])->layout('layouts.marketplace');
    }
}
