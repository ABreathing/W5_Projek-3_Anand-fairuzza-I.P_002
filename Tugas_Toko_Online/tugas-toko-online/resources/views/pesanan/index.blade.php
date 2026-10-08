@extends('layouts.app')

@section('content')
    <h2>Riwayat pesanan</h2>

    @forelse ($daftarOrder as $order)
        <div class="pesanan">
            <p><b>{{ $order->id_order }}</b> - {{ $order->tanggal_order->format('d-m-Y H:i') }}</p>
            <p>Alamat pengiriman: {{ $order->alamat_pengiriman }}</p>

            <table>
                <tr>
                    <th>Barang</th>
                    <th>Harga satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
                @foreach ($order->details as $detail)
                    <tr>
                        <td>{{ $detail->barang->nama_barang }}</td>
                        <td>Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                        <td>{{ $detail->jumlah_beli }}</td>
                        <td>Rp {{ number_format($detail->harga_satuan * $detail->jumlah_beli, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="3">Total</th>
                    <th>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</th>
                </tr>
            </table>
        </div>
    @empty
        <p>Belum ada pesanan. <a href="/">Mulai belanja</a></p>
    @endforelse
@endsection