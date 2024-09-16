<div>
    <div class="px-3">
        <h1>Halaman Petugas</h1>
            <div class="container">
                <div class="row my-2">
                    <div class="col-12">
                        <button wire:click="selectMenu('lihat')" class="btn {{ $selectedMenu=='lihat' ? 'btn-primary' : 'btn-outline-primary' }}">Semua Petugas</button>
                        <button wire:click="selectMenu('tambah')" class="btn {{ $selectedMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary' }}">Tambah Petugas</button>
                        <button wire:loading class="btn btn-info">...</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @if($selectedMenu=='lihat')
                        <div class="card border-primary" style="width: 75vw;">
                            <div class="card-header">
                                Semua Petugas
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $petugas)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $petugas->name }}</td>
                                            <td>{{ $petugas->email }}</td>
                                            <td>
                                                <button wire:click="selectEdit({{ $petugas->id }})" class="btn {{ $selectedMenu=='edit' ? 'btn-warning' : 'btn-outline-warning' }}">Edit</button>
                                                <button wire:click="selectHapus({{ $petugas->id }})" class="btn {{ $selectedMenu=='hapus' ? 'btn-danger' : 'btn-outline-danger' }}">Hapus</button>
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
                                Tambah Petugas
                            </div>
                            <div class="card-body">
                                <form wire:submit='simpan'>
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" wire:model='nama'>
                                    @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" wire:model='email'>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" wire:model='password'>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <button type="submit" class="btn btn-success mt-3">Simpan</button>
                                </form>
                            </div>
                        </div>
                        @elseif($selectedMenu=='edit')
                        <div class="card border-primary">
                            <div class="card-header">
                                Edit Petugas
                            </div>
                            <div class="card-body">
                                <form wire:submit='saveEdit'>
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" wire:model='nama'>
                                    @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" wire:model='email'>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" wire:model='password'>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <button type="submit" class="btn btn-success mt-3">Simpan</button>
                                    <button type="button" wire:click='batal' class="btn btn-secondary mt-3">Back</button>
                                </form>
                            </div>
                        </div>
                        @elseif($selectedMenu=='hapus')
                        <div class="card border-danger">
                            <div class="card-header bg-danger text-white">
                                Hapus Petugas
                            </div>
                            <div class="card-body">
                                Anda yakin akan menghapus Akun Petugas ini?
                                <p>Nama: {{ $selectedPetugas->name }}</p>
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
