<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
use App\Models\Produk;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id_transaksi', 'id_produk', 'jumlah_produk'];

    public function transaksi() {
        return $this->belongsTo(Transaksi::class);
    }

    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
