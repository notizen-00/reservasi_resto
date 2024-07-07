<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DetailTransaksi extends Pivot
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $fillable =
        [
        'transaksi_id',
        'produk_id',
        'jumlah',
        'subtotal',
    ];
}