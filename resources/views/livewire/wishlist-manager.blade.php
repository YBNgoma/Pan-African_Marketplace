<div style="background:var(--color-bg);min-height:100vh">
    <div class="am-page-content">
        <!-- Header -->
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:28px">
            <a href="/marketplace" style="width:40px;height:40px;border-radius:12px;background:var(--color-surface);border:1.5px solid var(--color-border);display:flex;align-items:center;justify-content:center;color:var(--color-text-2);text-decoration:none;transition:var(--transition-base)" onmouseenter="this.style.borderColor='var(--color-primary)';this.style.color='var(--color-primary)'" onmouseleave="this.style.borderColor='var(--color-border)';this.style.color='var(--color-text-2)'">
                <svg fill="currentColor" viewBox="0 0 24 24" width="20" height="20"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
            </a>
            <div>
                <h1 style="font-size:1.5rem;font-weight:800;color:var(--color-text);letter-spacing:-.03em">Saved Items</h1>
                <p style="font-size:13px;color:var(--color-text-3)">{{ $wishlistItems->count() }} saved listings</p>
            </div>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 animate-stagger">
            @forelse($wishlistItems as $item)
                @php
                    $gradients = [['#3B1F0A','#6B3A1A'],['#1E3B24','#2D5E36'],['#1A2B3B','#2B4A63']];
                    $grad = $gradients[$loop->index % count($gradients)];
                    $emoji = in_array(optional($item->product->category)->slug, ['textiles-apparel']) ? '🧵' : (in_array(optional($item->product->category)->slug, ['agriculture-food']) ? '🌿' : '📦');
                @endphp
                <div class="am-card">
                    <a href="{{ route('product.detail', $item->product->slug) }}" style="display:contents">
                        <div class="am-card-image">
                            <div class="am-card-placeholder" style="background:linear-gradient(135deg, {{ $grad[0] }} 0%, {{ $grad[1] }} 100%)">
                                <div style="text-align:center"><div style="font-size:48px;opacity:.6">{{ $emoji }}</div></div>
                            </div>
                        </div>
                        <div class="am-card-info">
                            <p class="am-price">${{ number_format($item->product->unit_price, 2) }}</p>
                            <p class="am-product-name">{{ $item->product->name }}</p>
                            <p class="am-product-location">
                                <svg fill="currentColor" viewBox="0 0 24 24" width="10" height="10"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
                                {{ $item->product->team->name ?? 'Africa' }}
                            </p>
                        </div>
                    </a>
                    <div style="padding:0 12px 12px">
                        <button wire:click="removeFromWishlist({{ $item->id }})" class="btn-secondary" style="width:100%;height:36px;font-size:12px;color:var(--color-danger);border-color:rgba(217,79,61,.2)">
                            <svg fill="currentColor" viewBox="0 0 24 24" width="14" height="14"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                            Remove
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full" style="display:flex;flex-direction:column;align-items:center;justify-content:center;padding:80px 20px;background:var(--color-surface);border-radius:20px;border:1.5px dashed var(--color-border);text-align:center">
                    <div style="font-size:64px;margin-bottom:16px">❤️</div>
                    <p style="font-size:1.1rem;font-weight:800;color:var(--color-text);margin-bottom:8px">Nothing saved yet</p>
                    <p style="font-size:14px;color:var(--color-text-3);margin-bottom:24px;max-width:300px">Tap the heart on any listing to save it for later.</p>
                    <a href="/marketplace" class="btn-primary">Explore the Marketplace</a>
                </div>
            @endforelse
        </div>
    </div>
</div>
