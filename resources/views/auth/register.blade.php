<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- Heading -->
        <div style="margin-bottom:24px;">
            <h1 style="font-size:22px;font-weight:800;color:#1A1A1A;margin:0 0 4px;">Join AfricaMarket</h1>
            <p style="font-size:14px;color:#6B7280;margin:0;">Connect with buyers & sellers across 54 nations 🌍</p>
        </div>

        <x-validation-errors style="margin-bottom:16px;padding:12px;background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;font-size:13px;color:#DC2626;" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div style="margin-bottom:14px;">
                <label for="name" style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Full name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                    placeholder="e.g. Amara Diallo"
                    style="width:100%;padding:11px 14px;border:1.5px solid #E5E7EB;border-radius:10px;font-size:14px;font-family:inherit;background:#FAFAFA;color:#1A1A1A;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;"
                    onfocus="this.style.borderColor='#E86B2C';this.style.boxShadow='0 0 0 3px rgba(232,107,44,.12)'"
                    onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none'">
            </div>

            <!-- Email -->
            <div style="margin-bottom:14px;">
                <label for="email" style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Email address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                    placeholder="you@example.com"
                    style="width:100%;padding:11px 14px;border:1.5px solid #E5E7EB;border-radius:10px;font-size:14px;font-family:inherit;background:#FAFAFA;color:#1A1A1A;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;"
                    onfocus="this.style.borderColor='#E86B2C';this.style.boxShadow='0 0 0 3px rgba(232,107,44,.12)'"
                    onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none'">
            </div>

            <!-- Password row — two fields side by side on larger screens -->
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:14px;">
                <div>
                    <label for="password" style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        placeholder="Min. 8 chars"
                        style="width:100%;padding:11px 14px;border:1.5px solid #E5E7EB;border-radius:10px;font-size:14px;font-family:inherit;background:#FAFAFA;color:#1A1A1A;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;"
                        onfocus="this.style.borderColor='#E86B2C';this.style.boxShadow='0 0 0 3px rgba(232,107,44,.12)'"
                        onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none'">
                </div>
                <div>
                    <label for="password_confirmation" style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Confirm</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        placeholder="Repeat password"
                        style="width:100%;padding:11px 14px;border:1.5px solid #E5E7EB;border-radius:10px;font-size:14px;font-family:inherit;background:#FAFAFA;color:#1A1A1A;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;"
                        onfocus="this.style.borderColor='#E86B2C';this.style.boxShadow='0 0 0 3px rgba(232,107,44,.12)'"
                        onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none'">
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div style="margin-bottom:18px;padding:12px;background:#FFF8F5;border:1px solid rgba(232,107,44,.2);border-radius:10px;">
                    <label style="display:flex;align-items:flex-start;gap:10px;cursor:pointer;">
                        <input type="checkbox" name="terms" id="terms" required
                            style="width:16px;height:16px;margin-top:2px;accent-color:#E86B2C;flex-shrink:0;">
                        <span style="font-size:13px;color:#6B7280;line-height:1.5;">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" style="color:#E86B2C;text-decoration:none;font-weight:600;">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" style="color:#E86B2C;text-decoration:none;font-weight:600;">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </span>
                    </label>
                </div>
            @endif

            <!-- Value props -->
            <div style="display:flex;gap:16px;margin-bottom:20px;">
                <div style="flex:1;text-align:center;padding:10px 8px;background:#F9FAFB;border-radius:10px;">
                    <div style="font-size:18px;margin-bottom:2px;">🛡️</div>
                    <div style="font-size:11px;color:#6B7280;font-weight:500;">Escrow Safe</div>
                </div>
                <div style="flex:1;text-align:center;padding:10px 8px;background:#F9FAFB;border-radius:10px;">
                    <div style="font-size:18px;margin-bottom:2px;">🌍</div>
                    <div style="font-size:11px;color:#6B7280;font-weight:500;">54 Countries</div>
                </div>
                <div style="flex:1;text-align:center;padding:10px 8px;background:#F9FAFB;border-radius:10px;">
                    <div style="font-size:18px;margin-bottom:2px;">✅</div>
                    <div style="font-size:11px;color:#6B7280;font-weight:500;">Verified Vendors</div>
                </div>
            </div>

            <button type="submit" class="btn-primary" style="width:100%;height:46px;font-size:15px;font-weight:700;border-radius:12px;justify-content:center;">
                Create Free Account
            </button>
        </form>

        <!-- Divider -->
        <div style="display:flex;align-items:center;gap:12px;margin:20px 0;">
            <div style="flex:1;height:1px;background:#E5E7EB;"></div>
            <span style="font-size:12px;color:#9CA3AF;font-weight:500;">ALREADY HAVE AN ACCOUNT?</span>
            <div style="flex:1;height:1px;background:#E5E7EB;"></div>
        </div>

        <a href="{{ route('login') }}"
            style="display:flex;align-items:center;justify-content:center;width:100%;height:44px;border:1.5px solid #E86B2C;border-radius:12px;color:#E86B2C;font-size:14px;font-weight:600;text-decoration:none;transition:background .2s;"
            onmouseover="this.style.background='rgba(232,107,44,.06)'"
            onmouseout="this.style.background='transparent'">
            Sign in instead →
        </a>
    </x-authentication-card>
</x-guest-layout>
