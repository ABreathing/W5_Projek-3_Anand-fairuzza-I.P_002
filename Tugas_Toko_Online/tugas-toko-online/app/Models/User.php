<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';   // primary key-nya bukan "id"
    protected $keyType = 'string';       // tipenya teks (VARCHAR)
    public $incrementing = false;        // nggak auto increment
    public $timestamps = false;          // tabel nggak punya created_at/updated_at

    protected $fillable = [
        'id_user', 'nama_lengkap', 'email', 'username', 'password', 'no_hp', 'alamat',
    ];

    protected $hidden = ['password'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed', // otomatis di-hash saat disimpan
        ];
    }
}