<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class BarangController extends Controller
{
    // Daftar barang, boleh dilihat tanpa login
    public function index()
    {
        $daftarBarang = Barang::orderBy('id_barang')->get();

        return view('barang.index', compact('daftarBarang'));
    }
}