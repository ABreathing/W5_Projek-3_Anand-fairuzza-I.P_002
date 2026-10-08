@extends('layouts.app')

@section('content')
    <h2>Daftar barang</h2>

    @guest
        <p>Kamu belum login. <a href="/login">Login</a> dulu untuk belanja.</p>
    @endguest

    <div class="grid">
        @foreach ($daftarBarang as $barang)
            <div class="kartu">
                @if (file_exists(public_path('images/' . $barang->gambar)))
                    <img src="/images/{{ $barang->gambar }}" alt="{{ $barang->nama_barang }}">
                @else
                    <div class="kosong">belum ada gambar</div>
                @endif

                <h3>{{ $barang->nama_barang }}</h3>
                <p>{{ $barang->deskripsi }}</p>
                <p><b>Rp {{ number_format($barang->harga, 0, ',', '.') }}</b></p>
                <p>Stok: {{ $barang->stok }}</p>

                @auth
                    @if ($barang->stok > 0)
                        <form method="POST" action="/keranjang/tambah/{{ $barang->id_barang }}">
                            @csrf
                            <button type="submit">Masukkan ke keranjang</button>
                        </form>
                    @else
                        <button disabled>Stok habis</button>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
@endsection