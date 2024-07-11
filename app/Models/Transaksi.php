<?php

namespace App\Models;

use App\Enums\StatusTransaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $casts = [
        'status_transaksi' => StatusTransaksi::class,
    ];
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
        'jam_reservasi',
    ];

    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }

    public function history_transaksi()
    {
        return $this->hasMany(HistoryTransaksi::class);
    }
}
