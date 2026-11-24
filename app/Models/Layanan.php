<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_layanan',
        'harga_per_kg',
        'estimasi',
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'layanan_id');
    }
}