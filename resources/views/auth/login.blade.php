@extends('movies.layout')

@section('title', 'Log in')

@section('content')
<style>
    .auth-wrap {
        display: flex;
        justify-content: center;
        padding: 40px 16px;
    }
    .auth-card {
        width: 100%;
        max-width: 420px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
        padding: 32px;
    }
    .auth-card h2 {
        margin: 0 0 6px;
        font-size: 1.6rem;
        color: #111827;
    }
    .auth-card .subtitle {
        margin: 0 0 24px;
        color: #6b7280;
        font-size: 0.95rem;
    }
    .field {
        margin-bottom: 18px;
    }
    .field label {
        display: block;
        margin-bottom: 6px;
        font-size: 0.9rem;
        font-weight: 600;
        color: #374151;
    }
    .field input {
        width: 100%;
        box-sizing: border-box;
        padding: 10px 12px;
        font-size: 1rem;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        outline: none;
    }
    .field input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }
    .field .error {
        margin: 6px 0 0;
        color: #b91c1c;
        font-size: 0.85rem;
    }
    .btn-submit {
        width: 100%;
        padding: 12px;
        font-size: 1rem;
        font-weight: 600;
        color: #ffffff;
        background: #2563eb;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }
    .btn-submit:hover {
        background: #1d4ed8;
    }
    .auth-footer {
        margin-top: 18px;
        text-align: center;
        font-size: 0.9rem;
        color: #6b7280;
    }
    .auth-footer a {
        color: #2563eb;
        text-decoration: none;
    }
</style>

<div class="auth-wrap">
    <div class="auth-card">
        <h2>Log in</h2>
        <p class="subtitle">Sign in to add and manage movies.</p>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input id="password" type="password" name="password">
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn-submit">Log in</button>
        </form>

        <p class="auth-footer">
            No account yet? <a href="{{ route('register') }}">Register</a>
        </p>
    </div>
</div>
@endsection