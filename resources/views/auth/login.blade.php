<!DOCTYPE html>
<html>
<head>
    <title>Login - Rice Business</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="auth-card">
        <div class="auth-header">
            <h2>Welcome Back</h2>
            <p>Sign in to your account</p>
        </div>
        <form method="POST" action="/login">
            @csrf
            <input type="email" name="email" placeholder="Email address" required>
            <input type="password" name="password" placeholder="Password" required>
            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            <button type="submit" style="width:100%">Log In</button>
        </form>
        <div style="text-align: center; padding: 0 32px 32px;">
            <a href="/register">Don't have an account? Register</a>
        </div>
    </div>
</body>
</html>