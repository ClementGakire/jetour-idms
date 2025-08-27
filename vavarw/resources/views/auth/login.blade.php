@extends('layouts.app')

@section('content')
<style>
    body, html {
        height: 100%;
        margin: 0;
    }
    .full-height-bg {
        min-height: 100vh;
        background: linear-gradient(180deg, #f8f9fa 0%, #eeeeee 100%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .auth-card {
        width: 100%;
        max-width: 420px;
        padding: 2rem;
        border-radius: 0.75rem;
        background-color: #ffffff;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    }
    .footer {
        margin-top: 2rem;
        font-size: 0.9rem;
        color: #888;
    }
</style>
<div class="full-height-bg">
    <div class="auth-card">
        <h4 class="text-center mb-4">Login</h4>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="mb-3">
                <label for="email" class="form-label">E-Mail Address</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="/register" class="btn btn-outline-secondary">Register</a>
            </div>
        </form>
    </div>
    <div class="footer text-center">
        &copy; {{ date('Y') }} JET TOURS COMPANY LTD. All rights reserved.
    </div>
</div>
@endsection
