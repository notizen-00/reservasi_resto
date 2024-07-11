<?php

namespace App\Models;

use App\Enums\StatusTransaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryTransaksi extends Model
{
    use HasFactory;

    protected $table = 'history_transaksi';
    protected $casts = [
        'status' => StatusTransaksi::class,
    ];

    protected $fillable =
        [
        'transaksi_id',
        'user_id',
        'status',
        'catatan',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
