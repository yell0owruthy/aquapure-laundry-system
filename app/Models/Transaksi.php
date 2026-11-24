<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'layanan_id',
        'user_id',
        'nama_pelanggan',
        'no_hp',
        'berat',
        'total_harga',
        'status',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}