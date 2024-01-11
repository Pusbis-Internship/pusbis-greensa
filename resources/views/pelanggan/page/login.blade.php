<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        .error {
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <h1>Login</h1>

    @error('username')
        <div>{{ $message }}</div>
    @enderror

    @error('password')
        <div>{{ $message }}</div>
    @enderror

    <form action="/guestlogin" method="POST">
        @csrf

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="{{ $errors->has('username') ? 'error' : '' }}" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="{{ $errors->has('password') ? 'error' : '' }}" required>
        </div>
        
        <div>
            <button type="submit">Login</button>
        </div>
    </form>

    <div>
        <a href="/forgot-password">Forgot Password?</a>
        <p>Belum punya akun? <a href="/register" method="GET">Register</a></p>
    </div>
</body>
</html>