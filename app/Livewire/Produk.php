<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produk as ModelProduk;

class Produk extends Component
{
    public $selectedMenu = 'lihat';
    public $kode;
    public $nama;
    public $harga;
    public $stok;
    public $selectedProduk;

    public function simpan() {
        $this->validate([
            'kode' => ['required', 'unique:produks,kode'],
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ],[
            'kode.required' => 'Kode barang harus diisi',
            'kode.unique' => 'Kode barang Telah Digunakan',
            'nama.required' => 'Nama Barang harus diisi',
            'harga.required' => 'Harga harus diisi',
            'stok.required' => 'Stok harus diisi'
        ]);

        $simpan = new ModelProduk();
        $simpan->kode = $this->kode;
        $simpan->nama = $this->nama;
        $simpan->harga = $this->harga;
        $simpan->stok = $this->stok;
        $simpan->save();

        $this->reset(['kode', 'nama', 'harga', 'stok']);
        $this->selectedMenu = 'lihat';
    }

    public function selectEdit($id) {
        $this->selectedProduk = ModelProduk::findOrFail($id);
        $this->kode = $this->selectedProduk->kode;
        $this->nama = $this->selectedProduk->nama;
        $this->harga = $this->selectedProduk->harga;
        $this->stok = $this->selectedProduk->stok;
        $this->selectedMenu = 'edit';
    }

    public function saveEdit() {
        $this->validate([
            'kode' => ['required', 'unique:produks,kode,' . $this->selectedProduk->id],
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ],[
            'kode.required' => 'Kode barang harus diisi',
            'kode.unique' => 'Kode barang Telah Digunakan',
            'nama.required' => 'Nama harus diisi',
            'harga.required' => 'Harga harus diisi',
            'stok.required' => 'Stok harus diisi'
        ]);
        
        $simpan = $this->selectedProduk;
        $simpan->kode = $this->kode;
        $simpan->nama = $this->nama;
        $simpan->harga = $this->harga;
        $simpan->stok = $this->stok;
        $simpan->save();

        $this->reset(['kode', 'nama', 'harga', 'stok']);
        $this->selectedMenu = 'lihat';
    }

    public function selectHapus($id) {
        $this->selectedProduk = ModelProduk::findOrFail($id);
        $this->selectedMenu = 'hapus';
    }

    public function hapus() {
        $this->selectedProduk->delete();
        $this->selectedMenu = 'lihat';
    }

    public function batal() {
        $this->reset();
    }

    public function selectMenu($menu) {
        $this->selectedMenu = $menu;
    }

    public function render()
    {
        return view('livewire.produk')->with([
            'produks' => ModelProduk::all()
        ]);
    }
}
