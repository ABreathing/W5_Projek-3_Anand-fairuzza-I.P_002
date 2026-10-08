<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_order', 'id_user', 'tanggal_order', 'total_harga', 'alamat_pengiriman',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_order' => 'datetime',
        ];
    }

    // satu pesanan punya banyak detail barang
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'id_order', 'id_order');
    }
}