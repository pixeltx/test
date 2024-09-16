<div>
    <div class="px-3">
        <h1>Halaman Produk</h1>
            <div class="container">
                <div class="row my-2">
                    <div class="col-12">
                        <button wire:click="selectMenu('lihat')" class="btn {{ $selectedMenu=='lihat' ? 'btn-primary' : 'btn-outline-primary' }}">Semua Produk</button>
                        <button wire:click="selectMenu('tambah')" class="btn {{ $selectedMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary' }}">Tambah Produk</button>
                        <button wire:loading class="btn btn-info">...</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @if($selectedMenu=='lihat')
                        <div class="card border-primary" style="width: 75vw;">
                            <div class="card-header">
                                Semua Produk
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->kode }}</td>
                                            <td>{{ $produk->nama }}</td>
                                            <td>{{ $produk->harga }}</td>
                                            <td>{{ $produk->stok }}</td>
                                            <td>
                                                <button wire:click="selectEdit({{ $produk->id }})" class="btn {{ $selectedMenu=='edit' ? 'btn-warning' : 'btn-outline-warning' }}">Edit</button>
                                                <button wire:click="selectHapus({{ $produk->id }})" class="btn {{ $selectedMenu=='hapus' ? 'btn-danger' : 'btn-outline-danger' }}">Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @elseif($selectedMenu=='tambah')
                        <div class="card border-primary">
                            <div class="card-header">
                                Tambah Produk
                            </div>
                            <div class="card-body">
                                <form wire:submit='simpan'>
                                    <label for="">Kode Barang</label>
                                    <input type="text" class="form-control" wire:model='kode'>
                                    @error('kode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>

                                    <label for="">Nama Barang</label>
                                    <input type="text" class="form-control" wire:model='nama'>
                                    @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <label for="">Harga</label>
                                    <input type="number" class="form-control" wire:model='harga'>
                                    @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <label for="">Stok</label>
                                    <input type="number" class="form-control" wire:model='stok'>
                                    @error('stok')
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
                                Edit Produk
                            </div>
                            <div class="card-body">
                                <form wire:submit='saveEdit'>
                                    <label for="">Kode Barang</label>
                                    <input type="text" class="form-control" wire:model='kode'>
                                    @error('kode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>

                                    <label for="">Nama Barang</label>
                                    <input type="text" class="form-control" wire:model='nama'>
                                    @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <label for="">Harga</label>
                                    <input type="number" class="form-control" wire:model='harga'>
                                    @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    
                                    <label for="">Stok</label>
                                    <input type="number" class="form-control" wire:model='stok'>
                                    @error('stok')
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
                                Anda yakin akan menghapus Produk ini?
                                <p>Nama: {{ $selectedProduk->nama }}</p>
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
