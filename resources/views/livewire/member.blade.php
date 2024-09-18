<div>
    <div class="px-3">
        <h1>Halaman Member</h1>
            <div class="container">
                <div class="row my-2">
                    <div class="col-9">
                        <button wire:click="selectMenu('lihat')" class="btn {{ $selectedMenu=='lihat' ? 'btn-primary' : 'btn-outline-primary' }}">Semua Member</button>
                        <button wire:click="selectMenu('tambah')" class="btn {{ $selectedMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary' }}">Tambah Member</button>
                        <button wire:loading class="btn btn-info">...</button>
                    </div>
                    @if ($selectedMenu == 'lihat')
                    <div class="col-3">
                        <form role="search" class="float-right">
                            <input type="text" class="" wire:model.live='search' placeholder="Cari">
                        </form>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        @if($selectedMenu=='lihat')
                        <div class="card border-primary" style="width: 75vw;">
                            <div class="card-header">
                                Semua Member
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $member)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $member->nama_member }}</td>
                                            <td>{{ $member->alamat }}</td>
                                            <td>{{ $member->no_hp }}</td>
                                            <td>
                                                <button wire:click="selectHapus({{ $member->id }})" class="btn {{ $selectedMenu=='hapus' ? 'btn-danger' : 'btn-outline-danger' }}">Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @elseif($selectedMenu=='tambah')
                        <div class="card border-primary" style="width: 50vw;">
                            <div class="card-header">
                                Tambah Member
                            </div>
                            <div class="card-body">
                                <form wire:submit='simpan'>
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" wire:model='nama'>
                                    @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" wire:model='alamat'>
                                    @error('alamat')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <label for="">No Hp</label>
                                    <input type="number" class="form-control" wire:model='nohp'>
                                    @error('nohp')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <button type="submit" class="btn btn-success mt-3">Simpan</button>
                                </form>
                            </div>
                        </div>
                        @elseif($selectedMenu=='hapus')
                        <div class="card border-danger">
                            <div class="card-header bg-danger text-white">
                                Hapus Member
                            </div>
                            <div class="card-body">
                                Anda yakin akan menghapus Member ini?
                                <p>Nama: {{ $selectedMember->nama_member }}</p>
                                <button class="btn btn-danger" wire:click='hapus'>Hapus</button>
                                <button class="btn btn-secondary" wire:click='batal'>Batal</button>
                            </div>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
