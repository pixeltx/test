<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member as ModelMember;

class Member extends Component
{
    public $selectedMenu = 'lihat';
    public $nama;
    public $alamat;
    public $nohp;
    public $selectedMember;
    public $search = '';

    public function cariMember() {
        return ModelMember::where('nama_member', 'like', '%'.$this->search.'%')->get();
    }

    public function simpan() {
        $this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => ['required', 'unique:members,no_hp']
        ],[
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'nohp.required' => 'No Hp harus diisi',
            'nohp.unique' => 'No Hp Telah Digunakan'
        ]);

        $simpan = new ModelMember();
        $simpan->nama_member = $this->nama;
        $simpan->alamat = $this->alamat;
        $simpan->no_hp = $this->nohp;
        $simpan->save();

        $this->reset(['nama', 'alamat', 'nohp']);
        $this->selectedMenu = 'lihat';
    }

    public function selectEdit($id) {
        $this->selectedMember = ModelMember::findOrFail($id);
        $this->nama = $this->selectedMember->nama_member;
        $this->alamat = $this->selectedMember->alamat;
        $this->nohp = $this->selectedMember->no_hp;
        $this->selectedMenu = 'edit';
    }

    public function saveEdit() {
        $this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => ['required', 'unique:members,no_hp,' .$this->selectedMember->id]
        ],[
            'nama.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'nohp.required' => 'No Hp harus diisi',
            'nohp.unique' => 'No Hp Telah Digunakan'
        ]);
        
        $simpan = $this->selectedMember;
        $simpan->nama_member = $this->nama;
        $simpan->alamat = $this->alamat;
        $simpan->no_hp = $this->nohp;
        $simpan->save();

        $this->reset(['nama', 'alamat', 'nohp', 'selectedMember']);
        $this->selectedMenu = 'lihat';
    }

    public function selectHapus($id) {
        $this->selectedMember = ModelMember::findOrFail($id);
        $this->selectedMenu = 'hapus';
    }

    public function hapus() {
        $this->selectedMember->delete();
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
        $hasilMember = $this->cariMember();
        return view('livewire.member')->with([
            'members' => $hasilMember
        ]);
    }
}
