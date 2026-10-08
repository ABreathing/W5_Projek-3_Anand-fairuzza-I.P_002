<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $daftarOrder = Order::where('id_user', Auth::id())
            ->with('details.barang')
            ->orderByDesc('tanggal_order')
            ->get();

        return view('pesanan.index', compact('daftarOrder'));
    }
}