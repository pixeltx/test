<?php

namespace App\Livewire;

use App\Livewire\Produk as LivewireProduk;
use Livewire\Component;
use App\Models\Transaksi as ModelTransaksi;
use App\Models\DetailTransaksi;
use App\Models\Produk;

class Transaksi extends Component
{
    public $kode, $total, $kembalian, $totalBelanja;
    public $bayar = 0;
    public $activeTransaction;

    public function newTransaction() {
        $this->reset();
        $this->activeTransaction = new ModelTransaksi();
        $this->activeTransaction->kode = 'TRX/' . date('YmdHis');
        $this->activeTransaction->total = 0;
        $this->activeTransaction->status = 'pending';
        $this->activeTransaction->save();
    }

    public function cancelTransaction() {
        if($this->activeTransaction) {
            $detailTransaksi = DetailTransaksi::where('id_transaksi', $this->activeTransaction->id)->get();
            foreach ($detailTransaksi as $detail) {
                $produk = Produk::find($detail->id_produk);
                $produk->stok += $detail->jumlah_produk;
                $produk->save();
                $detail->delete();
            }
            $this->activeTransaction->delete();
        }
        $this->reset();
    }

    public function updatedKode() {
        $produk = Produk::Where('kode', $this->kode)->first();
        if($produk && $produk->stok > 0) {
            $detail = DetailTransaksi::firstOrNew([
                'id_transaksi' => $this->activeTransaction->id,
                'id_produk' => $produk->id
            ],[
                'jumlah_produk' => 0,
            ]);
            $detail->jumlah_produk += 1;
            $detail->save();
            $produk->stok -= 1;
            $produk->save();
            $this->reset('kode');
        }
    }

    public function updatedBayar() {
        if($this->bayar > 0) {
            $this->kembalian = $this->bayar - $this->totalBelanja;
        }
    }

    public function hapusProduk($id) {
        $detail = DetailTransaksi::find($id);
        if($detail) {
            $produk = Produk::find($detail->id_produk);
            $produk->stok += $detail->jumlah_produk;
            $produk->save();
        }
        $detail->delete();
    }

    public function processTransaction() {
        $this->activeTransaction->total = $this->totalBelanja;
        $this->activeTransaction->status = 'selesai';
        $this->activeTransaction->save();
        $this->reset();
    }

    public function render()
    {
        if($this->activeTransaction) {
            $semuaProduk = DetailTransaksi::where('id_transaksi', $this->activeTransaction->id)->get();
            $this->totalBelanja = $semuaProduk->sum(function($detail) {
                return $detail->produk->harga * $detail->jumlah_produk;
            });
        }else{
            $semuaProduk = [];
        }
        return view('livewire.transaksi')->with([
            'semuaProduk' => $semuaProduk
        ]);
    }
}
