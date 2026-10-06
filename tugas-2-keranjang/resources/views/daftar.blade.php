<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Alat Tulis</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 2rem auto; padding: 0 1rem; }
        .atas { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ccc; }
        .baris { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #eee; }
        a { color: black; }
    </style>
</head>
<body>
    <div class="atas">
        <h1>Toko Alat Tulis</h1>
        <a href="/keranjang">Keranjang ({{ $jumlahItem }})</a>
    </div>

    <h2>Daftar barang</h2>

    @foreach ($daftarBarang as $barang)
        <div class="baris">
            <div>
                <b>{{ $barang->nama }}</b><br>
                Rp {{ number_format($barang->harga, 0, ',', '.') }}
            </div>
            <form method="POST" action="/keranjang/tambah/{{ $barang->id }}">
                @csrf
                <button type="submit">Masukkan ke keranjang</button>
            </form>
        </div>
    @endforeach
</body>
</html>