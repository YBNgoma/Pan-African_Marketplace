<div style="background:var(--color-bg);min-height:100vh">
    <div class="am-page-content" style="max-width:800px">

        <!-- Header -->
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:28px">
            <a href="/marketplace" style="width:40px;height:40px;border-radius:12px;background:var(--color-surface);border:1.5px solid var(--color-border);display:flex;align-items:center;justify-content:center;color:var(--color-text-2);text-decoration:none">
                <svg fill="currentColor" viewBox="0 0 24 24" width="20" height="20"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
            </a>
            <div>
                <h1 style="font-size:1.5rem;font-weight:800;color:var(--color-text);letter-spacing:-.03em">Order Tracking</h1>
                <p style="font-size:13px;color:var(--color-text-3)">{{ $orders->count() }} active orders</p>
            </div>
        </div>

        @forelse($orders as $order)
            <div class="am-order-card animate-in">
                <!-- Order Header -->
                <div style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-start;gap:12px;margin-bottom:24px">
                    <div>
                        <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:var(--color-text-3);margin-bottom:4px">Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                        <h3 style="font-size:1.1rem;font-weight:800;color:var(--color-text);letter-spacing:-.02em">{{ $order->vendor->name ?? 'AfricaMarket Vendor' }}</h3>
                        <p style="font-size:12px;color:var(--color-text-3);margin-top:2px">{{ $order->created_at->format('M d, Y') }}</p>
                    </div>
                    <div style="text-align:right">
                        <p style="font-size:1.5rem;font-weight:800;color:var(--color-primary);letter-spacing:-.04em">${{ number_format($order->total_amount, 2) }}</p>
                        <span class="badge-status badge-{{ $order->status === 'authorized' ? 'warning' : 'success' }}" style="margin-top:4px">{{ $order->status }}</span>
                    </div>
                </div>

                <!-- Tracking Timeline -->
                <div style="position:relative;display:flex;justify-content:space-between;align-items:flex-start;padding:0 8px;margin-bottom:24px">
                    {{-- Connecting line --}}
                    <div style="position:absolute;left:26px;right:26px;top:17px;height:3px;background:var(--color-surface-2);border-radius:4px"></div>
                    {{-- Progress line --}}
                    @php $progress = $order->shipping_status === 'delivered' ? '100%' : ($order->shipping_status === 'shipped' ? '50%' : '0%'); @endphp
                    <div style="position:absolute;left:26px;top:17px;height:3px;background:linear-gradient(90deg,var(--color-primary),var(--color-gold));border-radius:4px;width:{{ $progress }};transition:width 1s ease"></div>

                    @php
                        $steps = [
                            ['label' => 'Authorized', 'sub' => 'Escrow held', 'icon' => '🔒', 'done' => true],
                            ['label' => 'Shipped', 'sub' => 'In transit', 'icon' => '🚚', 'done' => in_array($order->shipping_status, ['shipped','delivered'])],
                            ['label' => 'Delivered', 'sub' => 'Funds released', 'icon' => '✅', 'done' => $order->shipping_status === 'delivered'],
                        ];
                    @endphp

                    @foreach($steps as $step)
                        <div style="display:flex;flex-direction:column;align-items:center;gap:6px;position:relative;z-index:1;flex:1">
                            @if($step['done'])
                                <div class="am-timeline-dot-active">
                                    <svg fill="currentColor" viewBox="0 0 20 20" width="14" height="14"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
                                </div>
                            @else
                                <div class="am-timeline-dot-inactive">
                                    <span style="font-size:14px">{{ $step['icon'] }}</span>
                                </div>
                            @endif
                            <p style="font-size:11px;font-weight:700;color:{{ $step['done'] ? 'var(--color-text)' : 'var(--color-text-3)' }};text-align:center">{{ $step['label'] }}</p>
                            <p style="font-size:10px;color:var(--color-text-3);text-align:center">{{ $step['sub'] }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Actions -->
                <div style="display:flex;gap:8px">
                    <button class="btn-secondary" style="flex:1;height:40px;font-size:13px">Contact Seller</button>
                    @if($order->shipping_status === 'delivered')
                        <button class="btn-primary" style="flex:1;height:40px;font-size:13px;background:linear-gradient(135deg,var(--color-secondary),#2A9C65)">
                            Release Escrow ✓
                        </button>
                    @else
                        <div class="btn-secondary" style="flex:1;height:40px;font-size:13px;opacity:.5;cursor:default;display:flex;align-items:center;justify-content:center">Awaiting shipment…</div>
                    @endif
                </div>
            </div>
        @empty
            <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;padding:80px 20px;background:var(--color-surface);border-radius:20px;border:1.5px dashed var(--color-border);text-align:center">
                <div style="font-size:64px;margin-bottom:16px">📦</div>
                <p style="font-size:1.1rem;font-weight:800;color:var(--color-text);margin-bottom:8px">No orders yet</p>
                <p style="font-size:14px;color:var(--color-text-3);margin-bottom:24px">Start browsing to find your next great trade.</p>
                <a href="/marketplace" class="btn-primary">Browse Products</a>
            </div>
        @endforelse

    </div>
</div>
