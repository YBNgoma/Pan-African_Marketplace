<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- Heading -->
        <div style="margin-bottom:24px;">
            <h1 style="font-size:22px;font-weight:800;color:#1A1A1A;margin:0 0 4px;">Welcome back</h1>
            <p style="font-size:14px;color:#6B7280;margin:0;">Sign in to your AfricaMarket account</p>
        </div>

        <x-validation-errors style="margin-bottom:16px;padding:12px;background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;font-size:13px;color:#DC2626;" />

        @session('status')
            <div style="margin-bottom:16px;padding:12px;background:#F0FDF4;border:1px solid #BBF7D0;border-radius:10px;font-size:13px;color:#15803D;">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="margin-bottom:16px;">
                <label for="email" style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Email address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    style="width:100%;padding:11px 14px;border:1.5px solid #E5E7EB;border-radius:10px;font-size:14px;font-family:inherit;background:#FAFAFA;color:#1A1A1A;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;"
                    onfocus="this.style.borderColor='#E86B2C';this.style.boxShadow='0 0 0 3px rgba(232,107,44,.12)'"
                    onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none'">
            </div>

            <div style="margin-bottom:16px;">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px;">
                    <label for="password" style="font-size:13px;font-weight:600;color:#374151;">Password</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="font-size:12px;color:#E86B2C;text-decoration:none;font-weight:500;">Forgot password?</a>
                    @endif
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    style="width:100%;padding:11px 14px;border:1.5px solid #E5E7EB;border-radius:10px;font-size:14px;font-family:inherit;background:#FAFAFA;color:#1A1A1A;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;"
                    onfocus="this.style.borderColor='#E86B2C';this.style.boxShadow='0 0 0 3px rgba(232,107,44,.12)'"
                    onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none'">
            </div>

            <div style="display:flex;align-items:center;gap:8px;margin-bottom:20px;">
                <input id="remember_me" type="checkbox" name="remember"
                    style="width:16px;height:16px;accent-color:#E86B2C;cursor:pointer;">
                <label for="remember_me" style="font-size:13px;color:#6B7280;cursor:pointer;">Keep me signed in</label>
            </div>

            <button type="submit" class="btn-primary" style="width:100%;height:46px;font-size:15px;font-weight:700;border-radius:12px;justify-content:center;">
                Sign In
            </button>
        </form>

        <!-- Divider -->
        <div style="display:flex;align-items:center;gap:12px;margin:20px 0;">
            <div style="flex:1;height:1px;background:#E5E7EB;"></div>
            <span style="font-size:12px;color:#9CA3AF;font-weight:500;">NEW TO AFRICAMARKET?</span>
            <div style="flex:1;height:1px;background:#E5E7EB;"></div>
        </div>

        <a href="{{ route('register') }}"
            style="display:flex;align-items:center;justify-content:center;width:100%;height:44px;border:1.5px solid #E86B2C;border-radius:12px;color:#E86B2C;font-size:14px;font-weight:600;text-decoration:none;transition:background .2s;"
            onmouseover="this.style.background='rgba(232,107,44,.06)'"
            onmouseout="this.style.background='transparent'">
            Create a free account →
        </a>
    </x-authentication-card>
</x-guest-layout>
