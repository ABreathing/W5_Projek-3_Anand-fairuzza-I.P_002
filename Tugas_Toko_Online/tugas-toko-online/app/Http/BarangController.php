<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $daftarBarang = Barang::orderBy('id_barang')->get();

        return view('barang.index', compact('daftarBarang'));
    }
}