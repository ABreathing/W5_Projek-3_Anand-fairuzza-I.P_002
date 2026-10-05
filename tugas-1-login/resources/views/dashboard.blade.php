<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 3rem auto; padding: 0 1rem; }
        .bar { display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>
    <div class="bar">
        <h1>Dashboard</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <h2>Selamat datang, {{ Auth::user()->nama_lengkap }}!</h2>
    <p>Halaman ini hanya bisa dibuka setelah login.</p>
    <p>Username: {{ Auth::user()->username }}</p>
</body>
</html>