<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $budi = new User();
        $budi->username = 'budi';
        $budi->password = 'rahasia123';
        $budi->nama_lengkap = 'Budi Santoso';
        $budi->role = 'customer';
        $budi->save();

        $siti = new User();
        $siti->username = 'siti';
        $siti->password = 'rahasia456';
        $siti->nama_lengkap = 'Siti Aisyah';
        $siti->role = 'staff';
        $siti->save();

        $anand = new User();
        $anand->username = 'Anand';
        $anand->password = '123';
        $anand->nama_lengkap = 'Anand Fairuzza I.P';
        $anand->role = 'admin';
        $anand->save();

        $dewi = new User();
        $dewi->username = 'dewi';
        $dewi->password = 'rahasia789';
        $dewi->nama_lengkap = 'Dewi Lestari';
        $dewi->role = 'customer';
        $dewi->save();
    }
}