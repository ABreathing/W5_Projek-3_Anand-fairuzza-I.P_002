<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'budi',
            'password' => 'rahasia123',
            'nama_lengkap' => 'Budi Santoso',
        ]);

        User::create([
            'username' => 'siti',
            'password' => 'rahasia456',
            'nama_lengkap' => 'Siti Aisyah',
        ]);

        User::create([
            'username' => 'Anand',
            'password' => '123',
            'nama_lengkap' => 'Anand Fairuzza I.P',
        ]);
    }
}