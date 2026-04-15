<!DOCTYPE html>
<html>
<head>
    <title>Verify Email - Rice Business</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h2>Verify Your Email Address</h2>

    @if (session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif

    <p>Thanks for signing up! Before you can access your dashboard, please verify your email address by clicking the link we just sent to your email.</p>
    <p>If you didn't receive the email, we can send you a new one.</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>
</body>
</html>