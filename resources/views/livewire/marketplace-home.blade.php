<div class="flex flex-1 w-full overflow-hidden" style="background:var(--color-bg)">
    <!-- ===== Left Sidebar ===== -->
    <aside class="am-sidebar hidden lg:block">
        <h1 class="am-sidebar-title">Marketplace</h1>

        <a href="{{ route('vendor.kyc') }}" class="am-sell-btn">
            <svg fill="currentColor" viewBox="0 0 20 20" width="16" height="16"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 9H9V7h2v4zm0-6H9V3h2v2z"/></svg>
            Start Selling
        </a>

        <!-- Mobile Search (visible only on md and below) -->
        <div class="am-search mb-4 lg:hidden">
            <svg fill="currentColor" viewBox="0 0 16 16" width="16" height="16" style="color:var(--color-text-3);flex-shrink:0"><path d="M11.5 7a4.499 4.499 0 11-8.998 0A4.499 4.499 0 0111.5 7zm.82 4.746a6 6 0 10-1.277 1.277l3.171 3.171a1 1 0 101.414-1.414l-3.308-3.308z"/></svg>
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search…">
        </div>

        <!-- Category Nav -->
        <div class="space-y-1 mt-2">
            <button wire:click="$set('selectedCategory', null)"
                class="am-category-btn {{ is_null($selectedCategory) ? 'active' : '' }}">
                <div class="am-category-icon" style="{{ is_null($selectedCategory) ? 'background:var(--color-primary);color:#fff' : '' }}">
                    🛒
                </div>
                <span>All Products</span>
                <span style="margin-left:auto;font-size:11px;color:var(--color-text-3);font-weight:600">{{ $products->count() }}</span>
            </button>
        </div>

        <div style="height:1px;background:var(--color-border);margin:16px 0"></div>
        <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--color-text-3);padding:0 12px 8px">Categories</p>

        <div class="space-y-1">
            @foreach($categories as $category)
                <button wire:click="selectCategory({{ $category->id }})"
                    class="am-category-btn {{ $selectedCategory == $category->id ? 'active' : '' }}">
                    <div class="am-category-icon" style="{{ $selectedCategory == $category->id ? 'background:var(--color-primary);color:#fff' : '' }}">
                        {{ in_array($category->slug, ['textiles-apparel']) ? '🧵' : (in_array($category->slug, ['agriculture-food']) ? '🌿' : (in_array($category->slug, ['electronics']) ? '⚡' : '🏺')) }}
                    </div>
                    <span>{{ $category->name }}</span>
                </button>
            @endforeach
        </div>

        <div style="height:1px;background:var(--color-border);margin:16px 0"></div>

        <!-- Location Filter -->
        <div style="padding:0 12px">
            <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--color-text-3);margin-bottom:8px">Location</p>
            <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:var(--color-primary);font-weight:600;cursor:pointer">
                <svg fill="currentColor" viewBox="0 0 24 24" width="16" height="16"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                Africa-wide
                <svg fill="currentColor" viewBox="0 0 20 20" width="12" height="12" style="margin-left:auto;color:var(--color-text-3)"><path d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z"/></svg>
            </div>
        </div>
    </aside>

    <!-- ===== Main Content ===== -->
    <main class="flex-1 overflow-y-auto" style="padding:24px 20px;background:var(--color-bg)">
        <div class="max-w-[1200px] mx-auto">

            <!-- Hero Banner -->
            <div class="am-hero-banner animate-in" style="margin-bottom:28px">
                <div style="position:relative;z-index:1">
                    <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:rgba(245,166,35,.8);margin-bottom:8px">🌍 Pan-African Trade Platform</p>
                    <h2 style="font-size:1.6rem;font-weight:800;color:#fff;letter-spacing:-.03em;line-height:1.2;margin-bottom:8px">
                        Trade without borders.<br>Buy, sell, grow – <span style="color:var(--color-gold)">together.</span>
                    </h2>
                    <p style="font-size:13px;color:rgba(255,255,255,.6);margin-bottom:16px">Connecting buyers and verified vendors across 54 nations.</p>
                    <div style="display:flex;gap:8px;flex-wrap:wrap">
                        <a href="{{ route('vendor.kyc') }}" class="btn-primary" style="height:38px;font-size:13px;padding:0 16px;box-shadow:0 4px 20px rgba(232,107,44,.4)">Start Selling Today</a>
                        <button class="btn-secondary" style="height:38px;font-size:13px;padding:0 16px;background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.15);color:#fff">How it works</button>
                    </div>
                </div>
            </div>

            <!-- Section Header -->
            <div class="am-section-header">
                <h2 class="am-section-title">
                    {{ $selectedCategory ? 'Filtered Products' : "Today's Picks" }}
                </h2>
                <div style="display:flex;align-items:center;gap:8px">
                    <!-- Search on md and larger (same as header but inline)-->
                    <div class="am-search hidden md:flex lg:hidden" style="max-width:280px">
                        <svg fill="currentColor" viewBox="0 0 16 16" width="14" height="14" style="color:var(--color-text-3)"><path d="M11.5 7a4.499 4.499 0 11-8.998 0A4.499 4.499 0 0111.5 7zm.82 4.746a6 6 0 10-1.277 1.277l3.171 3.171a1 1 0 101.414-1.414l-3.308-3.308z"/></svg>
                        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search…">
                    </div>
                    <span style="font-size:12px;color:var(--color-text-3);font-weight:500">{{ $products->count() }} listings</span>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 animate-stagger">
                @forelse($products as $product)
                    @php
                        $gradients = [
                            ['#3B1F0A', '#6B3A1A'],
                            ['#1E3B24', '#2D5E36'],
                            ['#1A2B3B', '#2B4A63'],
                            ['#3B2D1A', '#60461E'],
                            ['#2B1A3B', '#4A2D60'],
                        ];
                        $grad = $gradients[$loop->index % count($gradients)];
                    @endphp
                    <a href="{{ route('product.detail', $product->slug) }}" class="am-card group">
                        <!-- Product Image placeholder with beautiful pattern -->
                        <div class="am-card-image">
                            <div class="am-card-placeholder" style="background:linear-gradient(135deg, {{ $grad[0] }} 0%, {{ $grad[1] }} 100%)">
                                <div style="text-align:center;padding:20px">
                                    <div style="font-size:48px;margin-bottom:8px;opacity:.6">
                                        {{ in_array(optional($product->category)->slug, ['textiles-apparel']) ? '🧵' : (in_array(optional($product->category)->slug, ['agriculture-food']) ? '🌿' : (in_array(optional($product->category)->slug, ['electronics']) ? '⚡' : '📦')) }}
                                    </div>
                                    <p style="font-size:10px;color:rgba(255,255,255,.3);font-weight:600;text-transform:uppercase;letter-spacing:.08em">{{ $product->team->name ?? 'Vendor' }}</p>
                                </div>
                            </div>
                            <!-- Save button overlay -->
                            <button class="am-card-save" onclick="event.preventDefault()">
                                <svg fill="currentColor" viewBox="0 0 24 24" width="16" height="16"><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3z"/></svg>
                            </button>
                            @if($product->tiers->count() > 0)
                                <div style="position:absolute;top:10px;left:10px">
                                    <span class="am-wholesale-badge" style="background:rgba(30,124,77,.85);color:#fff;border-radius:6px;backdrop-filter:blur(8px)">Wholesale</span>
                                </div>
                            @endif
                        </div>

                        <!-- Card Info -->
                        <div class="am-card-info">
                            <p class="am-price">${{ number_format($product->unit_price, 2) }}</p>
                            <p class="am-product-name">{{ $product->name }}</p>
                            <p class="am-product-location">
                                <svg fill="currentColor" viewBox="0 0 24 24" width="10" height="10"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
                                {{ $product->team->name ?? 'Africa' }}
                            </p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full py-24 text-center animate-in">
                        <div style="font-size:64px;margin-bottom:16px">🌍</div>
                        <p style="font-size:1.1rem;font-weight:700;color:var(--color-text);margin-bottom:8px">No products found yet</p>
                        <p style="font-size:14px;color:var(--color-text-3);margin-bottom:20px">Be the first to list in this category!</p>
                        <a href="{{ route('vendor.kyc') }}" class="btn-primary">Start Selling</a>
                    </div>
                @endforelse
            </div>

        </div>
    </main>
</div>
