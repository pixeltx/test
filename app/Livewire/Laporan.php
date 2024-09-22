<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Produk;
use App\Models\Member;

class Laporan extends Component
{
    public $selectedLaporan = '';

    public function selectLaporan($laporan) {
        $this->selectedLaporan = $laporan;
    }

    public function render()
    {
        $semuaTransaksi = Transaksi::where('status', 'selesai')->get();
        $semuaPetugas = User::where('role', 'kasir')->get();
        $semuaProduk = Produk::all();
        $semuaMember = Member::all();

        return view('livewire.laporan')->with([
            'semuaTransaksi' => $semuaTransaksi,
            'semuaPetugas' => $semuaPetugas,
            'semuaProduk' => $semuaProduk,
            'semuaMember' => $semuaMember
        ]);
    }
}
