<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Marketplace' }} | AfricaMarket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased">
<div class="min-h-screen flex flex-col">

    <!-- ===== Top Navigation ===== -->
    <header class="am-header px-4 flex items-center gap-4">
        <!-- Logo -->
        <a href="/" class="flex items-center gap-2 shrink-0" style="text-decoration:none">
            <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#E86B2C,#F5A623);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(232,107,44,.35)">
                <svg fill="white" viewBox="0 0 24 24" width="20" height="20"><path d="M12 2L2 7l1.63 1.27L12 4.47l8.37 3.8L22 7zM3.5 9.37V17l8.5 4 8.5-4V9.37l-1.5.68V16.2L12 19.67 5.5 16.2V10.05z"/></svg>
            </div>
            <span class="am-logo-text hidden sm:block">AfricaMarket</span>
        </a>

        <!-- Search Bar -->
        <div class="am-search" style="flex:1;min-width:0;max-width:520px">
            <svg fill="currentColor" viewBox="0 0 16 16" width="16" height="16" style="color:var(--color-text-3);flex-shrink:0"><path d="M11.5 7a4.499 4.499 0 11-8.998 0A4.499 4.499 0 0111.5 7zm.82 4.746a6 6 0 10-1.277 1.277l3.171 3.171a1 1 0 101.414-1.414l-3.308-3.308z"/></svg>
            <input type="text" placeholder="Search…">
        </div>

        <!-- Desktop Nav Icons -->
        <nav class="hidden lg:flex items-center h-full gap-1 flex-1 justify-center">
            <a href="/marketplace" class="am-nav-link {{ request()->routeIs('marketplace') ? 'active' : '' }}" title="Browse">
                <svg fill="currentColor" viewBox="0 0 24 24" width="24" height="24"><path d="M12 4.306l-9 6.202V19a1 1 0 001 1h5v-5h6v5h5a1 1 0 001-1v-8.492l-9-6.202z"/></svg>
            </a>
            @auth
            <a href="/wishlist" class="am-nav-link {{ request()->routeIs('wishlist') ? 'active' : '' }}" title="Saved">
                <svg fill="currentColor" viewBox="0 0 24 24" width="24" height="24"><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3z"/></svg>
            </a>
            <a href="/orders" class="am-nav-link {{ request()->routeIs('orders') ? 'active' : '' }}" title="Orders">
                <svg fill="currentColor" viewBox="0 0 24 24" width="24" height="24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/></svg>
            </a>
            @endauth
        </nav>

        <!-- Right Actions -->
        <div class="flex items-center gap-2 shrink-0 ml-auto">
            @auth
                <a href="/vendor/kyc" class="btn-primary hidden md:inline-flex" style="height:38px;font-size:13px;padding:0 16px">
                    <svg fill="currentColor" viewBox="0 0 20 20" width="14" height="14"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 9H9V7h2v4zm0-6H9V3h2v2z"/></svg>
                    Sell
                </a>
                <div class="am-icon-btn overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=E86B2C&color=fff&bold=true&size=80" alt="Profile" style="width:100%;height:100%;object-fit:cover">
                </div>
            @else
                <a href="{{ route('login') }}" class="btn-secondary hidden sm:inline-flex" style="height:36px;font-size:12px;padding:0 12px">Log in</a>
                <a href="{{ route('register') }}" class="btn-primary" style="height:36px;font-size:12px;padding:0 12px;white-space:nowrap">Join</a>
            @endauth
        </div>
    </header>

    <!-- Page Slot -->
    <div class="flex flex-1 overflow-hidden">
        {{ $slot }}
    </div>

    <!-- ===== Mobile Bottom Navigation ===== -->
    <nav class="am-mobile-nav">
        <a href="/marketplace" class="am-mobile-nav-btn {{ request()->routeIs('marketplace') ? 'active' : '' }}">
            <svg fill="currentColor" viewBox="0 0 24 24" width="22" height="22"><path d="M12 4.306l-9 6.202V19a1 1 0 001 1h5v-5h6v5h5a1 1 0 001-1v-8.492l-9-6.202z"/></svg>
            Browse
        </a>
        @auth
        <a href="/wishlist" class="am-mobile-nav-btn {{ request()->routeIs('wishlist') ? 'active' : '' }}">
            <svg fill="currentColor" viewBox="0 0 24 24" width="22" height="22"><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3z"/></svg>
            Saved
        </a>
        <a href="/vendor/kyc" class="am-mobile-nav-btn">
            <div style="width:44px;height:44px;border-radius:12px;background:linear-gradient(135deg,var(--color-primary),var(--color-gold));display:flex;align-items:center;justify-content:center;margin-top:-16px;box-shadow:0 4px 16px rgba(232,107,44,.4)">
                <svg fill="white" viewBox="0 0 24 24" width="24" height="24"><path d="M12 2a10 10 0 100 20A10 10 0 0012 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/></svg>
            </div>
            Sell
        </a>
        <a href="/orders" class="am-mobile-nav-btn {{ request()->routeIs('orders') ? 'active' : '' }}">
            <svg fill="currentColor" viewBox="0 0 24 24" width="22" height="22"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/></svg>
            Orders
        </a>
        <a href="{{ route('login') }}" class="am-mobile-nav-btn">
             <svg fill="currentColor" viewBox="0 0 24 24" width="22" height="22"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
            Account
        </a>
        @endauth
    </nav>

</div>
@livewireScripts
</body>
</html>
