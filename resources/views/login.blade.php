@extends('layouts.app')

@section('title', 'Login')

@section('meta_description', 'Sign in to your account to access your dashboard')

@section('meta_keywords', 'login, sign in, authentication')

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
    }

    .auth-wrapper {
        width: 100%;
        padding: 20px;
    }

    .login-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        max-width: 450px;
        margin: 0 auto;
        padding: 50px 40px;
        position: relative;
        overflow: hidden;
    }

    .login-container::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 300px;
        height: 300px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        border-radius: 50%;
        pointer-events: none;
    }

    .back-link {
        margin-bottom: 30px;
    }

    .back-link a {
        color: #667eea;
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .back-link a:hover {
        color: #764ba2;
        gap: 12px;
    }

    h1 {
        color: #2d3748;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
        text-align: center;
    }

    .login-subtitle {
        text-align: center;
        color: #718096;
        font-size: 14px;
        margin-bottom: 30px;
    }

    form {
        position: relative;
        z-index: 1;
    }

    .form-group {
        margin-bottom: 24px;
    }

    label {
        display: block;
        color: #2d3748;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 14px;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
        background-color: #f7fafc;
        box-sizing: border-box;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
        outline: none;
        border-color: #667eea;
        background-color: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    input[type="email"]::placeholder,
    input[type="password"]::placeholder {
        color: #a0aec0;
    }

    .remember-group {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 24px;
    }

    input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #667eea;
    }

    .remember-group label {
        margin: 0;
        color: #4a5568;
        font-weight: 500;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-login {
        width: 100%;
        padding: 14px 24px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.6);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .login-footer {
        text-align: center;
        margin-top: 24px;
        color: #718096;
        font-size: 14px;
    }

    .login-footer a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .login-footer a:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    @media (max-width: 480px) {
        .login-container {
            padding: 40px 24px;
        }

        h1 {
            font-size: 26px;
        }

        input[type="email"],
        input[type="password"],
        .btn-login {
            padding: 12px 14px;
            font-size: 14px;
        }
    }
</style>
@endpush

@section('content')
<div class="auth-wrapper">
    <div class="login-container">
        <div class="back-link">
            <a href="/"><i class="fas fa-arrow-left"></i> Back to Home</a>
        </div>
        <h1>Welcome Back</h1>
        <p class="login-subtitle">Sign in to your account to continue</p>
        
        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="you@example.com">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>
            
            <div class="remember-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            
            <button type="submit" class="btn-login">Sign In</button>
        </form>
    </div>
</div>
@endsection
