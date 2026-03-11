{{-- Product Detail Sidebar Content - used in both desktop sidebar and mobile inline --}}

<div style="padding:{{ $inSidebar ? '0' : '0' }}">
    <!-- Product Title & Price -->
    <div style="margin-bottom:20px">
        <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;margin-bottom:6px">
            <h1 style="font-size:1.35rem;font-weight:800;color:var(--color-text);letter-spacing:-.03em;line-height:1.25">{{ $product->name }}</h1>
        </div>
        <div style="display:flex;align-items:baseline;gap:8px;margin-bottom:4px">
            <span style="font-size:1.7rem;font-weight:800;color:var(--color-primary);letter-spacing:-.04em">${{ number_format($this->price, 2) }}</span>
            <span style="font-size:13px;color:var(--color-text-3)">per unit</span>
        </div>
        <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--color-text-3)">
            <svg fill="currentColor" viewBox="0 0 24 24" width="12" height="12"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
            {{ $product->team->name ?? 'AfricaMarket Vendor' }}
            @if($this->avg_rating > 0)
                <span style="color:var(--color-border)">·</span>
                <span style="color:var(--color-gold)">★</span>
                <span style="font-weight:600;color:var(--color-text-2)">{{ number_format($this->avg_rating, 1) }}</span>
                <span>({{ $this->review_count }})</span>
            @endif
        </div>
    </div>

    <!-- CTA Buttons -->
    <div style="display:flex;gap:8px;margin-bottom:20px">
        <button class="btn-secondary" style="flex:1;height:42px;font-size:13px">
            <svg fill="currentColor" viewBox="0 0 24 24" width="16" height="16"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"/></svg>
            Message Seller
        </button>
        <button class="btn-secondary" style="height:42px;padding:0 14px;font-size:13px">
            <svg fill="currentColor" viewBox="0 0 24 24" width="16" height="16"><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3z"/></svg>
        </button>
    </div>

    <!-- Divider -->
    <div style="height:1px;background:var(--color-border);margin-bottom:20px"></div>

    <!-- Bulk Pricing Calculator -->
    <div style="margin-bottom:20px">
        <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--color-text-3);margin-bottom:12px">Bulk Continental Pricing</p>

        <div class="am-pricing-box">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                <span style="font-size:13px;font-weight:600;color:var(--color-text-2)">Quantity</span>
                <div style="display:flex;align-items:center;gap:8px">
                    <button onclick="Livewire.dispatch('quantityChanged', {val: Math.max(1, {{ $quantity }} - 1)})" style="width:28px;height:28px;border-radius:8px;background:var(--color-surface);border:1.5px solid var(--color-border);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:700">−</button>
                    <input type="number" wire:model.live="quantity" min="1" style="width:60px;text-align:center;border:1.5px solid var(--color-border);border-radius:8px;height:32px;font-size:14px;font-weight:700;font-family:inherit;outline:none;color:var(--color-text)">
                    <button onclick="Livewire.dispatch('quantityChanged', {val: {{ $quantity }} + 1})" style="width:28px;height:28px;border-radius:8px;background:var(--color-surface);border:1.5px solid var(--color-border);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:700">+</button>
                </div>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;padding-top:12px;border-top:1px solid rgba(232,107,44,.15)">
                <span style="font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;color:var(--color-primary)">Escrow Total</span>
                <span style="font-size:1.4rem;font-weight:800;color:var(--color-primary);letter-spacing:-.04em">${{ number_format($this->price * $this->quantity, 2) }}</span>
            </div>
        </div>

        @if($product->tiers->count() > 0)
            <div style="space-y:8px">
                @foreach($product->tiers as $tier)
                    <div class="am-tier-row {{ $quantity >= $tier->min_quantity ? 'active' : '' }}">
                        <div>
                            <span style="font-weight:600">{{ $tier->min_quantity }}+ units</span>
                            @if($quantity >= $tier->min_quantity)
                                <span class="badge-success" style="margin-left:8px;font-size:9px">ACTIVE</span>
                            @endif
                        </div>
                        <span style="font-weight:800">${{ number_format($tier->unit_price, 2) }}<span style="font-size:11px;font-weight:500;opacity:.7">/unit</span></span>
                    </div>
                @endforeach
            </div>
        @endif

        <div style="display:flex;flex-direction:column;gap:8px;margin-top:16px">
            <button class="btn-primary" style="width:100%;height:46px">
                <svg fill="currentColor" viewBox="0 0 24 24" width="18" height="18"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                Place Order (Escrow)
            </button>
            @if($product->whatsapp_url)
            <a href="{{ $product->whatsapp_url }}" target="_blank" class="btn-green" style="width:100%;height:46px">
                <svg fill="currentColor" viewBox="0 0 24 24" width="18" height="18"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.417-.003 6.557-5.338 11.892-11.893 11.892-1.992-.001-3.951-.499-5.688-1.447l-6.305 1.65zm6.59-3.805c1.56.927 3.091 1.397 4.624 1.398 5.405 0 9.801-4.394 9.802-9.797 0-2.618-1.02-5.08-2.871-6.932-1.851-1.852-4.311-2.872-6.93-2.872-5.406 0-9.803 4.396-9.806 9.799 0 1.703.447 3.361 1.293 4.811l-1.014 3.701 3.793-.995z"/></svg>
                Negotiate on WhatsApp
            </a>
            @endif
        </div>
    </div>

    <!-- Divider -->
    <div style="height:1px;background:var(--color-border);margin-bottom:20px"></div>

    <!-- Seller Info -->
    <div style="margin-bottom:20px">
        <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--color-text-3);margin-bottom:12px">Seller Information</p>
        <div style="display:flex;align-items:center;gap:12px;padding:14px;background:var(--color-surface-2);border-radius:12px;border:1px solid var(--color-border)">
            <div class="am-avatar" style="font-size:18px;width:44px;height:44px">{{ substr($product->team->name ?? 'V', 0, 1) }}</div>
            <div>
                <p style="font-size:15px;font-weight:700;color:var(--color-text)">{{ $product->team->name ?? 'Verified Vendor' }}</p>
                <div style="display:flex;align-items:center;gap:4px;margin-top:2px">
                    <svg fill="currentColor" viewBox="0 0 24 24" width="12" height="12" style="color:var(--color-secondary)"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                    <span style="font-size:11px;font-weight:600;color:var(--color-secondary)">Verified Continental Vendor</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Description -->
    <div style="margin-bottom:20px">
        <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--color-text-3);margin-bottom:12px">Product Description</p>
        <p style="font-size:14px;line-height:1.7;color:var(--color-text-2)">{{ $product->description }}</p>
    </div>

    <!-- Divider -->
    <div style="height:1px;background:var(--color-border);margin-bottom:20px"></div>

    <!-- Reviews -->
    <div>
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px">
            <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--color-text-3)">Ratings & Reviews</p>
            @if($this->avg_rating > 0)
                <div style="display:flex;align-items:center;gap:4px;padding:4px 10px;background:var(--color-gold-light);border-radius:8px">
                    <span style="color:var(--color-gold);font-size:14px">★</span>
                    <span style="font-size:13px;font-weight:800;color:#B87A00">{{ number_format($this->avg_rating, 1) }}</span>
                    <span style="font-size:11px;color:#B87A00;opacity:.7">({{ $this->review_count }})</span>
                </div>
            @endif
        </div>

        @forelse($product->reviews as $review)
            <div class="am-review-card">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px">
                    <div class="am-avatar">{{ substr($review->user->name, 0, 1) }}</div>
                    <div>
                        <p style="font-size:13px;font-weight:700;color:var(--color-text)">{{ $review->user->name }}</p>
                        <div style="display:flex;gap:2px;margin-top:2px">
                            @for($i = 1; $i <= 5; $i++)
                                <span style="font-size:11px;color:{{ $i <= $review->rating ? 'var(--color-gold)' : 'var(--color-border)' }}">★</span>
                            @endfor
                        </div>
                    </div>
                </div>
                <p style="font-size:13px;line-height:1.6;color:var(--color-text-2)">{{ $review->comment }}</p>
            </div>
        @empty
            <div style="text-align:center;padding:24px;background:var(--color-surface-2);border-radius:12px;border:1.5px dashed var(--color-border)">
                <p style="font-size:24px;margin-bottom:8px">⭐</p>
                <p style="font-size:13px;color:var(--color-text-3)">No reviews yet. Be the first!</p>
            </div>
        @endforelse

        <button class="btn-secondary" style="width:100%;height:40px;margin-top:12px;font-size:13px">Write a Review</button>
    </div>
</div>
