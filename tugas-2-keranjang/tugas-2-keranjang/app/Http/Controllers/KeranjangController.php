<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class KeranjangController extends Controller
{
    public function index()
    {
        $daftarBarang = Barang::all();

        $keranjang = session('keranjang', []);
        $jumlahItem = array_sum($keranjang);

        return view('daftar', compact('daftarBarang', 'jumlahItem'));
    }

    public function lihat()
    {
        $keranjang = session('keranjang', []);
        $jumlahItem = array_sum($keranjang);

        $daftarBarang = Barang::whereIn('id', array_keys($keranjang))->get();

        $total = 0;
        foreach ($daftarBarang as $barang) {
            $barang->jumlah = $keranjang[$barang->id];
            $barang->subtotal = $barang->harga * $barang->jumlah;
            $total = $total + $barang->subtotal;
        }

        return view('keranjang', compact('daftarBarang', 'jumlahItem', 'total'));
    }

    public function tambah($id)
    {
        Barang::findOrFail($id); 

        if (isset($keranjang[$id])) {
            $keranjang[$id] = $keranjang[$id] + 1; 
        } else {
            $keranjang[$id] = 1; 
        }

        session(['keranjang' => $keranjang]);

        return back();
    }

    public function kurang($id)
    {
        $keranjang = session('keranjang', []);

        if (isset($keranjang[$id])) {
            $keranjang[$id] = $keranjang[$id] - 1;

            if ($keranjang[$id] == 0) {
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

    public function kosongkan()
    {
        session()->forget('keranjang');

        return back();
    }
}