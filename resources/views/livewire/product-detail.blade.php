<div class="flex flex-1 w-full overflow-hidden" style="background:var(--color-bg)">

    <!-- ===== Left: Image / Gallery Area ===== -->
    <div class="am-detail-image-area" style="flex:1;min-height:0;overflow-y:auto">
        @php
            $gradients = ['#3B1F0A,#6B3A1A', '#1E3B24,#2D5E36', '#1A2B3B,#2B4A63'];
            $emoji = in_array(optional($product->category)->slug, ['textiles-apparel']) ? '🧵' 
                   : (in_array(optional($product->category)->slug, ['agriculture-food']) ? '🌿' 
                   : (in_array(optional($product->category)->slug, ['electronics']) ? '⚡' : '📦'));
        @endphp
        {{-- Fullscreen image area --}}
        <div style="min-height:60vh;display:flex;align-items:center;justify-content:center;padding:40px;position:relative;overflow:hidden">
            {{-- Background decoration --}}
            <div style="position:absolute;inset:0;background:linear-gradient(145deg,#1A1008,#2C1A08 60%,#1A2C12);opacity:.95"></div>
            <div style="position:absolute;top:-80px;right:-80px;width:320px;height:320px;background:radial-gradient(circle,rgba(245,166,35,.25) 0%,transparent 70%);border-radius:50%"></div>
            <div style="position:absolute;bottom:-80px;left:-40px;width:280px;height:280px;background:radial-gradient(circle,rgba(232,107,44,.2) 0%,transparent 70%);border-radius:50%"></div>

            <div style="position:relative;z-index:1;text-align:center">
                <div style="font-size:120px;line-height:1;margin-bottom:24px;filter:drop-shadow(0 8px 24px rgba(0,0,0,.4))">{{ $emoji }}</div>
                <div style="display:inline-flex;padding:6px 16px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:50px;backdrop-filter:blur(10px)">
                    <span style="font-size:12px;font-weight:600;color:rgba(255,255,255,.7)">{{ $product->team->name ?? 'Verified Vendor' }}</span>
                </div>
            </div>
        </div>

        {{-- Mobile: show info below image on small screens --}}
        <div class="block lg:hidden" style="background:var(--color-surface);padding:24px 20px;border-top:1px solid var(--color-border)">
            @include('livewire.partials.product-sidebar-content', ['inSidebar' => false])
        </div>
    </div>

    <!-- ===== Right: Info Sidebar ===== -->
    <aside class="am-detail-sidebar hidden lg:block scrollbar-hide">
        @include('livewire.partials.product-sidebar-content', ['inSidebar' => true])
    </aside>

</div>
