<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id_user' => 'U001',
            'nama_lengkap' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'username' => 'budi',
            'password' => 'rahasia123',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 1, Bandung',
        ]);

        User::create([
            'id_user' => 'U002',
            'nama_lengkap' => 'Siti Aisyah',
            'email' => 'siti@example.com',
            'username' => 'siti',
            'password' => 'rahasia456',
            'no_hp' => '081298765432',
            'alamat' => 'Jl. Dago No. 25, Bandung',
        ]);

        Barang::create(['id_barang' => 'B001', 'nama_barang' => 'Buku Tulis',      'deskripsi' => 'Buku tulis 38 lembar',          'harga' => 5000,   'stok' => 50,  'gambar' => 'buku-tulis.png']);
        Barang::create(['id_barang' => 'B002', 'nama_barang' => 'Pulpen',          'deskripsi' => 'Pulpen tinta hitam 0.5 mm',     'harga' => 3000,   'stok' => 100, 'gambar' => 'pulpen.png']);
        Barang::create(['id_barang' => 'B003', 'nama_barang' => 'Penggaris',       'deskripsi' => 'Penggaris plastik 30 cm',       'harga' => 4000,   'stok' => 40,  'gambar' => 'penggaris.png']);
        Barang::create(['id_barang' => 'B004', 'nama_barang' => 'Pensil 2B',       'deskripsi' => 'Pensil 2B untuk ujian',         'harga' => 2500,   'stok' => 80,  'gambar' => 'pensil-2b.png']);
        Barang::create(['id_barang' => 'B005', 'nama_barang' => 'Penghapus',       'deskripsi' => 'Penghapus putih bersih',        'harga' => 1500,   'stok' => 60,  'gambar' => 'penghapus.png']);
        Barang::create(['id_barang' => 'B006', 'nama_barang' => 'Spidol',          'deskripsi' => 'Spidol whiteboard hitam',       'harga' => 8000,   'stok' => 30,  'gambar' => 'spidol.png']);
        Barang::create(['id_barang' => 'B007', 'nama_barang' => 'Correction Tape', 'deskripsi' => 'Tip-ex pita 5 mm',              'harga' => 6000,   'stok' => 25,  'gambar' => 'correction-tape.png']);
        Barang::create(['id_barang' => 'B008', 'nama_barang' => 'Stapler',         'deskripsi' => 'Stapler kecil plus isi',        'harga' => 15000,  'stok' => 15,  'gambar' => 'stapler.png']);
        Barang::create(['id_barang' => 'B009', 'nama_barang' => 'Kalkulator',      'deskripsi' => 'Kalkulator 12 digit',           'harga' => 45000,  'stok' => 10,  'gambar' => 'kalkulator.png']);
        Barang::create(['id_barang' => 'B010', 'nama_barang' => 'Tas Sekolah',     'deskripsi' => 'Tas punggung (stok habis)',     'harga' => 120000, 'stok' => 0,   'gambar' => 'tas-sekolah.png']);
    }
}