<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $table = 'meja';

    protected $fillable =
        [
        'nomor_meja',
        'kapasitas',
        'status_meja',
        'foto_meja',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
