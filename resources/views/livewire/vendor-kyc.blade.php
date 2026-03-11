<div style="background:var(--color-bg);min-height:100vh;display:flex;align-items:flex-start;justify-content:center;padding:40px 16px">
    <div class="am-kyc-card animate-in">
        <!-- Header -->
        <div style="padding:32px 28px 0;text-align:center">
            <div style="width:56px;height:56px;border-radius:16px;background:linear-gradient(135deg,var(--color-primary),var(--color-gold));display:flex;align-items:center;justify-content:center;margin:0 auto 16px;box-shadow:0 8px 24px rgba(232,107,44,.35)">
                <svg fill="white" viewBox="0 0 24 24" width="28" height="28"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
            </div>
            <h1 style="font-size:1.5rem;font-weight:800;color:var(--color-text);letter-spacing:-.03em;margin-bottom:6px">Become a Verified Vendor</h1>
            <p style="font-size:13px;color:var(--color-text-3);margin-bottom:24px">Join {{ number_format(1200) }}+ verified sellers across Africa</p>
        </div>

        <!-- Step Progress Bar -->
        <div style="padding:0 28px;margin-bottom:24px">
            <div style="display:flex;align-items:center;justify-content:center;gap:0;position:relative">
                @foreach([1 => 'Business', 2 => 'Region', 3 => 'Done'] as $num => $label)
                    <div style="display:flex;flex-direction:column;align-items:center;position:relative;z-index:1">
                        <div style="width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:800;border:2.5px solid {{ $step >= $num ? 'var(--color-primary)' : 'var(--color-border)' }};background:{{ $step > $num ? 'var(--color-primary)' : ($step === $num ? 'var(--color-primary-light)' : 'var(--color-surface)') }};color:{{ $step > $num ? '#fff' : ($step === $num ? 'var(--color-primary)' : 'var(--color-text-3)') }};transition:all .3s">
                            @if($step > $num)
                                <svg fill="currentColor" viewBox="0 0 20 20" width="14" height="14"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
                            @else
                                {{ $num }}
                            @endif
                        </div>
                        <p style="font-size:11px;font-weight:600;margin-top:5px;color:{{ $step >= $num ? 'var(--color-primary)' : 'var(--color-text-3)' }}">{{ $label }}</p>
                    </div>
                    @if($num < 3)
                        <div style="flex:1;height:2.5px;background:{{ $step > $num ? 'var(--color-primary)' : 'var(--color-border)' }};transition:background .4s;margin:0 4px;margin-bottom:20px"></div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Step Content -->
        <div style="padding:0 28px 28px">
            @if($step == 1)
                <div style="space-y:16px" class="animate-in">
                    <h2 style="font-size:1.1rem;font-weight:700;color:var(--color-text);margin-bottom:20px">Business Information</h2>
                    <div style="margin-bottom:16px">
                        <label class="am-label">Legal Business Name</label>
                        <input type="text" wire:model="business_name" class="am-input" placeholder="e.g. Accra Textiles Ltd.">
                    </div>
                    <div style="margin-bottom:24px">
                        <label class="am-label">Business Type</label>
                        <select wire:model="business_type" class="am-input" style="height:46px;appearance:none">
                            <option value="">Select type…</option>
                            <option value="individual">Individual Seller</option>
                            <option value="wholesale">Wholesaler / Distributor</option>
                            <option value="manufacturer">Manufacturer</option>
                        </select>
                    </div>
                    <button wire:click="nextStep" class="btn-primary" style="width:100%;height:46px">Continue →</button>
                </div>
            @elseif($step == 2)
                <div class="animate-in">
                    <h2 style="font-size:1.1rem;font-weight:700;color:var(--color-text);margin-bottom:20px">Operating Region</h2>
                    <div style="margin-bottom:16px">
                        <label class="am-label">Primary Country</label>
                        <select wire:model="country" class="am-input" style="height:46px;appearance:none">
                            <option value="">Select country…</option>
                            <option value="EG">🇪🇬 Egypt</option>
                            <option value="NG">🇳🇬 Nigeria</option>
                            <option value="ZA">🇿🇦 South Africa</option>
                            <option value="KE">🇰🇪 Kenya</option>
                            <option value="MA">🇲🇦 Morocco</option>
                            <option value="GH">🇬🇭 Ghana</option>
                            <option value="ET">🇪🇹 Ethiopia</option>
                            <option value="TZ">🇹🇿 Tanzania</option>
                        </select>
                    </div>
                    <div style="padding:14px;background:var(--color-secondary-light);border-radius:12px;display:flex;gap:10px;margin-bottom:24px">
                        <span style="font-size:18px">✨</span>
                        <p style="font-size:12px;color:var(--color-secondary-dark);line-height:1.5">Verified vendors get <strong>50% lower fees</strong>, priority search placement, and a trust badge on your listings.</p>
                    </div>
                    <button wire:click="nextStep" class="btn-primary" style="width:100%;height:46px">Continue →</button>
                </div>
            @elseif($step == 3)
                <div style="text-align:center" class="animate-in">
                    <div style="font-size:72px;margin-bottom:16px;animation:pulseDot 2s infinite">🎉</div>
                    <h2 style="font-size:1.2rem;font-weight:800;color:var(--color-text);margin-bottom:8px">You're all set!</h2>
                    <p style="font-size:13px;color:var(--color-text-3);margin-bottom:24px">Our team will review your application within 24 hours. You'll receive an email once verified.</p>
                    <div style="padding:16px;background:var(--color-primary-light);border-radius:12px;margin-bottom:24px;text-align:left">
                        <p style="font-size:12px;font-weight:600;color:var(--color-primary)">By submitting you agree to AfricaMarket's Vendor Terms & Conditions and the Pan-African Trade Code of Conduct.</p>
                    </div>
                    <button wire:click="submit" class="btn-primary" style="width:100%;height:46px;background:linear-gradient(135deg,var(--color-secondary),#2A9C65);box-shadow:0 4px 14px rgba(30,124,77,.35)">
                        Submit for Verification ✓
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
