<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div style="margin-bottom:24px;">
            <h1 style="font-size:22px;font-weight:800;color:#1A1A1A;margin:0 0 8px;">Reset password</h1>
            <p style="font-size:14px;color:#6B7280;margin:0;line-height:1.6;">Enter your email and we'll send you a link to reset your password.</p>
        </div>

        @session('status')
            <div style="margin-bottom:16px;padding:12px;background:#F0FDF4;border:1px solid #BBF7D0;border-radius:10px;font-size:13px;color:#15803D;">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors style="margin-bottom:16px;padding:12px;background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;font-size:13px;color:#DC2626;" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div style="margin-bottom:20px;">
                <label for="email" style="display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px;">Email address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    placeholder="you@example.com"
                    style="width:100%;padding:11px 14px;border:1.5px solid #E5E7EB;border-radius:10px;font-size:14px;font-family:inherit;background:#FAFAFA;color:#1A1A1A;outline:none;transition:border-color .2s,box-shadow .2s;box-sizing:border-box;"
                    onfocus="this.style.borderColor='#E86B2C';this.style.boxShadow='0 0 0 3px rgba(232,107,44,.12)'"
                    onblur="this.style.borderColor='#E5E7EB';this.style.boxShadow='none'">
            </div>

            <button type="submit" class="btn-primary" style="width:100%;height:46px;font-size:15px;font-weight:700;border-radius:12px;justify-content:center;">
                Send Reset Link
            </button>
        </form>

        <div style="margin-top:20px;text-align:center;">
            <a href="{{ route('login') }}" style="font-size:13px;color:#E86B2C;text-decoration:none;font-weight:500;">← Back to Sign In</a>
        </div>
    </x-authentication-card>
</x-guest-layout>
