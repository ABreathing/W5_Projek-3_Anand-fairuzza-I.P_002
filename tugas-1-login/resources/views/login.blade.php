<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        body { font-family: sans-serif; max-width: 360px; margin: 3rem auto; padding: 0 1rem; }
        input { width: 100%; padding: 8px; margin: 4px 0 12px; box-sizing: border-box; }
        button { padding: 8px 16px; }
        .error { background: #fde8e8; color: #c0392b; padding: 8px; border-radius: 4px; margin-bottom: 12px; }
    </style>
</head>
<body>
    <h1>Login</h1>
    <p>Masuk untuk membuka dashboard</p>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Username</label>
        <input type="text" name="username" value="{{ old('username') }}" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Masuk</button>
    </form>
</body>
</html>