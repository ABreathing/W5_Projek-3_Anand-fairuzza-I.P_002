<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 2rem auto; padding: 0 1rem; }
        .atas { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ccc; }
        .baris { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #eee; }
        .aksi { display: flex; align-items: center; gap: 6px; }
        .aksi form { margin: 0; }
        .total { display: flex; justify-content: space-between; font-weight: bold; padding: 12px 0; }
        a { color: black; }
    </style>
</head>
<body>
    <div class="atas">
        <h1><a href="/" style="text-decoration:none">Toko Alat Tulis</a></h1>
        <a href="/keranjang">Keranjang ({{ $jumlahItem }})</a>
    </div>

    <h2>Keranjang belanja (tanpa login)</h2>

    @if ($daftarBarang->isEmpty())
        <p>Keranjang masih kosong.</p>
    @else
        @foreach ($daftarBarang as $barang)
            <div class="baris">
                <div>
                    <b>{{ $barang->nama }}</b><br>
                    Rp {{ number_format($barang->harga, 0, ',', '.') }}
                    x {{ $barang->jumlah }}
                    = Rp {{ number_format($barang->subtotal, 0, ',', '.') }}
                </div>
                <div class="aksi">
                    <form method="POST" action="/keranjang/kurang/{{ $barang->id }}">
                        @csrf
                        <button type="submit">-</button>
                    </form>

                    <span>{{ $barang->jumlah }}</span>

                    <form method="POST" action="/keranjang/tambah/{{ $barang->id }}">
                        @csrf
                        <button type="submit">+</button>
                    </form>

                    <form method="POST" action="/keranjang/hapus/{{ $barang->id }}">
                        @csrf
                        <button type="submit">hapus</button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="total">
            <span>Total</span>
            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
        </div>

        <form method="POST" action="/keranjang/kosongkan">
            @csrf
            <button type="submit">Kosongkan keranjang</button>
        </form>
    @endif

    <p><a href="/">&larr; Lanjut belanja</a></p>
</body>
</html>