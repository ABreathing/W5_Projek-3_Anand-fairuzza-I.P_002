<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Online</title>
    <style>
        body { font-family: sans-serif; max-width: 900px; margin: 0 auto; padding: 0 1rem 2rem; }
        nav { display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid #ccc; margin-bottom: 16px; }
        nav a { margin-right: 12px; }
        nav form { display: inline; }
        .logo { font-weight: bold; font-size: 1.3rem; text-decoration: none; color: black; }
        .sukses { background: #e6f6ea; color: #1e7b34; padding: 8px; border-radius: 4px; margin-bottom: 12px; }
        .error { background: #fde8e8; color: #c0392b; padding: 8px; border-radius: 4px; margin-bottom: 12px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(190px, 1fr)); gap: 16px; }
        .kartu { border: 1px solid #ddd; border-radius: 6px; padding: 10px; text-align: center; }
        .kartu img { width: 100%; height: 150px; object-fit: cover; }
        .kosong { width: 100%; height: 150px; background: #eee; display: flex; align-items: center; justify-content: center; color: #888; }
        .pesanan { border: 1px solid #ddd; border-radius: 6px; padding: 10px 14px; margin-bottom: 16px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 12px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        td form { display: inline; }
    </style>
</head>
<body>
    <nav>
        <a class="logo" href="/">Toko Online</a>
        <div>
            @auth
                <span>Halo, {{ Auth::user()->nama_lengkap }}</span>
                <a href="/keranjang">Keranjang ({{ array_sum(session('keranjang', [])) }})</a>
                <a href="/pesanan">Pesanan Saya</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="/login">Login</a>
            @endauth
        </div>
    </nav>

    @if (session('sukses'))
        <div class="sukses">{{ session('sukses') }}</div>
    @endif

    @if (session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    @yield('content')
</body>
</html>