@extends('layouts.app')

@section('content')
    <h2>Keranjang belanja</h2>

    @if ($daftarBarang->isEmpty())
        <p>Keranjang masih kosong. <a href="/">Lihat daftar barang</a></p>
    @else
        <table>
            <tr>
                <th>Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
            @foreach ($daftarBarang as $barang)
                <tr>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td>
                        <form method="POST" action="/keranjang/kurang/{{ $barang->id_barang }}">
                            @csrf
                            <button type="submit">-</button>
                        </form>

                        {{ $barang->jumlah }}

                        <form method="POST" action="/keranjang/tambah/{{ $barang->id_barang }}">
                            @csrf
                            <button type="submit">+</button>
                        </form>

                        <small>(stok {{ $barang->stok }})</small>
                    </td>
                    <td>Rp {{ number_format($barang->subtotal, 0, ',', '.') }}</td>
                    <td>
                        <form method="POST" action="/keranjang/hapus/{{ $barang->id_barang }}">
                            @csrf
                            <button type="submit">hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">Rp {{ number_format($total, 0, ',', '.') }}</th>
            </tr>
        </table>

        <h3>Checkout</h3>
        <p>Ongkos kirim diabaikan, total bayar = total harga barang.</p>

        <form method="POST" action="/checkout">
            @csrf
            <label>Alamat pengiriman</label><br>
            <textarea name="alamat_pengiriman" rows="3" cols="50" required>{{ old('alamat_pengiriman', Auth::user()->alamat) }}</textarea>
            @error('alamat_pengiriman')
                <div class="error">{{ $message }}</div>
            @enderror
            <br><br>
            <button type="submit">Checkout</button>
        </form>
    @endif
@endsection