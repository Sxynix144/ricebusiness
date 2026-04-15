<!DOCTYPE html>
<html>
<head><title>Register - Rice Business</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}"></head>
<body>
    <h2>Register</h2>
    @if($errors->any())
        <p style="color:red">{{ $errors->first() }}</p>
    @endif
    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>
        <button type="submit">Register</button>
    </form>
    <a href="/login">Already registered? Login</a>
</body>
</html>