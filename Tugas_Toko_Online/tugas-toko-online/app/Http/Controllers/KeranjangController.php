<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function lihat()
    {
        $keranjang = session('keranjang', []); // format: [id_barang => jumlah]

        $daftarBarang = Barang::whereIn('id_barang', array_keys($keranjang))->get();

        $total = 0;
        foreach ($daftarBarang as $barang) {
            $barang->jumlah = $keranjang[$barang->id_barang];
            $barang->subtotal = $barang->harga * $barang->jumlah;
            $total = $total + $barang->subtotal;
        }

        return view('keranjang.index', compact('daftarBarang', 'total'));
    }

    public function tambah($id)
    {
        $barang = Barang::findOrFail($id);

        $keranjang = session('keranjang', []);
        $jumlahBaru = ($keranjang[$id] ?? 0) + 1; // kalau belum ada, anggap 0

        if ($jumlahBaru > $barang->stok) {
            return back()->with('error', 'Stok ' . $barang->nama_barang . ' tidak cukup (sisa ' . $barang->stok . ').');
        }

        $keranjang[$id] = $jumlahBaru;
        session(['keranjang' => $keranjang]);

        return back()->with('sukses', $barang->nama_barang . ' dimasukkan ke keranjang.');
    }

    public function kurang($id)
    {
        $keranjang = session('keranjang', []);

        if (isset($keranjang[$id])) {
            $keranjang[$id] = $keranjang[$id] - 1;

            if ($keranjang[$id] <= 0) {
                unset($keranjang[$id]); // jumlah 0, item dihapus otomatis
            }
        }

        session(['keranjang' => $keranjang]);

        return back();
    }

    public function hapus($id)
    {
        $keranjang = session('keranjang', []);
        unset($keranjang[$id]);
        session(['keranjang' => $keranjang]);

        return back();
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'alamat_pengiriman' => ['required', 'string', 'max:500'],
        ]);

        $keranjang = session('keranjang', []);

        if (empty($keranjang)) {
            return back()->with('error', 'Keranjang masih kosong.');
        }

        $daftarBarang = Barang::whereIn('id_barang', array_keys($keranjang))->get();

        foreach ($daftarBarang as $barang) {
            if ($keranjang[$barang->id_barang] > $barang->stok) {
                return back()->with('error', 'Stok ' . $barang->nama_barang . ' tidak cukup (sisa ' . $barang->stok . ').');
            }
        }

        $total = 0;
        foreach ($daftarBarang as $barang) {
            $total = $total + ($barang->harga * $keranjang[$barang->id_barang]);
        }

        DB::transaction(function () use ($daftarBarang, $keranjang, $total, $request) {
            $idOrder = 'ORD' . date('ymdHis'); // 15 karakter

            Order::create([
                'id_order' => $idOrder,
                'id_user' => Auth::id(),
                'tanggal_order' => now(),
                'total_harga' => $total,
                'alamat_pengiriman' => $request->alamat_pengiriman,
            ]);

            foreach ($daftarBarang as $barang) {
                $jumlah = $keranjang[$barang->id_barang];

                OrderDetail::create([
                    'id_order' => $idOrder,
                    'id_barang' => $barang->id_barang,
                    'harga_satuan' => $barang->harga, // harga saat dibeli (arsip)
                    'jumlah_beli' => $jumlah,
                ]);

                $barang->decrement('stok', $jumlah); // kurangi stok
            }
        });

        session()->forget('keranjang');

        return redirect('/pesanan')->with('sukses', 'Checkout berhasil, pesanan kamu sudah dibuat.');
    }
}