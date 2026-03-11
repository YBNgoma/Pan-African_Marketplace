<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/marketplace', \App\Livewire\MarketplaceHome::class)->name('marketplace');
Route::get('/product/{slug}', \App\Livewire\ProductDetail::class)->name('product.detail');
Route::get('/wishlist', App\Livewire\WishlistManager::class)->middleware(['auth'])->name('wishlist');
Route::get('/orders', App\Livewire\OrderTracking::class)->middleware(['auth'])->name('orders');
Route::get('/vendor/kyc', App\Livewire\VendorKyc::class)->middleware(['auth'])->name('vendor.kyc');
