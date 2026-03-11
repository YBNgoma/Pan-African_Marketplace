<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AfricaMarket · Pan-African B2B & B2C Marketplace</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="margin:0;background:var(--color-bg)">

    <!-- ===== Navbar ===== -->
    <nav style="position:sticky;top:0;z-index:100;background:rgba(255,255,255,.96);backdrop-filter:blur(20px);border-bottom:1px solid var(--color-border);height:64px;display:flex;align-items:center;padding:0 24px;gap:16px">
        <a href="/" style="display:flex;align-items:center;gap:10px;text-decoration:none">
            <div style="width:38px;height:38px;border-radius:10px;background:linear-gradient(135deg,#E86B2C,#F5A623);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(232,107,44,.35)">
                <svg fill="white" viewBox="0 0 24 24" width="20" height="20"><path d="M12 2L2 7l1.63 1.27L12 4.47l8.37 3.8L22 7zM3.5 9.37V17l8.5 4 8.5-4V9.37l-1.5.68V16.2L12 19.67 5.5 16.2V10.05z"/></svg>
            </div>
            <span class="am-logo-text">AfricaMarket</span>
        </a>

        <div style="flex:1"></div>

        <div style="display:flex;gap:8px">
            @auth
                <a href="/marketplace" class="btn-primary" style="height:38px;font-size:13px;padding:0 16px">Go to Marketplace →</a>
            @else
                <a href="{{ route('login') }}" class="btn-secondary" style="height:38px;font-size:13px;padding:0 16px">Log in</a>
                <a href="{{ route('register') }}" class="btn-primary" style="height:38px;font-size:13px;padding:0 16px">Join Free</a>
            @endauth
        </div>
    </nav>

    <!-- ===== Hero ===== -->
    <section style="padding:80px 24px 100px;text-align:center;position:relative;overflow:hidden;background:linear-gradient(to bottom, #fff 0%, var(--color-bg) 100%)">
        <!-- Background decorative blobs -->
        <div style="position:absolute;top:-120px;right:-80px;width:500px;height:500px;background:radial-gradient(circle,rgba(232,107,44,.08) 0%,transparent 70%);border-radius:50%;pointer-events:none"></div>
        <div style="position:absolute;bottom:-80px;left:-80px;width:400px;height:400px;background:radial-gradient(circle,rgba(30,124,77,.08) 0%,transparent 70%);border-radius:50%;pointer-events:none"></div>
        <div style="position:absolute;top:40%;left:60%;width:300px;height:300px;background:radial-gradient(circle,rgba(245,166,35,.07) 0%,transparent 70%);border-radius:50%;pointer-events:none"></div>

        <div style="position:relative;z-index:1;max-width:720px;margin:0 auto">
            <div style="display:inline-flex;align-items:center;gap:8px;padding:6px 16px;background:var(--color-primary-light);border:1px solid rgba(232,107,44,.25);border-radius:50px;margin-bottom:24px">
                <span style="font-size:14px">🌍</span>
                <span style="font-size:12px;font-weight:700;color:var(--color-primary);text-transform:uppercase;letter-spacing:.06em">54 Nations. One Market.</span>
            </div>

            <h1 style="font-size:clamp(2.5rem,6vw,4.5rem);font-weight:800;color:var(--color-text);letter-spacing:-.05em;line-height:1.05;margin-bottom:20px">
                Trade without<br>
                <span style="background:linear-gradient(135deg,var(--color-primary),var(--color-gold));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">borders.</span>
            </h1>

            <p style="font-size:1.1rem;color:var(--color-text-2);max-width:520px;margin:0 auto 36px;line-height:1.7">
                AfricaMarket connects buyers and verified vendors across the continent. B2B wholesale, secure escrow payments, WhatsApp negotiation.
            </p>

            <div style="display:flex;flex-wrap:wrap;gap:12px;justify-content:center">
                <a href="/marketplace" class="btn-primary" style="height:52px;font-size:1rem;padding:0 32px;box-shadow:0 6px 24px rgba(232,107,44,.4)">
                    Explore Marketplace →
                </a>
                <a href="{{ route('register') }}" class="btn-secondary" style="height:52px;font-size:1rem;padding:0 32px">
                    Sell on AfricaMarket
                </a>
            </div>

            <!-- Social proof -->
            <div style="margin-top:40px;display:flex;align-items:center;justify-content:center;gap:24px;flex-wrap:wrap">
                @foreach([['1,200+','Verified Vendors'],['54','Countries'],['$2M+','Trade Volume'],['4.8★','Rating']] as [$num, $lbl])
                    <div style="text-align:center">
                        <p style="font-size:1.4rem;font-weight:800;color:var(--color-primary);letter-spacing:-.04em">{{ $num }}</p>
                        <p style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--color-text-3)">{{ $lbl }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===== Features ===== -->
    <section style="padding:80px 24px;max-width:1100px;margin:0 auto">
        <div style="text-align:center;margin-bottom:56px">
            <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:var(--color-primary);margin-bottom:12px">Why AfricaMarket</p>
            <h2 style="font-size:2.2rem;font-weight:800;color:var(--color-text);letter-spacing:-.04em">Built for the continent's trade.</h2>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px">
            @foreach([
                ['🔒','Escrow Protection','Payments held securely. Funds released only when both parties confirm delivery. Zero-risk transactions.','#E86B2C'],
                ['📲','WhatsApp Connect','Negotiate bulk deals directly with vendors via one-tap WhatsApp integration. No barriers.','#1E7C4D'],
                ['✅','Verified Vendors','Our multi-step KYC process ensures you only trade with verified, legitimate businesses.','#F5A623'],
            ] as [$icon, $title, $desc, $color])
                <div style="padding:28px;background:var(--color-surface);border:1.5px solid var(--color-border);border-radius:20px;transition:var(--transition-spring)" onmouseenter="this.style.boxShadow='var(--shadow-lg)';this.style.borderColor='{{ $color }}';this.style.transform='translateY(-4px)'" onmouseleave="this.style.boxShadow='none';this.style.borderColor='var(--color-border)';this.style.transform='none'">
                    <div style="width:52px;height:52px;border-radius:14px;background:{{ $color }}11;display:flex;align-items:center;justify-content:center;font-size:26px;margin-bottom:20px">{{ $icon }}</div>
                    <h3 style="font-size:1.1rem;font-weight:800;color:var(--color-text);margin-bottom:10px">{{ $title }}</h3>
                    <p style="font-size:14px;color:var(--color-text-2);line-height:1.65">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ===== CTA Banner ===== -->
    <section style="padding:0 24px 80px;max-width:1100px;margin:0 auto">
        <div style="background:linear-gradient(135deg,#1A1008 0%,#3B1F0A 50%,#1E3B24 100%);border-radius:24px;padding:56px 40px;text-align:center;position:relative;overflow:hidden">
            <div style="position:absolute;top:-60px;right:-60px;width:300px;height:300px;background:radial-gradient(circle,rgba(245,166,35,.2) 0%,transparent 70%);border-radius:50%"></div>
            <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:rgba(245,166,35,.8);margin-bottom:16px;position:relative">Start trading today</p>
            <h2 style="font-size:2rem;font-weight:800;color:#fff;letter-spacing:-.04em;margin-bottom:12px;position:relative">Ready to grow your <span style="color:var(--color-gold)">African</span> business?</h2>
            <p style="font-size:15px;color:rgba(255,255,255,.6);margin-bottom:32px;position:relative">Join thousands of vendors already trading across the continent.</p>
            <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;position:relative">
                <a href="{{ route('register') }}" class="btn-primary" style="height:50px;font-size:1rem;padding:0 28px">Create Free Account</a>
                <a href="/marketplace" class="btn-secondary" style="height:50px;font-size:1rem;padding:0 28px;background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.15);color:#fff">Browse Products</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer style="border-top:1px solid var(--color-border);padding:24px;text-align:center;color:var(--color-text-3);font-size:13px">
        <p>© 2026 AfricaMarket. Empowering Pan-African Trade. 🌍</p>
    </footer>

</body>
</html>
