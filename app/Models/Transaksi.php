<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable =
        [
        'pelanggan_id',
        'meja_id',
        'pembayaran_id',
        'nomor_transaksi',
        'status_transaksi',
        'total',
        'kembalian',
        'tanggal_reservasi',
    ];
}