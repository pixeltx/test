<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTransaksi;
use App\Models\User;
use App\Models\Member;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['kode_brg', 'total', 'status'];

    public function detailTransaksi() {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function petugas() {
        return $this->belongsTo(User::class);
    }
}
