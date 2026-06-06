<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Trendora</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<section class="login-page">
    <div class="login-card">
        <h1>Admin Login</h1>
        <p>Login to access the Trendora admin panel.</p>

        @if($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="login-form">
            @csrf

            <input 
                type="email" 
                name="email" 
                placeholder="Email address"
                value="{{ old('email') }}"
                required
            >

            <input 
                type="password" 
                name="password" 
                placeholder="Password"
                required
            >

            <label class="remember-row">
                <input type="checkbox" name="remember">
                Remember me
            </label>

            <button type="submit">Login</button>
        </form>

        <a href="{{ route('home') }}" class="login-back">Back to Home</a>
    </div>
</section>

</body>
</html>